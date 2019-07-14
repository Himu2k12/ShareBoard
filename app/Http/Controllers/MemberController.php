<?php

namespace App\Http\Controllers;

use App\Department;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    public function addMember(){
       $departments= Department::all();

        $newUsers=DB::select('SELECT * FROM users Where id NOT IN (Select user_id from roles)');

        return view('admin.member.add-member',['departments'=>$departments,'newUsers'=>$newUsers]);
    }
    public function newRole(Request $request){
        $this->validate($request, [
            'role' => 'required',
            'user_id' => 'required',
        ]);

        $roles= new Role();
        if($request->department_id==null){
            $roles->user_id=$request->user_id;
            $roles->name=$request->role;
            $roles->department_id=99;
            $roles->save();
        }else{
            $roles->user_id=$request->user_id;
            $roles->name=$request->role;
            $roles->department_id=$request->department_id;
            $roles->save();
        }


        return redirect('/add-member')->with('mass','Role Created Successfully');
    }
    public function viewMember(){
        $allRoles=DB::table('roles')
            ->join('users','roles.user_id','=','users.id')
            ->select('users.*','roles.name as roleName')
            ->orderBy('users.id','DESC')
            ->get();
        return view('admin.member.manage-member', ['allRoles'=>$allRoles]);
    }
    public function editRole($id) {
        //$categoryById = Category::where('id', $id)->first();

        $roleById =DB::table('roles')
            ->select('*')
            ->where('user_id','=',$id)
            ->first();
       // dd($roleById);
        return view('admin.member.edit-member', ['roleById'=>$roleById]);
    }
    public function updateRoleInfo(Request $request) {
//        $category = new Category();

        $RoleUpdateById = Role::find($request->updateID);
        $RoleUpdateById->user_id = $request->user_id;
        $RoleUpdateById->name = $request->role;
        $RoleUpdateById->save();

        return redirect('/manage-member')->with('message', 'Role info update successfully');
    }
}
