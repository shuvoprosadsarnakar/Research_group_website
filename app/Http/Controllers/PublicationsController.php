<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;

class PublicationsController extends Controller
{
    public function index()
    {

        $publications = Publication::orderBy('name','asc')->paginate(8);
        return view('publications',['publications'=>$publications]);

    }
}
