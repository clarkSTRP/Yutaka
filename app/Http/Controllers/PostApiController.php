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
    
        $data = $request->all();
    
        if ($request->has('image')) {
            $base64Image = $request->input('image');
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
    
            // Generate a unique filename for the image
            $imageName = uniqid() . '.png';
    
            // Store the image in a specific directory
            $imagePath = public_path('image/' . $imageName);
    
            // Save the image file
            file_put_contents($imagePath, $imageData);
    
            $data['image'] = $imageName;
        } else {
            $data['image'] = 'default_image.png';
        }
    
        $post = Post::create($data);
    
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
