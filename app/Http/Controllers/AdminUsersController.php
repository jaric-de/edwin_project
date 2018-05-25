<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserUpdateForm;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
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
    public function store(UsersRequest $request): RedirectResponse
    {
        $photo_id = null;
        $inputData = $request->all();
        if ($request->hasFile('photo_id')) {
            $file = $request->file('photo_id');
            $name = str_replace(" ", "", time() . '_' . $file->getClientOriginalName());
            $file->move('images', $name);

            $photo = Photo::create([
                'file' => $name
            ]);
            $photo_id = $photo->id;
        }
//        $test = \request('name'); // на таком обращении валился скрипт, так, как внутри в одном из элементов массива лежал путь на временный файл, который стерся после move().

        $inputData['photo_id'] = $photo_id;

        User::create($inputData);

//        User::create([
//            'role_id'   => $request->get('role_id'),
//            'is_active' => $request['is_active'],
//            'name'      => $request['name'],
//            'email'     => $request['email'],
//            'password'  => $request['password'],
//            'photo_id'  => $photo_id,
//        ]);

//        $user->cretaed_at_for_humans,

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
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name', 'id')->toArray();

        return view('admin.users.edit', compact(['roles', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateForm $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UserUpdateForm $request, $id)
    {
        $user = User::findOrFail($id);
        $inputData = $request->all();

        $photoId = null;

        if ($request->hasFile('photo_id')) {
            $file = $request->file('photo_id');
            $name = str_replace(" ", "", time() . '_' . $file->getClientOriginalName());
            $file->move('images', $name);

            $photo = Photo::create([
                'file' => $name
            ]);
            $photoId = $photo->id;
        }

        $inputData['photo_id'] = $photoId;

        $user->update($inputData);

        return redirect(route('users.index'));
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
