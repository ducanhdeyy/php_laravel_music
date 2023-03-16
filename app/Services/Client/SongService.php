<?php

namespace App\Services\Client;

use App\Models\Song;
use App\Services\BaseService;
use Exception;

class SongService extends BaseService
{

    public function getModel(): string
    {
        return Song::class;
    }

    public function getSong($paginate)
    {
        try {
            return $this->model->with('singer')->search()->orderByDesc('created_at')->paginate($paginate);
        }catch (\Exception $e){
            throw new Exception(__('messages.error_500'));
        }
    }

    public function getTopTrack($limit)
    {
        try {
            return $this->model->with('singer')->orderByDesc('created_at')->take($limit)->get();
        }catch (\Exception $e){
            throw new Exception(__('messages.error_500'));
        }
    }

    public function getRecently($limit)
    {
        try {
            return $this->model->with('singer')->orderByDesc('created_at')->take($limit)->get();
        }catch (\Exception $e){
            throw new Exception(__('messages.error_500'));
        }
    }

    public function getChart($paginate)
    {
        try {
            return $this->model->with('singer')->search()->orderByDesc('created_at')->paginate($paginate);
        }catch (\Exception $e){
            throw new Exception(__('messages.error_500'));
        }
    }

    public function searchSong($paginate)
    {
        try {
            return $this->model->with('singer')->search()->orderByDesc('created_at')->paginate($paginate);
        }catch (\Exception $e){
            throw new Exception(__('messages.error_500'));
        }
    }
}
