<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoordinatorController extends Controller
{

    public function ViewCoordinator(){
        $userId=Auth::user()->id;
        $departments=DB::table('departments')
            ->select('department_name')
            ->where('coordinator_id','=',$userId)
            ->first();
        $allIdeas=DB::table('ideas')->count('id');
        $reportsBit=DB::table('ideas')
            ->join('users', 'users.id', '=', 'ideas.user_id')
            ->join('roles', 'roles.user_id', '=', 'users.id')
            ->select(DB::raw('count(ideas.user_id) as idea_count'),'ideas.user_id')
            ->where('roles.department_id','=',1)
            ->groupBy('ideas.user_id')
            ->get();
        $totalBit=0;
        foreach ($reportsBit as $reportbit){
            $totalBit+=$reportbit->idea_count;
        }
        $totalBitIdeas=$totalBit;
        $percentOfBit=($totalBitIdeas*100)/$allIdeas;
        $percentOfBit=number_format((float)$percentOfBit, 2, '.', '');

        $reportsCis=DB::table('ideas')
            ->join('users', 'users.id', '=', 'ideas.user_id')
            ->join('roles', 'roles.user_id', '=', 'users.id')
            ->select(DB::raw('count(ideas.user_id) as idea_count'),'ideas.user_id')
            ->where('roles.department_id','=',2)
            ->groupBy('ideas.user_id')
            ->get();
        $totalCis=0;
        foreach ($reportsCis as $reportCis){
            $totalCis+=$reportCis->idea_count;
        }
        $totalCisIdeas=$totalCis;
        $percentOfCis=($totalCisIdeas*100)/$allIdeas;
        $percentOfCis=number_format((float)$percentOfCis, 2, '.', '');

        $reportsCse=DB::table('ideas')
            ->join('users', 'users.id', '=', 'ideas.user_id')
            ->join('roles', 'roles.user_id', '=', 'users.id')
            ->select(DB::raw('count(ideas.user_id) as idea_count'),'ideas.user_id')
            ->where('roles.department_id','=',3)
            ->groupBy('ideas.user_id')
            ->get();
        $totalCse=0;
        foreach ($reportsCse as $reportCse){
            $totalCse+=$reportCse->idea_count;
        }
        $totalCseIdeas=$totalCse;
        $percentOfCse=($totalCseIdeas*100)/$allIdeas;
        $percentOfCse=number_format((float)$percentOfCse, 2, '.', '');

        $BitContributors=DB::table('ideas')
            ->join('roles','roles.user_id','=','ideas.user_id')
            ->select('ideas.user_id')
            ->where('roles.department_id','=',1)
            ->groupBy('ideas.user_id')
            ->get();
        $BitContributors=sizeof($BitContributors);
        $CisContributors=DB::table('ideas')
            ->join('roles','roles.user_id','=','ideas.user_id')
            ->select('ideas.user_id')
            ->where('roles.department_id','=',2)
            ->groupBy('ideas.user_id')
            ->get();
        $CisContributors=sizeof($CisContributors);
        $CseContributors=DB::table('ideas')
            ->join('roles','roles.user_id','=','ideas.user_id')
            ->select('ideas.user_id')
            ->where('roles.department_id','=',3)
            ->groupBy('ideas.user_id')
            ->get();
        $CseContributors=sizeof($CseContributors);

        $IdeaWithoutCmnt=DB::table('ideas')
            ->select('id')
            ->whereNotIn('id',[DB::raw('select idea_id from comments')])
            ->get();
        $IdeaWithoutCmnt=sizeof($IdeaWithoutCmnt);

        $AnonymousIdeas=DB::table('ideas')
            ->select('id')
            ->where('anonymous_post','=',1)
            ->get();
        $AnonymousIdeas=sizeof($AnonymousIdeas);

        $AnonymousCmnts=DB::table('comments')
            ->select('id')
            ->where('anonymous','=',1)
            ->get();
        $AnonymousCmnts=sizeof($AnonymousCmnts);

        return view('admin.Coordinator.coordinatorView', ['totalBitIdeas'=>$totalBitIdeas,
            'totalCisIdeas'=>$totalCisIdeas,
            'totalCseIdeas'=>$totalCseIdeas,
            'percentOfBit'=>$percentOfBit,
            'percentOfCis'=>$percentOfCis,
            'percentOfCse'=>$percentOfCse,
            'BitContributors'=>$BitContributors,
            'CisContributors'=>$CisContributors,
            'CseContributors'=>$CseContributors,
            'IdeaWithoutCmnt'=>$IdeaWithoutCmnt,
            'AnonymousIdeas'=>$AnonymousIdeas,
            'AnonymousCmnts'=>$AnonymousCmnts,
            'departments'=>$departments]);

    }
}
