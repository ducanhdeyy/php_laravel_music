<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreSongRequest;
use App\Http\Requests\Admin\UpdateSongRequest;
use App\Http\Controllers\Controller;
use App\Services\Admin\AlbumService;
use App\Services\Admin\GenreService;
use App\Services\Admin\SingerService;
use App\Services\Admin\SongService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SongController extends Controller
{
    private $song;
    private $singer;
    private $album;
    private $genre;

    public function __construct(
        SongService $songService,
        SingerService $singerService,
        AlbumService $albumService,
        GenreService $genreService)
    {
        $this->song = $songService;
        $this->singer = $singerService;
        $this->album = $albumService;
        $this->genre = $genreService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $songs = $this->song->index(SORT_SONG,INDEX_SONG);
            return view('admin.song.indexSong', compact('songs'));
        } catch (Exception $e) {
            return view('admin.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        try {
            $singers = $this->singer->getAll();
            $albums = $this->album->getAll();
            $genres = $this->genre->getAll();
            return view('admin.song.updateOrCreateSong', compact('singers', 'albums', 'genres'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreSongRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSongRequest $request)
    {
        try {
            $this->song->storeSong($request);
            return redirect()->route('song.index')->with('success', __('messages.create_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        try {
            $song = $this->song->find($id);
            $singers = $this->singer->getAll();
            $albums = $this->album->getAll();
            $genres = $this->genre->getAll();
            return view('admin.song.updateOrCreateSong', compact('song', 'singers', 'albums', 'genres'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateSongRequest  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSongRequest $request, $id)
    {
        try {
            $this->song->updateSong($request, $id);
            return redirect()->route('song.index')->with('success', __('messages.update_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->song->deleteSong($id);
            return redirect()->route('user.index')->with('success', __('messages.delete_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
