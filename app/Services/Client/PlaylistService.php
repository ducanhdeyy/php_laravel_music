<?php

namespace App\Services\Client;

use App\Models\User;
use App\Services\BaseService;
use Exception;

class PlaylistService extends BaseService
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
        } catch (\Exception $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function storePlaylist($request)
    {
        $user = $this->find($request->user_id);

        if ($user->songs()->where('song_id', $request->song_id)->exists()) {
            throw new \Exception(__('messages.add_playlist_failed'));
        }

        try {
           return $user->songs()->attach($request->song_id);
        } catch (Exception $e) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function deletePlaylist($request)
    {
        $user = $this->find($request->user_id);
        try {
            if ($user->songs()->where('song_id', $request->song_id)->exists()) {
               return $user->songs()->detach($request->song_id);
            }
        } catch (\Exception $th) {
            throw new Exception(__('messages.error_500'));
        }
    }
}
