<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Input as Input;
use Session;
use File;
use DB;
use App\Post;
use App\Publication;
use App\Report;

class CitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postData=Post::get();
        return view('citationCreateOrEdit',compact('postData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $authors = $request->author;
        $published = $request->published;
        $journal = $request->journal;
        $volume = $request->volume;
        $issue = $request->issue;
        $pages = $request->pages;
        $doi = $request->doi;
        $database = $request->database;
        $url = $request->url;
        $date = $request->date;

        $rauthor = '';
        if (isset($authors)) {
            $i = 0;
            $len = count($authors);
            foreach ($authors as $key => $author) {
                $array = explode(' ',trim($author));
                $fname = substr($array[0], 0, 1);
                $size = count($array);
                $lname = $array[$size-1];

                if ($i == 0) {
                    $rauthor = $rauthor.' '.$fname.'. '.$lname;
                } 
                else if ($i == $len - 1 && $len>1) {
                    $rauthor = $rauthor.' and '.$fname.'. '.$lname;
                }
                else {
                    $rauthor = $rauthor.', '.$fname.'. '.$lname;
                }
                $i++;
                
            }
        }

        $rtitle = '';
        if (isset($title)) {
            $rtitle = '"'.$title.'",';
        }

        $rjournal = '';
        if (isset($journal)) {
            $rjournal = '<i>'.$journal.'</i>,';
        }

        $rvolume = '';
        if (isset($volume)) {
            $rvolume = 'vol. '.$volume.',';
        }

        $rissue = '';
        if (isset($issue)) {
            $rissue = 'no. '.$issue.',';
        }

        $rpages = '';
        if (isset($pages)) {
            $rpages = 'pp. '.$pages.',';
        }

        $rpublished = '';
        if (isset($published)) {
            $rpublished = $published.' [online].';
        }

        $rurl = '';
        if (isset($url)) {
            $rurl = ' Available: '.$url.'.';
        }

        $rdate = '';
        if (isset($date)) {
            $temp=date_create($date);
            $rdate = ' [Accessed: '.date_format($temp,"d/M/Y").']';
        }
        
        $data = $rauthor.', '.$rtitle.$rjournal.$rvolume.$rissue.$rpages.$rpublished.$rurl.$rdate;
        $editInfo= $request;
        $postData=Post::get();
        return view('citationCreateOrEdit',compact('data','editInfo','postData'));
    }

    /**
     * save citation into database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveCite(Request $request)
    {
        if($request->type == "publication"){
            $this->validate($request,[
                'title'=>'required|max:1000',
                'link'=>'required|max:255|url',
                'postId'=>'required'
            ]);
            $p = new Publication;
            $p->title = $request->title;
            $p->link = $request->link;
            $p->postId = $request->postId;
            $p->save();
            //Session::flash('success','Citation created ');
            return redirect()->route("publication_create");
        }
        elseif ($request->type == "report") {
            $this->validate($request,[
                'title'=>'required|max:255',
                'link'=>'required|max:255|url',
                'postId'=>'required'
            ]);
            $p = new Report;
            $p->title = $request->title;
            $p->link = $request->link;
            $p->postId = $request->postId;
            $p->save();
            Session::flash('success','Citation created ');
            return redirect()->route("report_create");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
