<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Member;
use App\Publication;
use App\project;
use App\Openposition;
use App\Deliverable;
use \Input as Input;
use Session;
use File;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function admin()
    {
        if (Auth::check()) {
            $members = Member::orderBy('name','asc')->paginate(8);
            return view('adminPanel')->with('members',$members);
        }
        else{
            return view('auth/login');
        }

    }
    public function memberList(){

        $data['data'] = DB::table('members')->get();
        return view('memberList',$data);
    }
    public function memberDetails($id) {
        $data=Member::find($id);
        return view('memberdetail',['data'=>$data]);
    }

}