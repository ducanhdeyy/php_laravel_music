<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class UserService extends BaseService
{

    public function getModel()
    {
        return User::class;
    }

    public function index($sort,$paginate)
    {
        try {
            return $this->model->search()->orderByDesc($sort)->paginate($paginate);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function storeUser($request)
    {
        $linkImage = '';

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ];

        if ($request->hasFile('image')) {
            $linkImage = uploadFile($request->file('image'));
            $user['image'] = $linkImage;
        }

        try {
            DB::beginTransaction();
            $check = $this->create($user);
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            DB::rollBack();
            $this->deleteImage($linkImage);
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function updateUser($request, $id)
    {

        $user = $this->find($id);

        $userOld = [
            'name' => $request->name,
            'role' => $request->role
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

    public function deleteUser($id)
    {
        try {
            $user = $this->find($id);

            $check = $user->delete();
            $this->deleteImage($user->image);
            return $check;
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deleteImage($imageUrl)
    {
        File::delete(public_path('uploads/' . $imageUrl));
    }
}
