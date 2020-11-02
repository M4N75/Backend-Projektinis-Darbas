<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrawpollsController extends Controller
{
    public function deleteStrawpoll($id)
    {
        DB::table('strawpoll')->where('id', $id)->delete();

        return redirect()->back();
    }
}
