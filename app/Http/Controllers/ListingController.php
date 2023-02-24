<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(){
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag','search']))->get(),
        ]);
    }

    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create(Listing $listing){
        return view('listings.create');
    }

    public function store(Request $request){
        $formField = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required',
        ]);
        Listing::create($formField);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
