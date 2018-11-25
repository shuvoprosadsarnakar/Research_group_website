<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use File;
use DB;
use App\Http\Requests;
use App\Member;
use App\Group;
use App\MemberGroup;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    public function addGroup(){
        $data['data'] = DB::table('groups')->get();
        return view('groupCreateOrEdit',$data);
    }

        
    public function insertGroup(Request $request){
        $this->validate($request,[
            'groupName'=>'required|max:255',
        ]);
        $groupName = $request->input('groupName');
        $data=array('groupName'=>$groupName);
        DB::table('groups')->insert($data);
        $request->session()->flash('alert-success', 'Group was successful added!');
        return redirect()->route("groupCreate");
    }

    public function editGroup($id) {
        $data = DB::table('groups')->get();
        $groupEditInfo = Group::find($id);
        return view('groupCreateOrEdit',compact('data','groupEditInfo'));
    }
    public function deleteGroup($id){
        $data=Group::find($id);
        Group::destroy($id);
        return redirect()->route("groupCreate")->with('flash_message', 'Group deleted!');
    }
    public function updateGroup(Request $request, $id){
       
        $groupName = $request->input('groupName');
        $data=array('groupName'=>$groupName);
        Group::where('id',$id)->update($data);
        $request->session()->flash('alert-success', 'Group was successful Updated!');
        return redirect()->route("groupCreate");
        }

        
    }