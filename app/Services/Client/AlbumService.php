<?php

namespace App\Services\Client;

use App\Models\Album;
use App\Services\BaseService;
use Exception;

class AlbumService extends BaseService
{

    public function getModel()
    {
        return Album::class;
    }

    public function getHomeAlbum($limit)
    {
        try {
            return $this->model->orderByDesc('created_at')->take($limit)->get();
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }
}
