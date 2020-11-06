<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Strawpoll;

class StrawpollsController extends Controller
{
    public function deleteStrawpoll($id)
    {
        DB::table('strawpoll')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function viewStrawpoll($id){
        $strawpollInfo = Strawpoll::where("id", $id)->first();

        $ats = $strawpollInfo['answers'];
        $explode = explode("|", $ats);

        return view("pages.view-strawpoll")->with('info', $strawpollInfo)->with('ats', $explode);
    }
    public function vote(Request $request, $id){
        $strawpoll = Strawpoll::where("id", $id)->first();

        $atsFromDB = $strawpoll['answers'];
        $votesFromDB = $strawpoll['votes'];

        $explodeATS = explode("|", $atsFromDB);
        $explodeVOTES = explode("|", $votesFromDB);
        $updatedVotes = "";

        switch ($request->input("answer")) {
            case $explodeATS[0]:
                $plus = $explodeVOTES[0] +1;
                $updatedVotes = $plus ."|". $explodeVOTES[1] ."|". $explodeVOTES[2];

                break;
            case $explodeATS[1]:
                $plus = $explodeVOTES[1] +1;
                $updatedVotes = $explodeVOTES[0] ."|". $plus ."|". $explodeVOTES[2];   
                
                break;
            case $explodeATS[2]:
                $plus = $explodeVOTES[2] +1;
                $updatedVotes = $explodeVOTES[0] ."|". $explodeVOTES[1] ."|". $plus; 
                
                break; 
            default:
                $updatedVotes = $explodeVOTES[0] ."|". $explodeVOTES[1] ."|". $explodeVOTES[2];

                break;
        }
        $vote = $strawpoll;
        $vote->votes = $updatedVotes;
        $vote->save();

        return redirect("/show-results/".$id);
    }
    public function results($id){
        $strawpoll = Strawpoll::where('id', $id)->first();
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
        $ats = explode("|", $strawpoll['answers']);

        return view("pages.show-results")->with('info', $strawpoll)->with('result', $arr)->with('ats', $ats);
    }
}
