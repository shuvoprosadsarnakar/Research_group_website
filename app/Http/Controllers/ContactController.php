<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Mail;


class ContactController extends Controller
{
    public function index()
    {

        return view('contact');

    }
    public function email(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|email',
            'message'=>'required|max:500|min:10'
        ]);
        
        Mail::send('email', [
            'name' => $request->name, 
            'email' => $request->email, 
            'body' => $request->message], 
            function ($message) use($request)
        {

            $message->from($request->email, $request->name);

            $message->to('kmi@ambientintelligencelab.com');

        });
        Session::flash('success','Message delivered');
        return redirect()->back();

    }
}
