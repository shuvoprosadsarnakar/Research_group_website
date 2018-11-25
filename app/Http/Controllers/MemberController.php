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

class MemberController extends Controller
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
    public function add_member(){
        $data['data'] = DB::table('members')->get();
        $groupData['groupData']=DB::table('groups')->get();
        return view('memberCreateOrEdit',$data, $groupData);
    }

        
    public function insertMember(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'designation'=>'required|max:255',
            'github'=>'nullable|max:255|url',
            'linkedin'=>'required|max:255|url',
            'researchArea'=>'required|max:1024',
            'interest'=>'nullable|max:1024',
            'imagePath'=>'required|image',
            'email'=>'required|max:1024',
            'phone'=>'required|max:255',
            'groupId'=>'nullable'
        ]);
        $name = $request->input('name');
        $designation = $request->input('designation');
        $github = $request->input('github');
        $linkedin = $request->input('linkedin');
        $researchArea = $request->input('researchArea');
        $interest = $request->input('interest');
        if ($request->hasFile('imagePath')) {
            if($request->file('imagePath')->isValid()) {
                try {
                    $file = $request->file('imagePath');
                    $imagePath = time() . '.' . $file->getClientOriginalExtension();
        
                    $request->file('imagePath')->move("uploads", $imagePath);
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            } 
        }
        $email = $request->input('email');
        $phone = $request->input('phone');
        $data3=Member::all()->last();
        $memberId=$data3->id;
        $groupId=$request->input('groupId');
        $data=array('id'=>$memberId+1,'name'=>$name,'designation'=>$designation,'github'=>$github,'linkedin'=>$linkedin,'researchArea'=>$researchArea,'interest'=>$interest,'email'=>$email,'phone'=>$phone,'imagePath'=>$imagePath);
        DB::table('members')->insert($data);
        $data2=array('groupId'=>$groupId,'memberId'=>$memberId+1);
        DB::table('membergroups')->insert($data2);
        $request->session()->flash('alert-success', 'User was successful added!');
        return redirect()->route("member_create");
    }


    public function memberList(){

        $data['data'] = DB::table('members')->get();
        return view('memberList',$data);
    }



    public function editMember($id) {
        //dd($memberEditInfo);
        $data['data'] = DB::table('members')->get();
        $groupData['groupData']=DB::table('groups')->get();
        $memberEditInfo = Member::find($id);
        return view('memberCreateOrEdit',$data,['memberEditInfo'=>$memberEditInfo],$groupData);
    }


    public function memberDetails($id) {
        $data=Member::find($id);
        return view('memberdetail',['data'=>$data]);
    }
    public function deleteMember($id){
        $data=Member::find($id);
        if(isset($data)){
            if(file_exists("uploads/".$data->imagePath)){
                File::delete("uploads/".$data->imagePath);
            }
        }
        Member::destroy($id);
        return redirect()->route("member_create")->with('flash_message', 'Member deleted!');
    }
    public function updateMember(Request $request, $id){
       
        $name = $request->input('name');
        $designation = $request->input('designation');
        $github = $request->input('github');
        $linkedin = $request->input('linkedin');
        $researchArea = $request->input('researchArea');
        $interest = $request->input('interest');
        if ($request->hasFile('imagePath')) {
            if($request->file('imagePath')->isValid()) {
                try {
                    $file = $request->file('imagePath');
                    $imagePath = time() . '.' . $file->getClientOriginalExtension();
                    $request->file('imagePath')->move("uploads", $imagePath);

                    $data=Member::find($id);
                    if(file_exists("uploads/".$data->imagePath)){
                        File::delete("uploads/".$data->imagePath);
                    }

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            }
        }else{
            $data=Member::find($id);
            $imagePath=$data->imagePath;
        } 
        $email = $request->input('email');
        $phone = $request->input('phone');
        $groupId=$request->input('groupId');
        $data2=array('groupId'=>$groupId,'memberId'=>$id);
        MemberGroup::where('memberId',$id)->update($data2);
        $data=array('name'=>$name,'designation'=>$designation,'github'=>$github,'linkedin'=>$linkedin,'researchArea'=>$researchArea,'interest'=>$interest,'email'=>$email,'phone'=>$phone,'imagePath'=>$imagePath);
        Member::where('id',$id)->update($data);
        $request->session()->flash('alert-success', 'Member was successful Updated!');
        return redirect()->route("member_create");
        }

        
    }