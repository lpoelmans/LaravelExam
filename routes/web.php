<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Savedmovie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/myfav', function () {
    $savedmovies = \App\Models\User::with('savedmovie')->find(auth()->user())->first();
    return view('myfav', compact('savedmovies'));
})->middleware(['auth'])->name('myfav');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/search', function (Request $request) {
    $search = $request->input('movie');
    $response = Http::get('http://www.omdbapi.com/?i=tt3896198&apikey=ad34cbc1&s='.$search);
    $response = json_decode($response);
    //dd($response);
    return view('search', compact('response'));
});

Route::get('/myfav/{imdbID}', function ($imdbID){
$savedmovie = Savedmovie::create([
    'imdbID' => $imdbID,
    'user_id' => auth()->user()->id
    ]);
    return view('myfav');

    })->middleware(['auth'])->name('myfav');

    require __DIR__.'/auth.php';

Route::post('/surprise', function (Request $request) {
    $response = Http::get('http://www.omdbapi.com/?i=tt3896198&apikey=ad34cbc1&type=');
    $response = json_decode($response);

/*     dd($response);
 */    return view('search', compact('response'));
});