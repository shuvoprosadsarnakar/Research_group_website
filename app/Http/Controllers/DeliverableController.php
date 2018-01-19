<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliverable;
use Auth;
use Session;
use File;

class DeliverableController extends Controller
{
    public function index()
    {

        $p = Deliverable::orderBy('name','asc')->paginate(8);
        return view('deliverable',['o'=>$p]);

    }

    public function createdeliverable(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:deliverables',
            'image'=>'required|image',
            'details'=>'required|max:1024',
            'link'=>'required|max:255|url'
        ]);
        if (Auth::check()) 
        {
            $p = new Deliverable;
            if ($request->hasFile('image'))
            {
            $imageName = time().request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads'), $imageName);
            $p->image='uploads/'.$imageName;
            }
            $p->name=$request->name;
            $p->details=$request->details;
            $p->link=$request->link;
            $p->save();

            Session::flash('success','Deliverable created ');            

            return redirect()->back();
        }    
    }

    public function deletedeliverable($id)
    {

        if (Auth::check()) {
            $p =Deliverable::find($id);
            if(file_exists($p->image))
            {
            File::delete($p->image);
            }
            $p->delete();
            Session::flash('success','deliverable deleted '); 
            return redirect()->back();
        }

    }

    public function updatedeliverable($id)
    {

        if (Auth::check()) {
            $p =Deliverable::find($id);
            return view('updatedeliverable')->with('m',$p);
        }

    }

    public function savedeliverable(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:deliverables',
            'image'=>'required|image',
            'details'=>'required|max:1024',
            'link'=>'required|max:255|url'
        ]);
        if (Auth::check()) 
        {
            $p = Deliverable::find($id); 
            if(file_exists($p->image))
            {
            File::delete($p->image);
            }
            if ($request->hasFile('image'))
            {
            $imageName = time().request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads'), $imageName);
            $p->image='uploads/'.$imageName;
            }         
            $p->name=$request->name;
            $p->details=$request->details;
            $p->link=$request->link;
            $p->save();

            Session::flash('success','deliverable updated');            
            return redirect('admindashboard5');
        }    
    }
}
