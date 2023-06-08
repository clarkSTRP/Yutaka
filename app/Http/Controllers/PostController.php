<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('access-admin')){
            abort('403');
         }
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
        if (Gate::denies('access-admin')){
            abort('403');
         }

        $city = City::latest()->get();
        return view('admin.post.create',compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {


        if (Gate::denies('access-admin')){
            abort('403');
         }
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = Auth::id();
        $data = $request->all();
        $data['user_id'] = $id;
    
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;
        }
    
        Post::create($data);
    
        return redirect()->route('post.index')
            ->with('success', 'Post created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (Gate::denies('access-admin')){
            abort('403');
         }
        $data = Post::all();
            return view('post',['post'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (Gate::denies('access-admin')){
            abort('403');
         }
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if (Gate::denies('access-admin')){
            abort('403');
         }
        $post->update($request->all());
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $post->update($input);
        return redirect()->route('post.index')

        ->with('success','post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Gate::denies('access-admin')){
            abort('403');
         }
        $post->delete();

        return redirect()->route('post.index')

                        ->with('success','post deleted successfully');
    }

    //api
    public function getPost()
    {
        $posts = Post::all()->map(function ($post) {
            return [
                'id' => $post->id,
                'name' => $post->name,
                'address' => $post->adress,
                'price' => $post->price,
                'content' => $post->content,
                'author' => $post->author,
                'image' => asset('image/' . $post->image),
            ];
        });
        return response()->json($posts);
    }
}


