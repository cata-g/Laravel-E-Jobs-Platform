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
            'type' => 'required',
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'salary' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        

        return redirect('/')->with('message', 'Listing Created Successfully');

    }

    //edit listing
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing){

        // Make sure logged in user is owner
        if($listing->user_id != auth()->id())
            abort('403', 'Unauthorized action');

        $formFields = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'salary' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        

        return back()->with('message', 'Listing Updated Successfully');
    }

    //Delete listing
    public function destroy(Listing $listing){
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id())
            abort('403', 'Unauthorized action');
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }

    //Manage Listing
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
