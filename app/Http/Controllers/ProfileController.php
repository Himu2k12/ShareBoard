<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function viewProfile(){
        $id=Session::get('user_id');

        $userInfo=DB::table('users')
            ->join('roles','roles.user_id','=','users.id')
            ->join('departments','departments.id','=','roles.department_id')
            ->select('users.name','users.email','users.id','departments.department_name')
            ->where('users.id',$id)
            ->first();
        $profileInfo=DB::table('profiles')
            ->where('user_id','=',$id)
            ->first();
        return view('front.profile.profile-edit',['userInfo'=>$userInfo,'profileInfo'=>$profileInfo]);
    }
    public function UpdateProfile(Request $request){
        $users=User::find($request->id);
        $users->name=$request->name;
        $users->email=$request->email;
        $users->save();
        $file = $request->image;
        $existingProfile=DB::table('profiles')
            ->select('id')
            ->where('user_id',$request->id)
            ->first();

        if($existingProfile){
            $existingProfile=$existingProfile->id;
            if($file) {

                $fileName = $file->getClientOriginalName();
                $directory = 'Asset/files/';
                $file->move($directory, $fileName);
                $finalimage = $directory . $fileName;
                DB::table('profiles')
                    ->where('id', $existingProfile)
                    ->update(['user_name' => $request->username,'image'=>$finalimage]);
                return redirect('/Profile-view')->with('message','You have successfully Updated Your Profile');

            }else{

                DB::table('profiles')
                    ->where('id', $existingProfile)
                    ->update(['user_name' => $request->username]);
                return redirect('/Profile-view')->with('message','You have successfully Updated Your Profile');

            }
        }else {

            if ($file) {
                $fileName = $file->getClientOriginalName();
                $directory = 'Asset/files/';
                $file->move($directory, $fileName);
                $finalimage = $directory . $fileName;

//                $profile = new Profile();
//                $profile->user_id = $request->id;
//                $profile->user_name = $request->username;
//                $profile->image = $finalimage;
//                $profile->save;
                DB::table('profiles')->insert(
                    ['user_id' =>$request->id, 'user_name' =>$request->username,'image'=>$finalimage]
                );
                return redirect('/Profile-view')->with('message','You have successfully Updated Your Profile');

            }else{
                DB::table('profiles')->insert(
                    ['user_id' =>$request->id, 'user_name' =>$request->username]
                );
//                $profile = new Profile();
//                $profile->user_id =$request->id;
//                $profile->user_name =$request->username;
//                $profile->save;
               return redirect('/Profile-view')->with('message','You have successfully Updated Your Profile');
            }
        }
    }
}
