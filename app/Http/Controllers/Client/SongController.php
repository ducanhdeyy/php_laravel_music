<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\SongService;
use Illuminate\Http\Request;

class SongController extends Controller
{
    private $song;

    public function __construct(SongService $song)
    {
        $this->song = $song;
    }
    
    public function index()
    {
        try {
            $songs = $this->song->getSong(SONG);
            return view('client.song', compact('songs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
