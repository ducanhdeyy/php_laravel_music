<?php

namespace App\Services\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Services\BaseService;
use App\Services\SendMail\MailService;
use Illuminate\Support\Facades\File;
use Exception;

class UserService extends BaseService
{
    public function getModel()
    {
        return User::class;
    }

    public function getPlaylist($id)
    {
        $user = $this->find($id);

        try {
            return $user->songs;
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function payment($request)
    {
        $user = $this->find($request->user_id);
        $remaining = $user->wallet - $request->price;
        if ($remaining < 0) {
            throw new \Exception(__('messages.error_download'));
        }

        try {
            DB::beginTransaction();
            $this->update($request->user_id, ['wallet' => $remaining]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->update($request->user_id, ['wallet' => $request->wallet]);
            throw new \Exception(__('messages.download_failed'));
        }
    }

    public function storePlaylist($request)
    {
        $user = $this->find($request->user_id);

        if ($user->songs()->where('song_id', $request->song_id)->exists()) {
            throw new \Exception(__('messages.add_playlist_failed'));
        }

        try {
            $user->songs()->attach($request->song_id);
        } catch (Exception $e) {
            throw new \Exception(__('messages.add_playlist_failed'));
        }
    }

    public function register($request)
    {
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];


        try {
            DB::beginTransaction();
            $userNew = $this->create($user);
            // send mail 
            MailService::sendMail($userNew);
            DB::commit();
            return $userNew;
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function updateCustomer($request, $id)
    {
        $user = $this->find($id);

        $userOld = [
            'name' => $request->name,
        ];

        if ($request->hasFile('image')) {
            $userOld['image'] = uploadFile($request->file('image'));
            $this->deleteImage($user->image);
        }

        try {
            DB::beginTransaction();
            $check = $user->update($userOld);
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            // quay lại những gì đã insert vào database và in ra lỗi vào file log
            DB::rollBack();
            $this->deleteImage($user->image);
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function changePassword($request, $id)
    {
        $user = $this->find($id);

        try {
            $user->update([
                'password' =>  bcrypt($request->password)
            ]);
        } catch (Exception $e) {
            throw new \Exception(__('messages.update_failed'));
        }
    }

    public function deleteImage($imageUrl)
    {
        if (File::exists(public_path('uploads/' . $imageUrl))) {
            File::delete(public_path('uploads/' . $imageUrl));
        }
    }

    public function updateMoneyVNPay()
    {
        $money = @(request('vnp_Amount') / 100) + Auth::guard('cus')->user()->wallet;
        $alert = @request('vnp_ResponseCode');

        if ($alert != '00') {
            throw new \Exception(__('messages.add_money_failed'));
        }

        $user = $this->find(Auth::guard('cus')->id());
        try {
            $user->update([
                'wallet' =>  $money
            ]);
        } catch (Exception $e) {
            throw new \Exception(__('messages.add_money_failed'));
        }
    }
}
