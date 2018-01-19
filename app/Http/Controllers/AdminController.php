<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Member;
use App\Publication;
use App\project;
use App\Openposition;
use App\Deliverable;
use Auth;
use \Input as Input;
use Session;
use File;


class AdminController extends Controller
{
    public function AdminController(){
        $this->middleware('auth');
    }
    //show the admin panel login
    public function index()
    {
        if (Auth::check()) {
            $members = Member::orderBy('name','asc')->paginate(8);
            return view('admindashboard')->with('members',$members);
        }
        else{
            return view('admin');
        }

    }
    //show the admin dashboard edit members
    public function dashboard()
    {
                
        if (Auth::check()) {
            $members = Member::orderBy('name','asc')->paginate(8);
            return view('admindashboard')->with('members',$members);
        }
        else{
            Session::flash('alert','you are not authorized');
            return redirect()->back();
        }

    }
    //show the admin dashboard edit publications
    public function dashboard2()
    {
        if (Auth::check()) {
            $publications = Publication::orderBy('name','asc')->paginate(8);
            return view('admindashboard2',['publications'=>$publications]);
        }
        else{
            Session::flash('alert','you are not authorized');
            return redirect()->back();
            
        }
        

    }
    public function dashboard3()
    {
        if (Auth::check()) {
            $p = Project::orderBy('name','asc')->paginate(8);
            return view('admindashboard3',['p'=>$p]);
        }
        else{
            Session::flash('alert','you are not authorized');
            return redirect()->back();
            
        }
        

    }
    public function dashboard4()
    {
        if (Auth::check()) {
            $p = Openposition::orderBy('name','asc')->paginate(8);
            return view('admindashboard4',['p'=>$p]);
        }
        else{
            Session::flash('alert','you are not authorized');
            return redirect()->back();
            
        }
        

    }
    public function dashboard5()
    {
        if (Auth::check()) {
            $p = Deliverable::orderBy('name','asc')->paginate(8);
            return view('admindashboard5',['p'=>$p]);
        }
        else{
            Session::flash('alert','you are not authorized');
            return redirect()->back();
            
        }
        

    }
    //check email password & login user
    public function login(Request $request)
    {
        //echo "vydhbjnc";
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            
            Session::flash('success','Logged in');
            return redirect('/admindashboard');
        }
        else{
            Session::flash('alert','wrong username or password');
            return redirect()->back();
        }
        
    }
    public function logout(Request $request)
    {

        Auth::logout();
        Session::flash('success','Logged out');
        return view('admin');

        
    }
    //create member
    public function dbmember(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'image'=>'required|image',
            'designation'=>'required|max:255',
            'details'=>'required|max:1024',
        ]);
        if (Auth::check()) {
            $member = new Member;
            if(request('image'))
            {
            $imageName = time().request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads'), $imageName);
            $member->image='uploads/'.$imageName;
            }
            $member->name=$request->name;
            $member->designation=$request->designation;
            $member->details=$request->details;
            $member->save();

            Session::flash('success','Member created ');            

            return redirect()->back();

        }
    
    }

    public function deletemember($id)
    {

        if (Auth::check()) {
        $member =Member::find($id);
        if(file_exists($member->image))
        {
        File::delete($member->image);
        }
        $member->delete();
        Session::flash('success','Member deleted '); 
        return redirect()->back();
        }
    
    }
    public function updatemember($id)
    {
        if (Auth::check()) {
        $member =Member::find($id);
        return view('updatemember')->with('member',$member);
        }
    
    }
    public function savemember(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'image'=>'required|image',
            'designation'=>'required|max:255',
            'details'=>'required|max:1024',
        ]);
        if (Auth::check()) {
            $member =Member::find($id);
            if(file_exists($member->image))
            {
            File::delete($member->image);
            }
            if(request('image'))
            {
            $imageName = time().request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads'), $imageName);
            $member->image='uploads/'.$imageName;
            }
            $member->name=$request->name;
            $member->designation=$request->designation;
            $member->details=$request->details;
            $member->save();
            Session::flash('success','Member updated '); 
            return redirect('/admindashboard');
        }
    
    }
//create publication
    public function dbpublications(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:publications,name',
            'link'=>'required|max:255|url'
        ]);
        if (Auth::check()) {
        $publications =new Publication;
        $publications->name=$request->name;
        $publications->link=$request->link;
        $publications->save();

        Session::flash('success','Publication created '); 
        return redirect()->back();
        }
    
    }

    public function deletepublications($id)
    {
        if (Auth::check()) {
        $publications =Publication::find($id);
        $publications->delete();

        Session::flash('success','Publication deleted '); 
        return redirect()->back();
        }
    
    }

    public function updatepublications($id)
    {
        if (Auth::check()) {
        $publications =Publication::find($id);

        return view('updatepublication')->with('publications',$publications);
        }
    
    }
    public function savepublications(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:publications,name',
            'link'=>'required|max:255|url'
        ]);
        if (Auth::check()) {
        $publications =Publication::find($id);
        $publications->name=$request->name;
        $publications->link=$request->link;
        $publications->save();

        Session::flash('success','Publication updated '); 
        return redirect('/admindashboard2');
        }
    
    }
    public function searchpublications(Request $request)
    {


        $publications =\App\Publication::where('name','like','%'.$request->search.'%')->paginate();
        
        return view('publications',['publications'=>$publications]);        
    
    }

}