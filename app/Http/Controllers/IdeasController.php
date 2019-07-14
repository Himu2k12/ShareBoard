<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Idea;
use App\LikeDislike;
use App\User;
use App\View;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
class IdeasController extends Controller
{
    private $postId;
    public function __construct()
    {
        $this->middleware('auth');
        $this->postId;

    }

    public function newIdea(Request $request) {
        $this->validate($request, [
            'idea_title' => 'required|regex:/^[\pL\s\-]+$/u',
            'idea_description' => 'required',
            'category_id' => 'required',
        ]);
        $id=Session::get('user_id');

        $ename=DB::table('users')
            ->select('name')
            ->where('id','=',$id)
            ->first();
        $ename=$ename->name;
        $eCategoryname=DB::table('categories')
            ->select('category_name')
            ->where('id','=',$request->category_id)
            ->first();
        $eCategoryname=$eCategoryname->category_name;

            Session(['e_idea_title'=>$request->idea_title]);
            Session(['e_name'=>$ename]);
            Session(['e_cat_name'=>$eCategoryname]);

        if(Auth::user()->userRole('student')){
            $departmentId=DB::table('users')
                ->join('roles','roles.user_id','=','users.id')
                ->select('roles.department_id')
                ->where('users.id',$id)
                ->first();
            $departmentId=$departmentId->department_id;
            $coordinatorEmail=DB::table('departments')
                ->join('users','departments.coordinator_id','=','users.id')
                ->select('users.email')
                ->where('departments.id','=',$departmentId)
                ->first();
            $coordinatorEmail=$coordinatorEmail->email;
            Session(['mail_email'=>$coordinatorEmail]);
            if(isset($request->anonymousPost)) {
                $file = $request->file('file');
                if ($file) {
                    $fileName = $file->getClientOriginalName();
                    $directory = 'Asset/files/';
                    $file->move($directory, $fileName);
                    $finalimage = $directory . $fileName;

                    $idea = new Idea();
                    $idea->idea_title = $request->idea_title;
                    $idea->idea_description = $request->idea_description;
                    $idea->file_data = $finalimage;
                    $idea->category_id = $request->category_id;
                    $idea->anonymous_post = $request->anonymousPost;
                    $idea->user_id = $request->user_id;
                    $idea->save();
                    Mail::send(['text'=>'front.Mail.idea-mail'],['Name'=>'SHAREBOARD'],function ($message){
                        $email=Session::get('mail_email');
                        $message->to($email)->subject('New Idea');
                        $message->from('thoreshdutta@gmail.com','SHAREBOARD');
                    });
                } else {

                    $idea = new Idea();
                    $idea->idea_title = $request->idea_title;
                    $idea->idea_description = $request->idea_description;
                    $idea->category_id = $request->category_id;
                    $idea->anonymous_post = $request->anonymousPost;
                    $idea->user_id = $request->user_id;
                    $idea->save();
                    Mail::send(['text'=>'front.Mail.idea-mail'],['Name'=>'SHAREBOARD'],function ($message){
                        $email=Session::get('mail_email');
                        $message->to($email)->subject('New Idea');
                        $message->from('thoreshdutta@gmail.com','SHAREBOARD');
                    });
                }
            }else{
                $file = $request->file('file');
                if ($file) {
                    $fileName = $file->getClientOriginalName();
                    $directory = 'Asset/files/';
                    $file->move($directory, $fileName);
                    $finalimage = $directory . $fileName;

                    $idea = new Idea();
                    $idea->idea_title = $request->idea_title;
                    $idea->idea_description = $request->idea_description;
                    $idea->file_data = $finalimage;
                    $idea->category_id = $request->category_id;
                    $idea->anonymous_post = 1;
                    $idea->user_id = $request->user_id;
                    $idea->save();
                    Mail::send(['text'=>'front.Mail.idea-mail'],['Name'=>'SHAREBOARD'],function ($message){
                        $email=Session::get('mail_email');
                        $message->to($email)->subject('New Idea');
                        $message->from('thoreshdutta@gmail.com','SHAREBOARD');
                    });
                } else {
                    $idea = new Idea();
                    $idea->idea_title = $request->idea_title;
                    $idea->idea_description = $request->idea_description;
                    $idea->category_id = $request->category_id;
                    $idea->anonymous_post = 1;
                    $idea->user_id = $request->user_id;
                    $idea->save();
                    Mail::send(['text'=>'front.Mail.idea-mail'],['Name'=>'SHAREBOARD'],function ($message){
                        $email=Session::get('mail_email');
                        $message->to($email)->subject('New Idea');
                        $message->from('thoreshdutta@gmail.com','SHAREBOARD');
                    });
                }
            }
        }else{

            if(isset($request->anonymousPost)) {
                $file = $request->file('file');
                if ($file) {
                    $fileName = $file->getClientOriginalName();
                    $directory = 'Asset/files/';
                    $file->move($directory, $fileName);
                    $finalimage = $directory . $fileName;

                    $idea = new Idea();
                    $idea->idea_title = $request->idea_title;
                    $idea->idea_description = $request->idea_description;
                    $idea->file_data = $finalimage;
                    $idea->category_id = $request->category_id;
                    $idea->anonymous_post = $request->anonymousPost;
                    $idea->user_id = $request->user_id;
                    $idea->save();

                } else {

                    $idea = new Idea();
                    $idea->idea_title = $request->idea_title;
                    $idea->idea_description = $request->idea_description;
                    $idea->category_id = $request->category_id;
                    $idea->anonymous_post = $request->anonymousPost;
                    $idea->user_id = $request->user_id;
                    $idea->save();

                }
            }else{
                $file = $request->file('file');
                if ($file) {
                    $fileName = $file->getClientOriginalName();
                    $directory = 'Asset/files/';
                    $file->move($directory, $fileName);
                    $finalimage = $directory . $fileName;

                    $idea = new Idea();
                    $idea->idea_title = $request->idea_title;
                    $idea->idea_description = $request->idea_description;
                    $idea->file_data = $finalimage;
                    $idea->category_id = $request->category_id;
                    $idea->anonymous_post = 1;
                    $idea->user_id = $request->user_id;
                    $idea->save();
                } else {
                    $idea = new Idea();
                    $idea->idea_title = $request->idea_title;
                    $idea->idea_description = $request->idea_description;
                    $idea->category_id = $request->category_id;
                    $idea->anonymous_post = 1;
                    $idea->user_id = $request->user_id;
                    $idea->save();
                }
            }
        }





        return redirect('/idea-details')->with('message', 'you have successfully submitted your Idea');
    }

