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
use App\GroupPost;
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

    /**
     * Show the form for creating a new group.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group:: simplePaginate(10);
        $groupAll = Group:: get();
        $members = Member:: get();
        $groupWithMembers = Group::with('member')->simplePaginate(10);
        //dd($groupWithMembers);
        //var_dump($groupWithMembers);
        return view('groupCreateOrEdit',compact('groups','groupAll','members','groupWithMembers'));
    }

    /**
     * Store a newly created group in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group;
        $group->groupName = $request->groupName;
        $group->groupDescription = $request->description;
        if ($request->hasFile('imagePath')) {
            if($request->file('imagePath')->isValid()) {
                try {
                    $file = $request->file('imagePath');
                    $imagePath = time() . '.' . $file->getClientOriginalExtension();
                    $request->file('imagePath')->move("uploads", $imagePath);
                    $group->thumbNail = $imagePath;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            } 
        }
        $group->save();
        Session::flash('success','Group created ');            
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group:: simplePaginate(10);
        $groupAll = Group:: get();
        $members = Member:: get();
        $groupWithMembers = Group::with('member')->simplePaginate(10);
        $groupEditInfo = Group::find($id);
        return view('groupCreateOrEdit',compact('groups','members','groupEditInfo','groupWithMembers'));
    }

    /**
     * Update the specified group in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->groupName = $request->groupName;
        $group->groupDescription = $request->description;
        if ($request->hasFile('imagePath')) {
            if($request->file('imagePath')->isValid()) {
                try {
                    $file = $request->file('imagePath');
                    $imagePath = time() . '.' . $file->getClientOriginalExtension();
                    $request->file('imagePath')->move("uploads", $imagePath);
                    $group->thumbNail = $imagePath;
                    $data=Group::find($id);
                    if(file_exists("uploads/".$data->thumbNail)){
                        File::delete("uploads/".$data->thumbNail);
                    }

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            }
        }else{
            $data=Group::find($id);
            $group->thumbNail=$data->thumbNail;
        } 
        $group->save();
        Session::flash('success','Group updated ');            
        return redirect()->route("group_create");
    }

    /**
     * Remove the specified group from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Group=Group::find($id);
        $Group->member()->detach();
        Group::destroy($id);
        Session::flash('success','Group deleted');            
        return redirect()->back();
    }

    /**
     * Store a newly created groupmember in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gmStore(Request $request)
    {
        
        $Group = Group::find($request->groupId);
        $Group->member()->sync($request->memberId,false);
        Session::flash('success','Members are added to the group ');            
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified groupmember.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gmEdit($id)
    {
        $groups = Group:: simplePaginate(10);
        $groupAll = Group:: get();
        $members = Member:: get();
        $groupWithMembers = Group::with('member')->simplePaginate(10);
        $gmEditInfo = Group::with('member')->find($id);
        return view('groupCreateOrEdit',compact('groups','groupAll','members','groupWithMembers','gmEditInfo'));
    }

    /**
     * Update the specified groupmember in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gmUpdate(Request $request, $id)
    {
        //dd($request);
        if($request->previousSelectedGroupId != $request->groupId){
            $Group=Group::find($request->previousSelectedGroupId);
            $Group->member()->detach($request->memberId,false);
        }

        if($request->memberId > 0){
        $Group=Group::find($request->groupId);
        $Group->member()->sync($request->memberId,false);
        }
        else{
            $Group=Group::find($request->groupId);
            $Group->member()->detach();
        }
        Session::flash('success','Group member associations updated ');            
        return redirect()->route("group_create");
    }
}