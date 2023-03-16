<?php

namespace App\Services\Client;

use App\Models\Genre;
use App\Services\BaseService;
use Exception;

class GenreService extends BaseService
{

    public function getModel()
    {
        return Genre::class;
    }

    public function getHomeGenre($limit)
    {
        try {
            return $this->model->orderByDesc('created_at')->take($limit)->get();
        } catch (\Exception $th) {
            throw new Exception(__('messages.error_500'));
        }
    }
}
