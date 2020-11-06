<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Strawpoll;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUsersPage()
    {
        if (Auth::user()->status === 1) { // Jau web.php faile turetu blokuoti neprisijungusius vartotojus, bet tas budas nesuveikia tai reikejo dadeti sita.

            $user = Auth::user();
            $allUsers = DB::table('users')->where('id', 'not like', $user->id)->get(); // Gauna visus registruotus vartotojus isskyrus save

            return view('pages.delete-users')->with('allUsers', $allUsers);
        } else {
            return redirect("/");
        }
    }

    public function deleteUserAction($id)
    {
        $user = Auth::user();

        if($id != $user->id) { // Apsaugojimas jei bando per inspect element pakeisti id i savo vartotojo id ir taip istrinti save
            $user = DB::table('users')->where('id', $id)->delete();

            return redirect()->back();
        } else {
            return redirect("/");
        }
    }
    public function strawpollList(){
        if(Auth::user()->status === 1){
            return view("pages.admin-strawpoll-list")->with('info', Strawpoll::get());
        }
        else{
            return redirect("/");
        }
    }
}
