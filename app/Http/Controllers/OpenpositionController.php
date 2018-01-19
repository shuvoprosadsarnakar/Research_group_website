<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Openposition;
use Auth;
use \Input as Input;
use Session;

class OpenpositionController extends Controller
{
    public function index()
    {

        $p = Openposition::orderBy('name','asc')->paginate(8);
        return view('openpositions',['o'=>$p]);

    }
    public function createOpenposition(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:deliverables',
            'details'=>'required|max:1024',
            'link'=>'required|max:255|url'
        ]);
        if (Auth::check()) {
        $p =new Openposition;
        $p->name=$request->name;
        $p->details=$request->details;
        $p->link=$request->link;
        $p->save();

        Session::flash('success','Position created '); 
        return redirect()->back();
        }
    
    }

    public function deleteOpenposition($id)
    {

        if (Auth::check()) {
            $p =Openposition::find($id);
            $p->delete();
            Session::flash('success','Openposition deleted '); 
            return redirect()->back();
        }

    }

    public function updateOpenposition($id)
    {

        if (Auth::check()) {
            $p =Openposition::find($id);
            return view('updateOpenposition')->with('m',$p);
        }

    }

    public function saveOpenposition(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:deliverables',
            'details'=>'required|max:1024',
            'link'=>'required|max:255|url'
        ]);
        if (Auth::check()) 
        {
            $p = Openposition::find($id);          
            $p->name=$request->name;
            $p->details=$request->details;
            $p->link=$request->link;
            $p->save();

            Session::flash('success','Project updated');            
            return redirect('admindashboard4');
        }    
    }
}
