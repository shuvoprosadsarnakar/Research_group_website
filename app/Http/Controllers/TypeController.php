<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PostType;



class TypeController extends Controller
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
        return view('typeCreateOrEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeName = $request->input('name');
        $existingData = DB::table('posttypes')->pluck('name')->toArray();
        if(in_array($typeName,$existingData)){   //case sensitive data can not be compared
        //    session()->flash('existmessage','Post Type Already Exists');
        //    return view('typeCreateOrEdit');
        return "Post Type Already Exists";

        }else {
            $newData=array("name"=>$typeName);
            DB::table('posttypes')->insert($newData);
           
        }

        // $insert =PostType::firstOrCreate(['name' => $typeName]);
        // $insert->save();

        

     
        

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
