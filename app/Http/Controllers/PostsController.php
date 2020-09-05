<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        // this will require all methods in here to pass authorization
        $this->middleware('auth');
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $data = request()->validate([
           'caption' => 'required',
           'image' => ['required', 'image'],
        ]);

        // tell PHP where to store
        $imagePath = request('image')->store('uploads', 'public');

        // manipulate the image to desired properties
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        // get the authenticated user
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    // since the $post is the same name as the {post} route binding, it will take care of this for us if \App\Post is added too
    public function show(\App\Post $post) {
        return view('posts.show', compact('post'));
    }

}
