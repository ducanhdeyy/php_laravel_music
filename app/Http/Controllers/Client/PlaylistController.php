<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\DeletePlaylistRequest;
use App\Http\Requests\Client\StorePlaylistRequest;
use App\Services\Client\PlaylistService;
use App\Services\Client\SongService;
use App\Services\Client\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlaylistController extends Controller
{
    protected $user;
    protected $song;
    protected $playlist;

    public function __construct(UserService $user, SongService $song, PlaylistService $playlist)
    {
        $this->user = $user;
        $this->song = $song;
        $this->playlist = $playlist;
    }

    public function index($id)
    {
        try {

            $playlists = $this->playlist->getPlaylist($id);
            $topTracks = $this->song->getTopTrack(TOP_TRACK_SONG);
            return view('client.playlist', compact('playlists', 'topTracks'));

        } catch (ModelNotFoundException $e) {
            return view('client.404');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(StorePlaylistRequest $request)
    {
        try {

            $this->playlist->storePlaylist($request);
            return redirect()->back()->with('success', __('messages.create_success'));

        } catch (ModelNotFoundException $exception) {
            return view('client.404');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(DeletePlaylistRequest $request)
    {
        try {
            $this->playlist->deletePlaylist($request);
            return redirect()->back()->with('success', __('messages.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
