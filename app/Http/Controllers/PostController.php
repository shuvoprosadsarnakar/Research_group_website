<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Input as Input;
use Session;
use File;
use DB;


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
        $posts = Post::with('group')->orderBy('startDate','desc')->simplePaginate(3);
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
                
                $posts = Post::with('group')->orderBy($criteria,$order)->simplePaginate(3);
                
                return view('postCreateOrEdit')->with('posts',$posts);
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
    public function store(Request $req)
    {
        //var_dump($request);
        //dd($request);
        $title = $req->input('title');
        $status = $req->input('status');
        $description = $req->input('description');
        $startDate = $req->input('startDate');
        $finishDate = $req->input('finishDate');
        $image = $req->input('image');
        $type = $req->input('type');
        $group = $req->input('group[]');
        $member = $req->input('member[]');

       
        $types = array('name'=> $type);
        //$groups = array('groupName'=>$group);
        //$members = array('');
        $typesId = DB::table('posttypes')->where(['name'=>$types])->value('id');
        $data = array('title'=> $title,'typeId'=> $typesId,'status'=> $status,'description'=> $description,
        'startDate'=> $startDate,'finishDate'=> $finishDate);

        DB::table('posts')->insert($data);






        //Session::flash('success','post created ');
        //return redirect()->back();
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
        //return view('postCreateOrEdit')->with('post',$post);
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
