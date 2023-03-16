<?php

namespace App\Services\Admin;

use App\Models\album;
use App\Models\Song;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

class AlbumService extends BaseService
{

    public function getModel()
    {
        return Album::class;
    }

    public function index($sort,$paginate)
    {
        try {
            return $this->model->search()->orderByDesc($sort)->paginate($paginate);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function storeAlbum($request)
    {
        $linkImage = '';

        $album = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('image')) {
            $linkImage = uploadFile($request->file('image'));
            $album['image'] = $linkImage;
        }

        try {
            DB::beginTransaction();
            $check =  $this->model->create($album);
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            DB::rollBack();
            $this->deleteImage($linkImage);
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function updateAlbum($request, $id)
    {

        $album = $this->find($id);

        $albumNew = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('image')) {
            $albumNew['image'] = uploadFile($request->file('image'));
            $this->deleteImage($album->image);
        }

        try {
            DB::beginTransaction();
            $check =  $album->update($albumNew);
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            // quay lại những gì đã insert vào database và in ra lỗi vào file log
            DB::rollBack();
            $this->deleteImage($album->image);
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deleteAlbum($id)
    {
        $album = $this->find($id);

        if (Song::where('album_id', $id)->get()->count() > 0) {
            throw new Exception(__('messages.error_foreign_key'));
        }

        try {
            $this->deleteImage($album->image);

            return $album->delete();
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deleteImage($imageUrl)
    {
        File::delete(public_path('uploads/' . $imageUrl));
    }
}
