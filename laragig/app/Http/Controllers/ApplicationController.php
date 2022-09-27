<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ApplicationController extends Controller
{


    public function create(Listing $listing){
        
        return view('applications.create', ['listing' => $listing]);
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
}
