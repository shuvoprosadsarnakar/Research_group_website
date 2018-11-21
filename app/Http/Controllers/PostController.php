<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::with('group')->get();
        //$posts = Post::with('group')->orderBy('startDate','asc')->get();
        $posts = Post::with('group')->orderBy('startDate','desc')->get();
        //$posts = Post::with('group')->orderBy('title','asc')->get();
        //$posts = Post::with('group')->orderBy('title','desc')->get();
        //$posts = Post::with('group')->orderBy('finishDate','asc')->get();
        //$posts = Post::with('group')->orderBy('finishDate','desc')->get();

        //dd($posts);
        return view('postPublic')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postCreateOrEdit');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump($request);
        //dd($request);
        
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
