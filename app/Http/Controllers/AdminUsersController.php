<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id')->toArray();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest $request
     * @return RedirectResponse
     */
    public function store(UsersRequest $request):RedirectResponse
    {
        User::create([
            'role_id'   => \request('role_id'),
            'is_active' => \request('is_active'),
            'name'      => \request('name'),
            'email'     => \request('email'),
            'password'  => bcrypt(\request('password'))
        ]);

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
