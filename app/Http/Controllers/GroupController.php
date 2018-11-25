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
        $groups = Group:: get();
        $members = Member:: get();
        $groupWithMembers = Group::with('member')->get();
        //dd($groupWithMembers);
        //var_dump($groupWithMembers);
        return view('groupCreateOrEdit',compact('groups','members','groupWithMembers'));
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
        $groups = Group:: get();
        $members = Member:: get();
        $groupEditInfo = Group::find($id);
        return view('groupCreateOrEdit',compact('groups','members','groupEditInfo'));
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
        $group->save();
        Session::flash('success','Group name updated ');            
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
        $data=Group::find($id);
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
        
        $Group=Group::find($request->groupId);
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
        $groups = Group:: get();
        $members = Member:: get();
        $groupWithMembers = Group::with('member')->get();
        $gmEditInfo = Group::with('member')->find($id);
        return view('groupCreateOrEdit',compact('groups','members','groupWithMembers','gmEditInfo'));
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
            $Group->member()->toggle($request->memberId,false);
        }
        $Group=Group::find($request->groupId);
        $Group->member()->sync($request->memberId,false);
        Session::flash('success','Group member associations updated ');            
        return redirect()->route("group_create");
    }
}