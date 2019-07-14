<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Idea extends Model
{
    public function viewCommentDetails($id){
        return DB::table('ideas')
            ->join('categories','ideas.category_id','=','categories.id')
            ->join('users','users.id','=','ideas.user_id')
            ->join('roles','roles.user_id','=','users.id')
            ->join('departments','departments.id','=','roles.department_id')
            ->select('categories.category_name','users.name','ideas.*','departments.department_name')
            ->where('ideas.id',$id)
            ->first();

    }
}
