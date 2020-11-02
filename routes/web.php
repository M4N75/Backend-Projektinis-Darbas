<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

    $strawpolls = DB::table('strawpoll')->get(); // Gauna visus balsavimus


    if (Auth::check()) { // Tikrina ar vartotojas prisijunges

        $user = Auth::user(); // Gauna vartotojo duomenis

        return view('pages.delete-strawpoll')->with('strawpolls', $strawpolls)->with('user', $user); // Returnas su  balsavimai ir vartotojo duomenimis

    } else {

        return view('pages.delete-strawpoll')->with('strawpolls', $strawpolls); // Returnas su balsavimai jei vartotojas neprisijunges

    }

});

Route::middleware(['App\Http\Middleware\Authenticate'])->middleware(['App\Http\Middleware\ProtectRoute'])
    ->group(function () {

        Route::get('delete-strawpoll/{id}', 'App\Http\Controllers\StrawpollsController@deleteStrawpoll')->name('delete-strawpoll');
        // ^^^^ I sita route galima patekti jeigu tik vartotojas yra prisijunges ir jei isai yra administratorius
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
