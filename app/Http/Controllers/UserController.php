<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Strawpoll;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myList(){
        $user = Auth::user();
        $strawpolls = Strawpoll::where("creator", $user->username)->get();

        return view("pages.my-list")->with('list', $strawpolls);
    }
    public function editStrawpoll($id){
        $user = Auth::user();
        $strawpoll = Strawpoll::where("id", $id)->first();

        if($strawpoll['creator'] != $user->username){
            return redirect('/my-strawpolls');
        }
        else{
            $ats = $strawpoll['answers'];
            $ats = explode("|", $ats);

            $votes = $strawpoll['votes'];
            $explode = explode("|", $votes);

            $pirmas = $explode[0];
            $antras = $explode[1];
            $trecias = $explode[2];

            $max = $pirmas + $antras + $trecias;

            $vote1 = 0;
            $vote2 = 0;
            $vote3 = 0;

            if($pirmas != 0){
                $vote1 = round(100/($max / $pirmas),0);
            }
            if($antras != 0){
                $vote2 = round(100/($max / $antras),0);
            }
            if($trecias != 0){
                $vote3 = round(100/($max / $trecias),0);
            }

            $arr = [
                'pirmas' => [$vote1, $pirmas],
                'antras' => [$vote2, $antras],
                'trecias' => [$vote3, $trecias]
            ];

            return view('pages.edit-by-creator')->with('info', $strawpoll)->with('ats', $ats)->with('result', $arr);
        }
    }
    public function newStrawpoll(Request $request){
        $this->validate($request,[
            'name' => 'required|string|min:3|max:25',
            'question' => 'required|string|min:5',
            'answer1' => 'required|string|min:2',
            'answer2' => 'required|string|min:2',
            'answer3' => 'required|string|min:2',
            'delete_at' => 'required|string'
        ]);

        $name = $request->input('name');
        $question = $request->input('question');
        $ats1 = $request->input('answer1');
        $ats2 = $request->input('answer2');
        $ats3 = $request->input('answer3');
        $data = $request->input('delete_at');

        $finalATS = $ats1 ."|". $ats2 ."|". $ats3;

        $new = new Strawpoll();
        $new->name = $name;
        $new->question = $question;
        $new->answers = $finalATS;
        $new->votes = "0|0|0";
        $new->delete_at = $data;
        $new->creator = Auth::user()->username;
        $new->save();

        return redirect("/my-strawpolls");
    }
    public function editStrawpollSystem(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|min:3|string',
            'question' => 'required|min:5|string',
            'answer1' => 'required|min:2|string',
            'answer2' => 'required|min:2|string',
            'answer3' => 'required|min:2|string',
            'delete_at' => 'required|min:10'
        ]);

        $user = Auth::user();
        $strawpoll = Strawpoll::where("id", $id)->first();

        if($strawpoll['creator'] != $user->username){
            return redirect("/my-strawpolls");
        }
        else{
            $ats1 = $request->input('answer1');
            $ats2 = $request->input('answer2');
            $ats3 = $request->input('answer3');

            $final = $ats1 ."|". $ats2 ."|". $ats3;

            $new = $strawpoll;
            $new->name = $request->input('name');
            $new->question = $request->input('question');
            $new->answers = $final;
            $new->delete_at = $request->input('delete_at');
            $new->save();

            return redirect()->back();
        }

    }
}
