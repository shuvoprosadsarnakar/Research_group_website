<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;
use Session;
use File;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $p = Project::orderBy('name','asc')->paginate(8);
        return view('project',['p'=>$p]);

    }
    public function projectdetails($id)
    {

        $p =Project::find($id);
        return view('projectdetail')->with('p',$p);

    }
    public function createproject(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:projects',
            'image'=>'nullable|image',
            'details'=>'required|max:1024',
            'git'=>'nullable|max:255|url',
            'youtube'=>'nullable|max:255|url',
            'demo'=>'nullable|max:255|url'
        ]);
        if (Auth::check()) 
        {
            $p = new Project;
            if ($request->hasFile('image'))
            {
            $imageName = time().request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads'), $imageName);
            $p->image='uploads/'.$imageName;
            }
            $p->name=$request->name;
            $p->details=$request->details;
            $p->git=$request->git;
            $p->youtube=$request->youtube;
            $p->demo=$request->demo;
            $p->save();

            Session::flash('success','Project created ');            

            return redirect()->back();
        }    
    }

    public function deleteproject($id)
    {

        if (Auth::check()) {
            $p =Project::find($id);
            if(file_exists($p->image))
            {
            File::delete($p->image);
            }
            $p->delete();
            Session::flash('success','Project deleted '); 
            return redirect()->back();
        }

    }
    public function updateproject($id)
    {

        if (Auth::check()) {
            $p =Project::find($id);
            return view('updateproject')->with('m',$p);
        }

    }

    public function saveproject(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:projects',
            'image'=>'nullable|image',
            'details'=>'required|max:1024',
            'git'=>'nullable|max:255|url',
            'youtube'=>'nullable|max:255|url',
            'demo'=>'nullable|max:255|url'
        ]);
        if (Auth::check()) 
        {
            $p = Project::find($id);
            if(file_exists($p->image))
            {
            File::delete($p->image);
            }
            if(request('image'))
            {
            $imageName = time().request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads'), $imageName);
            $p->image='uploads/'.$imageName;
            }
            
            $p->name=$request->name;
            $p->details=$request->details;
            $p->git=$request->git;
            $p->youtube=$request->youtube;
            $p->demo=$request->demo;
            $p->save();

            Session::flash('success','Project updated');            

            return redirect('admindashboard3');
        }    
    }
}
