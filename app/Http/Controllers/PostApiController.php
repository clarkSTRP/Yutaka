<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'street' => 'required',
            'name' => 'required',
            'author' => 'required',
            'adress' => 'required',
            'content' => 'required',
            'user_id' => 'required',
            'cities_id' => 'required',
        ]);
    
        $post = Post::create([
            'price' => $request->price,
            'street' => $request->street,
            'name' => $request->name,
            'author' => $request->author,
            'adress' => $request->adress,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'cities_id' => $request->cities_id,
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Post created successfully',
            'post' => $post,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
