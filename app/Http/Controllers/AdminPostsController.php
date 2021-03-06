<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePost;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class AdminPostsController extends Controller
{
    protected $photo_id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::pluck('name', 'id')->toArray();

        return view('admin.posts.create', compact(['post', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePost $request
     * @return RedirectResponse
     */
    public function store(CreatePost $request): RedirectResponse
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

        $inputData['photo_id'] = $photo_id;

        \Auth::user()->posts()->create($inputData);

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->toArray();

        return view('admin.posts.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo_id = 0;
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

        $inputData['photo_id'] = $photo_id;

        \Auth::user()->posts()->whereId($id)->first()->update($inputData);

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->file);

        $post->delete();

        return redirect(route('posts.index'))->with('success_message', 'Post was deleted successfully');
    }
}
