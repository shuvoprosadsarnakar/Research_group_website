<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use File;
use DB;
use App\Http\Requests;
use App\Member;

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
        return view('memberCreateOrEdit',$data);
    }

        
    public function insertMember(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'designation'=>'required|max:255',
            'github'=>'required|max:255|url',
            'linkedin'=>'required|max:255|url',
            'researchArea'=>'required|max:1024',
            'interest'=>'nullable|max:1024',
            'imagePath'=>'required|image',
            'email'=>'required|max:1024',
            'phone'=>'required|max:255',
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
        $data=array('name'=>$name,'designation'=>$designation,'github'=>$github,'linkedin'=>$linkedin,'researchArea'=>$researchArea,'interest'=>$interest,'email'=>$email,'phone'=>$phone,'imagePath'=>$imagePath);
        DB::table('members')->insert($data);
        $request->session()->flash('alert-success', 'User was successful added!');
        return redirect()->route("member_create");
    }
    public function memberList(){
        $data['data'] = DB::table('members')->get();
        return view('memberList',$data);
    }
    public function editMember($id) {
        $data=Member::find($id);
        return view('editMember',['data'=>$data]);
    }
    public function memberDetails($id) {
        $data=Member::find($id);
        return view('memberdetail',['data'=>$data]);
    }
    public function deleteMember($id){
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
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
        
                }
            } 
        }
        $email = $request->input('email');
        $phone = $request->input('phone');
            
            $data=array('name'=>$name,'designation'=>$designation,'github'=>$github,'linkedin'=>$linkedin,'researchArea'=>$researchArea,'interest'=>$interest,'email'=>$email,'phone'=>$phone,'imagePath'=>$imagePath);
        
        Member::where('id',$id)->update($data);
        $request->session()->flash('alert-success', 'Member was successful Updated!');
        return redirect()->route("member_create");
        }

        
    }