<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreSingerRequest;
use App\Http\Requests\Admin\UpdateSingerRequest;
use App\Models\Singer;
use App\Http\Controllers\Controller;
use App\Services\Admin\SingerService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class SingerController extends Controller
{
    private $singer;

    public function __construct(SingerService $singerService)
    {
        $this->singer = $singerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $singers = $this->singer->index(SORT_SINGER,INDEX_SINGER);
            return view('admin.singer.indexSinger', compact('singers'));
        } catch (Exception $e) {
            return view('admin.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.singer.updateOrCreateSinger');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreSingerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSingerRequest $request)
    {
        try {
            $this->singer->storeSinger($request);
            return redirect()->route('singer.index')->with('success', __('messages.create_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $singer = $this->singer->find($id);
            return view('admin.singer.updateOrCreatesinger', compact('singer'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateSingerRequest  $request
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSingerRequest $request, $id)
    {
        try {
            $this->singer->updateSinger($request, $id);
            return redirect()->route('singer.index')->with('success', __('messages.update_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->singer->deleteSinger($id);
            return redirect()->route('singer.index')->with('success', __('messages.delete_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
