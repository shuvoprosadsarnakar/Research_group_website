<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reference;
use DB;
use App\Post;

class ReferenceController extends Controller
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
        $data['data'] = DB::table('references')->get();
        $postData['postData']=DB::table('posts')->get();
        return view('referenceCreateOrEdit',$data, $postData);
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
            'title'=>'required|max:255',
            'link'=>'required|max:255|url',
            'postId'=>'required'
        ]);
        $title = $request->input('title');
        $link = $request->input('link');
        $postId = $request->input('postId');
        $data=array('title'=>$title,'link'=>$link,'postId'=>$postId);
        DB::table('references')->insert($data);
        $request->session()->flash('alert-success', 'Reference was successful added!');
        return redirect()->route("reference_create");
        
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
        $data = DB::table('references')->get();
        $postData=DB::table('posts')->get();
        $rEditInfo = Reference::with('post')->find($id);
        // dd($groupData);
        return view('referenceCreateOrEdit',compact('data','postData','rEditInfo'));
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
        $title = $request->input('title');
        $postId = $request->input('postId');
        $link = $request->input('link');
        $data=array('title'=>$title,'postId'=>$postId,'link'=>$link);
        Reference::where('id',$id)->update($data);
        $request->session()->flash('alert-success', 'Reference was successful Updated!');
        return redirect()->route("reference_create");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Reference::find($id);
        Reference::destroy($id);
        return redirect()->route("reference_create")->with('flash_message', 'Reference deleted!');
    }
}
