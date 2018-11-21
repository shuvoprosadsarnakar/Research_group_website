<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Input as Input;
use Session;
use File;

use App\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::with('group')->orderBy('startDate','asc')->get();
        $posts = Post::with('group')->orderBy('startDate','desc')->simplePaginate(2);
        //$posts = Post::with('group')->orderBy('title','asc')->get();
        //$posts = Post::with('group')->orderBy('title','desc')->get();
        //$posts = Post::with('group')->orderBy('finishDate','asc')->get();
        //$posts = Post::with('group')->orderBy('finishDate','desc')->get();
        //dd($posts);
        return view('postList')->with('posts',$posts);
    }
    /**
     * Display a listing of the posts ordered by user preference.
     *
     */
    public function orderedIndex($criteria,$order)
    {
        if(isset($criteria) && isset($order)){
            if(strtolower($criteria)=='title' && strtolower($order)=='asc'){
                $posts = Post::with('group')->orderBy('title','asc')->simplePaginate(6);
                return view('postList')->with('posts',$posts);
            }
            elseif(strtolower($criteria)=='title' && strtolower($order)=='desc'){
                $posts = Post::with('group')->orderBy('title','desc')->simplePaginate(6);
                return view('postList')->with('posts',$posts);
            }
            elseif(strtolower($criteria)=='startdate' && strtolower($order)=='asc'){
                $posts = Post::with('group')->orderBy('startDate','asc')->simplePaginate(6);
                return view('postList')->with('posts',$posts);
            }
            elseif(strtolower($criteria)=='startdate' && strtolower($order)=='desc'){
                $posts = Post::with('group')->orderBy('startDate','desc')->simplePaginate(6);
                return view('postList')->with('posts',$posts);
            }
            elseif(strtolower($criteria)=='finishdate' && strtolower($order)=='asc'){
                $posts = Post::with('group')->orderBy('finishDate','asc')->simplePaginate(6);
                return view('postList')->with('posts',$posts);
            }
            elseif(strtolower($criteria)=='finishdate' && strtolower($order)=='desc'){
                $posts = Post::with('group')->orderBy('finishDate','desc')->simplePaginate(6);
                return view('postList')->with('posts',$posts);
            }
        }
        return redirect()->back();
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


        Session::flash('success','post created ');
        return redirect()->back();
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('postDetails')->with('post',$post);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('postCreateOrEdit')->with('post',$post);
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
