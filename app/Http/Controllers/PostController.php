<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;

use App\Models\category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = post::all();
        return view('post.index' , [
            'posts' => $post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('post.create' , [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if($request->has('image')) {
            $file       = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads') , $image_name);
        }
        post::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
            'image' => $image_name,
        ]);

        return redirect()->route('post.index')->with([
            'success' => 'Create New Post',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = post::where('slug',$slug)->first();
        if($post){
            return view('post.edit' , [
                "post" => $post
            ]);
        }
        else{
            return redirect()->route('post.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $slug)
    {
        $post = post::where('slug' , $slug)->first();
        if($request->has('image')) {
            $file       = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads') , $image_name);
            unlink(public_path('uploads/' . $post->image) );
            $post->image = $image_name;
        }

        $post->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'image' => $post->image,
        ]);

        return redirect()->route('post.index')->with([
            'success' => "New Update!!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = post::where('slug' , $slug)->get();
        
        if(file_exists(public_path("uploads/" . $post->image) )){
            unlink(public_path('uploads/' . $post->image) );
        }
        $post->delete();
        return redirect()->route('post.index')->with([
            'success' => "Post delete!!"
        ]);
    }


}
