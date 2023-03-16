<?php

namespace App\Services\Admin;

use App\Models\Singer;
use App\Models\Song;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

class SingerService extends BaseService
{

    public function getModel()
    {
        return Singer::class;
    }

    public function index($sort,$paginate)
    {
        try {
            return $this->model->search()->orderByDesc($sort)->paginate($paginate);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function storeSinger($request)
    {
        $linkImage = '';
        $singer = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('image')) {
            $linkImage = uploadFile($request->file('image'));
            $singer['image'] = $linkImage;
        }

        try {
            DB::beginTransaction();
            $check =  $this->model->create($singer);
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            DB::rollBack();
            $this->deleteImage($linkImage);
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function updateSinger($request, $id)
    {
        $singer = $this->model->find($id);

        if (!isset($singer)) {
            return false;
        }

        $singerOld = [
            'name' => $request->name,
            'role' => $request->role
        ];

        if ($request->hasFile('image')) {
            $linkImage = uploadFile($request->file('image'));
            $singerOld['image'] = $linkImage;
            $this->deleteImage($singer->image);
        }

        try {
            DB::beginTransaction();
            $check =  $singer->update($singerOld);
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            // quay lại những gì đã insert vào database và in ra lỗi vào file log
            DB::rollBack();
            $this->deleteImage($singer->image);
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deleteSinger($id)
    {
        $singer = $this->find($id);

        if (Song::where('singer_id', $id)->get()->count() > 0) {
            throw new Exception(__('messages.error_foreign_key'));
        }

        try {
            $this->deleteImage($singer->image);
            return $singer->delete();
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deleteImage($imageUrl)
    {
        File::delete(public_path('uploads/' . $imageUrl));
    }
}
