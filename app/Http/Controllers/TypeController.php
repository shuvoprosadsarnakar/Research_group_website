<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PostType;



class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data'] = DB::table('posttypes')->get();
        return view('typeCreateOrEdit',$data);
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
        ]);
        $name = $request->input('name');
        $data=array('name'=>$name);
        DB::table('posttypes')->insert($data);
        $request->session()->flash('alert-success', 'Type was successful added!');
        return redirect()->route("type_create");

     
        

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
        $data = DB::table('posttypes')->get();
        $typeEditInfo=PostType::find($id);
        return view('typeCreateOrEdit',compact('data','typeEditInfo'));
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
        $data=array('name'=>$name);
        PostType::where('id',$id)->update($data);
        $request->session()->flash('alert-success', 'Type was successful Updated!');
        return redirect()->route("type_create");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=PostType::find($id);
        PostType::destroy($id);
        return redirect()->route("type_create")->with('flash_message', 'Type deleted!');
    }
}
