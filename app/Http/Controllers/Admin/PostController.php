<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('post.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.post_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:posts,name',
            ]);
            $post = Post::create([
                'name'=> $request['name'],
                'content'=> $request['content'],
                'created_by'=> $request['created_by'],
            ]);
            session()->flash('success',__('Post successfully Created'));
            return redirect()->route('post.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
            return view('post.post_show',compact('post'));
        } catch (\Throwable $th) {
            session()->flash('failed',__('Something Went wrong !!!'));
            return redirect()->route('post.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (isset($post)) {           
            return view('post.post_edit',compact('post'));
        }else{
            session()->flash('failed',__('Data not Found!!!'));
            return redirect()->route('post.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $post=Post::findOrFail($id);
            $request->validate([
                'name' => 'required|unique:posts,name,'.$id,
            ]);
            $post->update([
                'name'=>$request['name'],
                'content'=>$request['content'],

            ]);
            session()->flash('success',__('Post successfully Updated !!'));
            return redirect()->back();
            
        } catch (\Throwable $th) {
           throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            session()->flash('success',__('Data deleted successfully'));
            return redirect()->route('post.index');

        } catch (\Throwable $th) {
            session()->flash('failed',__('Something Went wrong !!!'));
            return redirect()->route('post.index');
        }
        
    }
}
