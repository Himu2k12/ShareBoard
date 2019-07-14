<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    public function CommentForAdmin($id){
        return DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->select('users.name','comments.*')
            ->where('comments.idea_id','=',$id)
            ->get();

    }
    public function CommentForStudents($id){
        return DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->select('users.name','comments.*')
            ->where('comments.idea_id','=',$id)
            ->where('comments.staff_comment','=',0)
            ->get();
    }
}
