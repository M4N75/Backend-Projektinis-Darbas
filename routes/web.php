<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Models\Strawpoll;


if (Auth::check()) {
    Route::get("/", function(){return view('pages.home')->with('strawpolls', Strawpoll::get())->with('user', $user);});
    Route::get("/view-strawpoll/{id}", 'App\Http\Controllers\StrawpollsController@viewStrawpoll');
    Route::post("/vote/{id}", 'App\Http\Controllers\StrawpollsController@vote');
    Route::get("/show-results/{id}", 'App\Http\Controllers\StrawpollsController@results');
}
else{
    Route::get("/", function(){return view('pages.home')->with('strawpolls', Strawpoll::get());});
    Route::get("/view-strawpoll/{id}", 'App\Http\Controllers\StrawpollsController@viewStrawpoll');
    Route::post("/vote/{id}", 'App\Http\Controllers\StrawpollsController@vote');
    Route::get("/show-results/{id}", 'App\Http\Controllers\StrawpollsController@results');
}


Route::middleware(['App\Http\Middleware\Authenticate'])->middleware(['App\Http\Middleware\ProtectRoute'])->group(function () {
    // ^^^^ I sita route galima patekti jeigu tik vartotojas yra prisijunges ir jei isai yra administratorius

    Route::get('/admin/delete-strawpoll/{id}', 'App\Http\Controllers\StrawpollsController@deleteStrawpoll')->name('delete-strawpoll');

    Route::get('/admin/user-list', 'App\Http\Controllers\AdministratorController@showUsersPage')->name('/');
    Route::get('/admin/strawpoll-list', 'App\Http\Controllers\AdministratorController@strawpollList');
    Route::get('/admin/delete-user/{id}', 'App\Http\Controllers\AdministratorController@deleteUserAction')->name('delete-user');
});

Route::middleware(['App\Http\Middleware\Authenticate'])->group(function () {
    //routes paprastiems vartotojams (prisijungusiems)
    Route::get("/my-strawpolls", 'App\Http\Controllers\UserController@myList');
    Route::get("/edit-strawpoll/{id}", 'App\Http\Controllers\UserController@editStrawpoll');
    Route::get("/create-strawpoll", function(){return view('pages.create');});

    Route::post("/create", "App\Http\Controllers\UserController@newStrawpoll");
    Route::post("/edit/{id}", "App\Http\Controllers\UserController@editStrawpollSystem");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

