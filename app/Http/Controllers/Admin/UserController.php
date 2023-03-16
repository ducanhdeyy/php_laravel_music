<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUser;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUser;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Services\Admin\UserService;
use Exception;

class UserController extends Controller
{
    private $user;

    public function __construct(UserService $userService)
    {
        $this->user = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $users = $this->user->index(SORT_USER,INDEX_USER);
            return view('admin.user.indexUser', compact('users'));
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
            return view('admin.user.updateOrCreateUser');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $this->user->storeUser($request);
            return redirect()->route('user.index')->with('success', __('messages.create_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        try {
            $user = $this->user->find($id);
            return view('admin.user.updateOrCreateUser', compact('user'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $this->user->updateUser($request, $id);
            return redirect()->route('user.index')->with('success', __('messages.update_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->user->deleteUser($id);
            return redirect()->route('user.index')->with('success', __('messages.delete_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
