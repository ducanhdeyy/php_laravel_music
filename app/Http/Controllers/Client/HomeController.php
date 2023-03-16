<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\UserService;
use App\Services\Client\AlbumService;
use App\Services\Client\GenreService;
use App\Services\Client\SingerService;
use App\Services\Client\SongService;
use App\Services\Client\TransactionService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $albumService;
    protected $songService;
    protected $singerService;
    protected $genreService;
    protected $userService;
    protected $transactionService;

    public function __construct(
        UserService $userService,
        SongService $songService,
        SingerService $singerService,
        GenreService $genreService,
        AlbumService $albumService,
        TransactionService $transactionService
    ) {
        $this->albumService = $albumService;
        $this->songService = $songService;
        $this->singerService = $singerService;
        $this->genreService = $genreService;
        $this->userService = $userService;
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $songs = $this->songService->getTopTrack(TOP_TRACK_SONGS);
        $newSongs = $this->songService->getRecently(RECENTLY_SONG);
        $albums = $this->albumService->getHomeAlbum(HOME_ALBUM);
        $singers = $this->singerService->getHomeSinger(HOME_SINGER);
        $genres = $this->genreService->getHomeGenre(HOME_GENRE);

        return view('client.home', compact('songs', 'albums', 'singers', 'genres', 'newSongs'));
    }

    public function download(Request $request)
    {
        try {
            $this->userService->payment($request);
            $this->transactionService->buyHistory($request);
            return response()->download(public_path('uploads/' . $request->url));
        } catch (ModelNotFoundException $e) {
            return view('client.404');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function charts()
    {
        try {
            $songs = $this->songService->getChart(CHART);
            return view('client.charts', compact('songs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function artists()
    {
        try {
            $singers = $this->singerService->getArtists(ARTISTS);
            return view('client.artists', compact('singers'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function singerSong($id)
    {
        try {
            $singer = $this->singerService->find($id);
            $topTracks = $this->songService->getTopTrack(TOP_TRACK_SONG);
            return view('client.singer', compact('singer', 'topTracks'));
        } catch (ModelNotFoundException $e) {
            return view('client.404');
        }
    }

    public function setting()
    {
        return view('client.setting');
    }

    public function search()
    {
        try {
            $singers = $this->singerService->searchSinger(SEARCH_SINGER);
            $songs = $this->songService->searchSong(SEARCH_SONG);
            return view('client.search', compact('singers', 'songs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
