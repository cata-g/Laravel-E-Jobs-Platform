<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Listing;

class ListingController extends Controller
{

    //show all listings
    public function index(){
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter((request(['tag', 'search'])))->paginate(6)
        ]);
    }

    //show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //create listing
    public function create(){
        return view('listings.create');
    }

    //store listing
    public function store(Request $request){
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);

        Listing::create($formFields);

        

        return redirect('/')->with('message', 'Listing Created Successfully');

    }
}
