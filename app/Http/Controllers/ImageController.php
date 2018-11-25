<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reference;
use DB;
use App\Post;
use App\Image;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('images')->get();
        $postData=DB::table('posts')->get();
        $data3=Image::all()->last();
        //dd($data3);
        return view('imageCreateOrEdit',compact('data', 'postData','data3'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'postId'=>'required',
            'path'=>'required|image'
        ]);
        $name = $request->input('name');
        $postId = $request->input('postId');
        if ($request->hasFile('path')) {
            if($request->file('path')->isValid()) {
                try {
                    $file = $request->file('path');
                    $path = time() . '.' . $file->getClientOriginalExtension();
        
                    $request->file('path')->move("uploads", $path);
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            } 
        }
        $data=array('name'=>$name,'postId'=>$postId,'path'=>$path);
        DB::table('images')->insert($data);
        $request->session()->flash('alert-success', 'Image was successful added!');
        return redirect()->route("image_create");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('images')->get();
        $postData=DB::table('posts')->get();
        $iEditInfo = Image::with('post')->find($id);
        // dd($groupData);
        return view('imageCreateOrEdit',compact('data','postData','iEditInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $postId = $request->input('postId');
        if ($request->hasFile('imagePath')) {
            if($request->file('path')->isValid()) {
                try {
                    $file = $request->file('path');
                    $path = time() . '.' . $file->getClientOriginalExtension();
                    $request->file('path')->move("uploads", $path);

                    $data=Image::find($id);
                    if(file_exists("uploads/".$data->path)){
                        File::delete("uploads/".$data->path);
                    }

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            }
        }else{
            $data=Image::find($id);
            $path=$data->path;
        } 
        $data=array('name'=>$name,'postId'=>$postId,'path'=>$path);
        Image::where('id',$id)->update($data);
        $request->session()->flash('alert-success', 'Image was successful Updated!');
        return redirect()->route("image_create");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Image::find($id);
        Image::destroy($id);
        return redirect()->route("image_create")->with('flash_message', 'Image deleted!');
    }
}
