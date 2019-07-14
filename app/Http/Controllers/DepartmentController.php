<?php

namespace App\Http\Controllers;

use App\Department;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    public function addDepartment(){


        return view('admin.Department.add-department');
    }
    public function addcoordinatorInDepartment(){
        $departments=DB::table('departments')
            ->select('*')
            ->where('coordinator_id','=',88)
            ->get();

        $coordinators=DB::table('roles')
            ->join('users', 'users.id', '=', 'roles.user_id')
            ->select('roles.id', 'users.name')
            ->where('roles.name','=','coordinator')
            ->where('roles.department_id','=',99)
            ->get();

        return view ('admin.Department.allocate-coordinator',['coordinators'=>$coordinators,'departments'=>$departments]);
    }
    public function saveDepartment(Request $request){
        $this->validate($request, [
            'departmentName' => 'required|alpha',
        ]);
        $departments= new Department();

            $departments->department_name=$request->departmentName;
            $departments->coordinator_id=88;
            $departments->save();
        return redirect('/manage-department')->with('message','New Department Created Successfully');
    }


    public function saveDepartmentInfo(Request $request) {

        DB::table('departments')
            ->where('id', $request->department_id)
            ->update(['coordinator_id' =>$request->coordinator_id]);

        $user = DB::table('departments')
            ->select('*')
            ->latest()
            ->first();

        $depId=$user->id;
        DB::table('roles')
            ->where('id', $request->coordinator_id)
            ->update(['department_id' =>$depId ]);

        return redirect('/allocate-coordinator')->with('message', 'Department info saved successfully');
    }
    public function manageDepartmentInfo() {
        $allDepartments=DB::table('departments')
            ->join('users', 'users.id', '=', 'departments.coordinator_id')
            ->select('departments.*', 'users.name')
            ->get();
       // $allDepartments = Department::all();
        return view('admin.Department.manage-department', ['allDepartments'=>$allDepartments]);
    }
    public function editDepartmentInfo($id) {
        $departments=Department::all();
        $coordinators=DB::table('roles')
            ->join('users', 'users.id', '=', 'roles.user_id')
            ->select('roles.id', 'users.name')
            ->where('roles.name','=','coordinator')
            ->get();
        //$departmentById = Department::find($id);
        $departmentById=DB::table('departments')
            ->join('users', 'users.id', '=', 'departments.coordinator_id')
            ->select('departments.*', 'users.name')
            ->where('departments.id','=',$id)
            ->first();
        return view('admin.Department.edit-department', ['departmentById'=>$departmentById,
                                                                'coordinators'=>$coordinators,
                                                                'departments'=>$departments,
            ]);
    }

    public function updateDepartmentInfo(Request $request) {

        DB::table('departments')
            ->where('id', $request->id)
            ->update(['coordinator_id' => $request->coordinator_id]);
        DB::table('roles')
            ->where('user_id',$request->coordinator_id)
            ->update(['department_id' => $request->id]);

        return redirect('/manage-department')->with('message', 'Department info updated successfully');
    }
    public function deleteDepartmentInfo($id) {
        $DepartmentById = Department::find($id);
        $DepartmentById->delete();

        return redirect('/manage-department')->with('message', 'Department info deleted successfully');
    }
    public function departmentView(){

        return view('admin.Reports.report-content');

    }
    public function CoordinatorInDepartment(){
        $id=Auth::user()->id;
        $departments=DB::table('departments')
            ->select('department_name')
            ->where('coordinator_id','=',$id)
            ->first();

        $reportsBit=DB::table('departments')
            ->join('roles', 'roles.department_id', '=', 'departments.id')
            ->join('ideas', 'ideas.user_id', '=', 'roles.user_id')
            ->join('categories','ideas.category_id','=','categories.id')
            ->join('users','ideas.user_id','=','users.id')
            ->select('roles.user_id','ideas.*','categories.category_name','categories.id as Cid','users.name')
            ->where('departments.department_name','=','BIT','AND','roles.name','=','student')
            ->orderBy('ideas.id','DESC')
            ->get();

       // SELECT `user_id`, COUNT(`user_id`) FROM `ideas` GROUP BY `user_id`
        $reportsCis=DB::table('departments')
            ->join('roles', 'roles.department_id', '=', 'departments.id')
            ->join('ideas', 'ideas.user_id', '=', 'roles.user_id')
            ->join('categories','ideas.category_id','=','categories.id')
            ->join('users','ideas.user_id','=','users.id')
            ->select('roles.user_id','ideas.*','categories.category_name','categories.id as Cid','users.name')
            ->where('departments.department_name','=','CIS','AND','roles.name','=','student')
            ->orderBy('ideas.id','DESC')
            ->get();
        $reportsCse=DB::table('departments')
            ->join('roles', 'roles.department_id', '=', 'departments.id')
            ->join('ideas', 'ideas.user_id', '=', 'roles.user_id')
            ->join('categories','ideas.category_id','=','categories.id')
            ->join('users','ideas.user_id','=','users.id')
            ->select('roles.user_id','ideas.*','categories.category_name','categories.id as Cid','users.name')
            ->where('departments.department_name','=','CSE','AND','roles.name','=','student')
            ->orderBy('ideas.id','DESC')
            ->get();

        return view('admin.Reports.report-content', ['departments'=>$departments,
                                                            'reportsBit'=>$reportsBit,
                                                            'reportsCis'=>$reportsCis,
                                                            'reportsCse'=>$reportsCse]);
    }
}
