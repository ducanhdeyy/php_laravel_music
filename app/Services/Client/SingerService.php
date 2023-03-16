<?php

namespace App\Services\Client;

use App\Models\Singer;
use App\Services\BaseService;

class SingerService extends BaseService
{

    public function getModel()
    {
        return Singer::class;
    }

    public function getHomeSinger($limit)
    {
        try {
            return $this->model->orderByDesc('created_at')->take($limit)->get();
        } catch (\Exception $e) {
            throw new \Exception(__('messages.error_500'));
        }
    }

    public function getArtists($paginate)
    {
        try {
            return $this->model->orderByDesc('created_at')->paginate($paginate);
        } catch (\Exception $e) {
            throw new \Exception(__('messages.error_500'));
        }
    }

    public function searchSinger($paginate)
    {
        try {
            return $this->model->search()->orderByDesc('created_at')->paginate($paginate);
        }catch (\Exception $e){
            throw new \Exception(__('messages.error_500'));
        }
    }
}