    public function viewIdea(){
        $categories=DB::select('select * from categories WHERE CURDATE() BETWEEN start_date AND end_date');

        return view ('front.idea-details.idea-description',['categories'=>$categories]);
    }

    public function detailsIdea(){
        return view('front.idea-comment.idea-comment');
   }

    public function ideaForComment($id) {
        $user_id=Auth::user()->id;
        $userid=DB::table('ideas')
            ->select('user_id')
            ->where('id',$id)
            ->first();
       $userid=$userid->user_id;
       if($userid!=$user_id) {
            DB::table('ideas')
               ->where('id', '=', $id)
               ->increment('views', 1);
       }


    //    $ideaById = Idea::where('id', $id)->first();
        Session::put('idea_id',$id);
        $idea = new Idea();
        $ideaById=$idea->viewCommentDetails($id);


        $cmntForAdmin=new Comment();
        $commentsForAdmin=$cmntForAdmin->CommentForAdmin($id);
        $commentsForStudent=$cmntForAdmin->CommentForStudents($id);


        $id=Session::get('idea_id');

        $checkLikeById=DB::table('like_dislikes')
            ->where([['idea_id',$id],['user_id',$user_id],['like',1]])
            ->count();
        $checkDislikeById=DB::table('like_dislikes')
            ->where([['idea_id',$id],['user_id',$user_id],['dislike',1]])
            ->count();

        return view('front.idea-comment.idea-comment',['ideaById'=>$ideaById,'commentsForAdmin'=>$commentsForAdmin,'commentsForStudent'=>$commentsForStudent,'checkLikeById'=>$checkLikeById,'checkDislikeById'=>$checkDislikeById]);
    }

