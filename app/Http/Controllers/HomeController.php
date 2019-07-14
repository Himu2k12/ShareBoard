<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');

    }

    public function index() {
        Session(['user_id'=>Auth::user()->id]);
        Session(['user_email'=>Auth::user()->email]);
        $todate=date('Y-m-d');
        $ideas=DB::table('ideas')
            ->join('users','users.id','=','ideas.user_id')
            ->select('ideas.*','users.name')
            ->where('ideas.closer_date','>=',$todate)
            ->where('ideas.publication_status','=',1)
            ->orderBy('id','desc')
            ->paginate(5);
            $MostPopularIdeas = DB::table('like_dislikes')
                ->select(DB::raw('idea_id,COUNT(`like`) as likes'))
                ->where('like', 1)
                ->groupBy('idea_id')
                ->orderBy(DB::raw('COUNT(`idea_id`)'), 'desc')
                ->limit(3)
                ->get();

            $MPI = array();
            foreach ($MostPopularIdeas as $MostPopularIdea) {
                $MPI[] = $MostPopularIdea;
            }

            $first = $MPI[0]->idea_id;
            $firstLike = $MPI[0]->likes;
            //top popular ideas 1
            $FirstTops = DB::table('ideas')
                ->join('users', 'users.id', '=', 'ideas.user_id')
                ->join('categories', 'ideas.category_id', '=', 'categories.id')
                ->select('ideas.idea_title', 'ideas.id', 'categories.category_name', 'users.name', 'ideas.anonymous_post')
                ->where('ideas.id', $first)
                ->first();

            $second = $MPI[1]->idea_id;
            $secondLike = $MPI[1]->likes;

            $secondTop = DB::table('ideas')
                ->join('users', 'users.id', '=', 'ideas.user_id')
                ->join('categories', 'ideas.category_id', '=', 'categories.id')
                ->select('ideas.idea_title', 'ideas.id', 'categories.category_name', 'users.name', 'ideas.anonymous_post')
                ->where('ideas.id', $second)
                ->first();
            //top popular ideas 3
            $third = $MPI[2]->idea_id;
            $thirdLike = $MPI[2]->likes;

            $thirdTop = DB::table('ideas')
                ->join('users', 'users.id', '=', 'ideas.user_id')
                ->join('categories', 'ideas.category_id', '=', 'categories.id')
                ->select('ideas.idea_title', 'ideas.id', 'categories.category_name', 'users.name', 'ideas.anonymous_post')
                ->where('ideas.id', $third)
                ->first();

        //latest 3 ideas
        $latestIdeas=DB::table('ideas')
            ->join('users','users.id','=','ideas.user_id')
            ->select('users.name','ideas.*')
            ->latest()
            ->where('publication_status',1)
            ->limit(3)
            ->get();

        //latest comments on ideas
        $latestComments=DB::table('comments')
            ->join('ideas','ideas.id','=','comments.idea_id')
            ->join('users','users.id','=','ideas.user_id')
            ->select('users.name','ideas.idea_title','ideas.id','comments.anonymous','comments.reply_description')
            ->orderBy('comments.id','desc')
            ->limit(3)
            ->get();
        //most viewed ideas
        $MostViewdIdeas=DB::table('ideas')
            ->join('categories','categories.id','=','ideas.category_id')
            ->join('users','users.id','=','ideas.user_id')
            ->select('ideas.*','categories.category_name','users.name')
            ->orderBy('ideas.views','DESC')
            ->limit(5)
            ->get();
        //Individual approved Ideas
        $studentId=Session::get('user_id');
        $studentIdeas=DB::table('ideas')
            ->select('ideas.*','categories.category_name')
            ->join('categories','categories.id','=','ideas.category_id')
            ->where('user_id',$studentId)
            ->where('ideas.publication_status',1)
            ->get();

        //Individual Nonapproved Ideas
        $studentIdeasNotPublised=DB::table('ideas')
            ->select('ideas.*','categories.category_name')
            ->join('categories','categories.id','=','ideas.category_id')
            ->where('user_id',$studentId)
            ->where('ideas.publication_status','=',null)
            ->get();


        return view('front.home.home-content', [  'ideas'=>$ideas,
                                                        'MostPopularIdeas'=>$MostPopularIdeas,
                                                        'latestIdeas'=>$latestIdeas,
                                                        'FirstTops'=>$FirstTops,
                                                        'firstLike'=>$firstLike,
                                                        'secondTop'=>$secondTop,
                                                        'secondLike'=>$secondLike,
                                                        'thirdTop'=>$thirdTop,
                                                        'thirdLike'=>$thirdLike,
                                                        'latestComments'=>$latestComments,
                                                        'MostViewdIdeas'=>$MostViewdIdeas,
                                                        'studentIdeas'=>$studentIdeas,
                                                        'studentIdeasNotPublised'=>$studentIdeasNotPublised,

            ]);
    }


}
