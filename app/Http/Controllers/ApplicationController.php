<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Application;

class ApplicationController extends Controller
{


    public function create(Listing $listing){
        
        return view('applications.create', ['listing' => $listing]);
    }

    public function store(Request $request, Listing $listing){

        $formFields = $request->validate([
            'priorWork' => 'required',
            'portofolioWork' => 'required',
            'desiredSalary' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['listing_id'] = $listing->id;
        Application::create($formFields);

        

        return redirect('/')->with('message', 'Application Created Successfully');

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