    public function saveAnswer(Request $request){
       $idea_id=$request->idea_id;
       $ideaOwner=DB::table('ideas')
           ->join('users','ideas.user_id','=','users.id')
           ->select('users.email')
           ->where('ideas.id',$idea_id)
           ->first();
        $ideaOwner=$ideaOwner->email;
        Session(['cmnt_email'=>$ideaOwner]);

        $coor=$request->user_role;
        $admin=$request->user_role_two;
        $manager=$request->user_role_three;
        if($coor==1 || $admin==1|| $manager){
            if(isset($request->anonymous)){
                $comments=new Comment();
                $comments->idea_id=$request->idea_id;
                $comments->reply_description=$request->reply_description;
                $comments->user_id=$request->user_id;
                $comments->anonymous=0;
                $comments->staff_comment=1;
                $comments->save();
            }else{
                $comments=new Comment();
                $comments->idea_id=$request->idea_id;
                $comments->reply_description=$request->reply_description;
                $comments->user_id=$request->user_id;
                $comments->anonymous=1;
                $comments->staff_comment=1;
                $comments->save();
            }
        }else{
            $id=Session::get('user_id');

            $ename=DB::table('users')
                ->select('name')
                ->where('id','=',$id)
                ->first();
            $ename=$ename->name;
            $eIdea=DB::table('ideas')
                ->select('idea_title')
                ->where('id','=',$request->idea_id)
                ->first();
            $eIdea=$eIdea->idea_title;
            Session(['e_comment'=>$request->reply_description]);
            Session(['e_idea'=>$eIdea]);
            Session(['e_name'=>$ename]);

            if(isset($request->anonymous)){
                $comments=new Comment();
                $comments->idea_id=$request->idea_id;
                $comments->reply_description=$request->reply_description;
                $comments->user_id=$request->user_id;
                $comments->anonymous=0;
                $comments->staff_comment=0;
                $comments->save();
                Session(['e_name'=>"Anonymous"]);
                Mail::send(['text'=>'front.Mail.comment-mail'],['Name'=>'SHAREBOARD'],function ($message){
                    $email=Session::get('cmnt_email');
                    $message->to($email)->subject('New Comment');
                    $message->from('thoreshdutta@gmail.com','SHAREBOARD');
                });
            }else{
                $comments=new Comment();
                $comments->idea_id=$request->idea_id;
                $comments->reply_description=$request->reply_description;
                $comments->user_id=$request->user_id;
                $comments->anonymous=1;
                $comments->staff_comment=0;
                $comments->save();
                Mail::send(['text'=>'front.Mail.comment-mail'],['Name'=>'SHAREBOARD'],function ($message){
                    $email=Session::get('cmnt_email');
                    $message->to($email)->subject('New Comment');
                    $message->from('thoreshdutta@gmail.com','SHAREBOARD');
                });
            }

        }



        return redirect('/idea-for-comment/'.$request->idea_id);

    }
    public function viewLike(){
        $id=Session::get('idea_id');

        $like=DB::table('like_dislikes')
            ->select('like')
            ->where([['idea_id','=',$id],['like',1]])
            ->count();
        echo $like;

    }

    public function viewDislike(){
        $id=Session::get('idea_id');

        $dislike=DB::table('like_dislikes')
            ->select('dislike')
            ->where([['idea_id','=',$id],['dislike',1]])
            ->count();

        echo $dislike; 

    }
    public  function saveLikeDislike(Request $request){
        $user_id=Auth::user()->id;
        $checkLikeById=DB::table('like_dislikes')
            ->where([['idea_id',$request->idea_id],['user_id',$user_id],['like',1]])
            ->count();
        $checkDisLikeById=DB::table('like_dislikes')
            ->where([['idea_id',$request->idea_id],['user_id',$user_id],['dislike',1]])
            ->count();
        if($checkLikeById==1){
            DB::table('like_dislikes')
                ->where([['idea_id', '=', $request->idea_id], ['user_id', $request->user_id]])
                ->update(['like' => 0, 'dislike' =>1]);
        }elseif ($checkDisLikeById==1){
            DB::table('like_dislikes')
                ->where([['idea_id', '=', $request->idea_id], ['user_id', $request->user_id]])
                ->update(['like' => 1, 'dislike' =>0]);
        }elseif($request->like==1) {
            $likeDislike = new LikeDislike();
            $likeDislike->idea_id = $request->idea_id;
            $likeDislike->like = $request->like;
            $likeDislike->dislike =0;
            $likeDislike->user_id = $request->user_id;
            $likeDislike->save();
        }elseif($request->dislike==1){
            $likeDislike = new LikeDislike();
            $likeDislike->idea_id = $request->idea_id;
            $likeDislike->dislike = $request->dislike;
            $likeDislike->like =0;
            $likeDislike->user_id = $request->user_id;
            $likeDislike->save();
        }

    }
    public  function updateLikeDislike(Request $request){
        $user_id= $request->userid;
        $checkLikeById=DB::table('like_dislikes')
            ->where([['idea_id',$request->idea_id],['user_id',$user_id],['like',1]])
            ->count();
        $checkDisLikeById=DB::table('like_dislikes')
            ->where([['idea_id',$request->idea_id],['user_id',$user_id],['dislike',1]])
            ->count();
//                    $id= $request->ideaid;
//                    $uid= $request->userid;
//                    if($request->likes==1) {
//                        DB::table('like_dislikes')
//                            ->where([['idea_id', '=', $id], ['user_id', $uid]])
//                            ->update(['like' => 1, 'dislike' => 0]);
//                    }else{
//                        DB::table('like_dislikes')
//                            ->where([['idea_id', '=', $id], ['user_id', $uid]])
//                            ->update(['like' => 0,'dislike' => 1]);
//                    }

    }
    public function updateView(Request $request){

        $views=new View();
        $views->idea_id=$request->ideaIdonClick;
        $views->click=$request->click;
        $views->save;
//        DB::table('views')->insert(
//            ['idea_id' =>1, 'click' =>2]
//        );
    }



}
