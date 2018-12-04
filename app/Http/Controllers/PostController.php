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
use App\Image;
use App\MemberPost;
use App\GroupPost;


class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('group','postType')->orderBy('startDate','desc')->simplePaginate(10);
        return view('postList',compact('posts'));
    }
    /**
     * Display a listing of the posts ordered by user preference.
     *
     */
    public function orderedIndex($criteria,$order)
    {
        if(isset($criteria) && isset($order)){
            if( $criteria=='title' || $criteria=='description' || $criteria=='startDate' || $criteria=='finishDate' && $order=='asc' || $order=='desc'){
                
                $posts = Post::with('group','postType')->orderBy($criteria,$order)->simplePaginate(3);
                
                return view('postList')->with('posts',$posts);
            }
        }
        return redirect()->back();
    }
    /**
     * Display a listing of the posts by type.
     *
     */
    public function typedIndex($type,$criteria,$order)
    {
        if(isset($criteria) && isset($order) && isset($type)){
            if( $criteria=='title' || $criteria=='description' || $criteria=='startDate' || $criteria=='finishDate' && $order=='asc' || $order=='desc'){
                
                $postType = PostType::where('name',$type)
                ->get()
                ->first();

                if(isset($postType->id)){
                    $posts = Post::with('group','postType')
                    ->orderBy($criteria,$order)
                    ->where('typeId',$postType->id)
                    ->simplePaginate(12);
                    return view('postListType',compact('posts','postType'));
                }
                Session::flash('alert','Post type dosent exists');
                return redirect()->back();
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
                
                $posts = Post::with('group','postType')->orderBy($criteria,$order)->simplePaginate(10);
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
        if ($request->hasFile('imagePath')) {
            if($request->file('imagePath')->isValid()) {
                try {
                    $file = $request->file('imagePath');
                    $imagePath = time() . '.' . $file->getClientOriginalExtension();
                    $request->file('imagePath')->move("uploads", $imagePath);
                    $post->thumbNail = $imagePath;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            } 
        }
        $post->typeId = $request->type;
        $post->startDate = $request->startDate;
        $post->finishDate = $request->finishDate;
        $post->save();

        if($request->groupId > 0)
        $post->group()->sync($request->groupId,false);

        if($request->memberId > 0)
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
        $post = Post::with('group','member','image')->where('id', $id)->first();
        return view('postDetails',compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::with('group','postType')->simplePaginate(10);
        $groups = Group:: get();
        $members = Member:: get();
        $types = PostType:: get();

        $postEditInfo = Post::with('group','postType','member')
                        ->where('id', $id)
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
        if ($request->hasFile('imagePath')) {
            if($request->file('imagePath')->isValid()) {
                try {
                    $file = $request->file('imagePath');
                    $imagePath = time() . '.' . $file->getClientOriginalExtension();
                    $request->file('imagePath')->move("uploads", $imagePath);
                    $post->thumbNail = $imagePath;
                    $data=Post::find($id);
                    if(file_exists("uploads/".$data->thumbNail)){
                        File::delete("uploads/".$data->thumbNail);
                    }

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            }
        }else{
            $data=Post::find($id);
            $post->thumbNail=$data->thumbNail;
        } 
        $post->typeId = $request->type;
        $post->startDate = $request->startDate;
        $post->finishDate = $request->finishDate;
        $post->save();

        if($request->groupId > 0){
            $post->group()->sync($request->groupId,false);
        }
        else {
            $post->group()->detach();
        }

        if($request->memberId > 0){
            $post->member()->sync($request->memberId,false);
        }else {
            $post->member()->detach();
        }

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
        if(isset($post)){
            if(file_exists("uploads/".$post->thumbNail)){
                File::delete("uploads/".$post->thumbNail);
            }
        }
        $post->group()->detach();
        $post->member()->detach();
        Post::destroy($id);
        Session::flash('success','Post deleted');            
        return redirect()->back();
    }
}
