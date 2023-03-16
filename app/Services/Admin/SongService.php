<?php

namespace App\Services\Admin;

use App\Exceptions\NotFoundException;
use App\Models\Song;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

class SongService extends BaseService
{

    public function getModel(): string
    {
        return Song::class;
    }

    public function index($sort,$paginate)
    {
        try {
            return $this->model->with('singer', 'album', 'genre')->search()->orderByDesc($sort)->paginate($paginate);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function storeSong($request)
    {
        $linkImage = '';

        $song = [
            'name' => $request->name,
            'price' => $request->price,
            'singer_id' => $request->singer_id,
            'album_id' => $request->album_id,
            'genre_id' => $request->genre_id,
        ];

        if ($request->hasFile('image')) {
            $linkImage = uploadFile($request->file('image'));
            $song['image'] = $linkImage;
        }

        if ($request->hasFile('file_url')) {
            $linkMp3 = uploadFile($request->file('file_url'));
            $song['file_url'] = $linkMp3;
        }

        try {
            DB::beginTransaction();
            $check = $this->create($song);
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            DB::rollBack();
            $this->deleteFile($linkImage);
            $this->deleteFile($linkMp3);
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    /**
     * @throws NotFoundException
     */
    public function updateSong($request, $id)
    {
        $song = $this->find($id);

        $songNew = [
            'name' => $request->name,
            'price' => $request->price,
            'singer_id' => $request->singer_id,
            'album_id' => $request->album_id,
            'genre_id' => $request->genre_id,
        ];

        if ($request->hasFile('image')) {
            $songNew['image'] = uploadFile($request->file('image'));
            $this->deleteFile($song->image);
        }

        if ($request->hasFile('file_url')) {
            $songNew['file_url'] = uploadFile($request->file('file_url'));
            $this->deleteFile($song->file_url);
        }

        try {
            DB::beginTransaction();
            $check = $song->update($songNew);
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            DB::rollBack();
            $this->deleteFile($song->image);
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deleteSong($id)
    {

        try {
            $song = $this->model->findOrFail($id);
            $this->deleteFile($song->image);
            return $song->delete();
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deleteFile($imageUrl)
    {
        File::delete(public_path('uploads/' . $imageUrl));
    }
}
