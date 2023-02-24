<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('listings',[
        'headers' => 'latest listings',
        'listings' => Listing::all(),
    ]);
});

Route::get('/listing/{id}', function($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});
// Route::get('/hello', function () {
//     return response('<h1>hello world</h1>', 200)->header('content-type', 'text/plain');
// });

// Route::get('/search', function(Request $request){
//     dd($request->name.' '. $request->country);
// });