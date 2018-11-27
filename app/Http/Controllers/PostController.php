<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Input as Input;
use Session;
use File;
use DB;

use App\Post;
use App\PostType;
use App\Group;
use App\Member;


class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('group')->orderBy('startDate','desc')->simplePaginate(3);
        return view('postList',compact('groups'));
    }
    /**
     * Display a listing of the posts ordered by user preference.
     *
     */
    public function orderedIndex($criteria,$order)
    {
        if(isset($criteria) && isset($order)){
            if( $criteria=='title' || $criteria=='description' || $criteria=='startDate' || $criteria=='finishDate' && $order=='asc' || $order=='desc'){
                
                $posts = Post::with('group')->orderBy($criteria,$order)->simplePaginate(3);
                
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
    public function create($criteria,$order)
    {
        if(isset($criteria) && isset($order)){
            if( $criteria=='title' || $criteria=='description' || $criteria=='startDate' || $criteria=='finishDate' && $order=='asc' || $order=='desc'){
                
                $posts = Post::with('group','postType')->orderBy($criteria,$order)->simplePaginate(3);
                $groups = Group:: get();
                $members = Member:: get();
                $types = PostType:: get();
                return view('postCreateOrEdit',compact('groups','members','posts','types'));
            }
        }
        return redirect()->back();   
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->status = $request->status;
        $post->description = $request->description;
        $post->startDate = $request->startDate;
        $post->finishDate = $request->finishDate;
        //$post->image = $request->image;
        $post->typeId = $request->type;
        $post->startDate = $request->startDate;
        $post->finishDate = $request->finishDate;
        $post->save();

        $post->group()->sync($request->groupId,false);
        $post->member()->sync($request->memberId,false);

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
        $posts = Post::with('group','postType')->simplePaginate(3);
        $groups = Group:: get();
        $members = Member:: get();
        $types = PostType:: get();

        $postEditInfo = Post::with('group','postType','member')
                        ->get()
                        ->whereIn('id', $id)
                        ->first();
                        
        //dd($postEditInfo);
        return view('postCreateOrEdit',compact('groups','members','posts','types','postEditInfo'));
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
        $post=Post::find($id);
        $post->title = $request->title;
        $post->status = $request->status;
        $post->description = $request->description;
        $post->startDate = $request->startDate;
        $post->finishDate = $request->finishDate;
        //$post->image = $request->image;
        $post->typeId = $request->type;
        $post->startDate = $request->startDate;
        $post->finishDate = $request->finishDate;
        $post->save();

        $post->group()->sync($request->groupId,false);
        $post->member()->sync($request->memberId,false);
        Session::flash('success','Post updated ');            
        return redirect()->route('post_create',['criteria' => 'startDate','order' => 'desc']);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->group()->detach();
        $post->member()->detach();
        Post::destroy($id);
        Session::flash('success','Post deleted');            
        return redirect()->back();
    }
}
