<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\City;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::latest()->paginate(10);

        return view('admin.post.index',compact('post'))

        ->with('i', (request()->input('page', 1) - 1) * 5);

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city = City::latest()->get();
        return view('admin.post.create',compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request )
    {
        $city = City::latest()->get();
        $id = Auth::id();
        $myArray = $request->all();
        $myArray["user_id"] = $id;
        Post::create($myArray);
        
        Post::create($request->all());
        return redirect()->route('admin.post.index')

        ->with('success','post created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $data = Post::all();
            return view('post',['post'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('posts.index')

        ->with('success','post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')

                        ->with('success','post deleted successfully');
    }
}
