<?php

namespace App\Services\Admin;

use App\Models\Genre;
use App\Models\Song;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GenreService extends BaseService
{

    public function getModel()
    {
        return Genre::class;
    }

    public function index($sort,$paginate)
    {
        try {
            return $this->model->search()->orderByDesc($sort)->paginate($paginate);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function storeGenre($request)
    {
        try {
            DB::beginTransaction();
            $check =  $this->model->create($request->all());
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }


    public function updategenre($request, $id)
    {
        $genre = $this->model->find($id);

        if (!isset($genre)) {
            return false;
        }

        try {
            DB::beginTransaction();
            $check =  $genre->update($request->all());
            DB::commit();
            return $check;
        } catch (\Exception $err) {
            // quay lại những gì đã insert vào database và in ra lỗi vào file log
            DB::rollBack();
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deleteGenre($id)
    {

        $genre = $this->find($id);

        if (Song::where('genre_id', $id)->get()->count() > 0) {
            throw new Exception(__('messages.error_foreign_key'));
        }

        try {
            return $genre->delete();
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }
}
