@extends('admin.master')
@section('title')
    Edit Role
@endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h1 class="text-info" style="text-align: center">Edit Role Infromation</h1>
                <h3 style="text-align: center" class="text-info">{{ Session::get('message') }}</h3>
                <form action="{{ url('/update-member') }}"name="editRoleForm" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">User ID</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="user_id" placeholder="enter user ID" readonly="" value="{{$roleById->user_id}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Role Name</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="updateID" value="{{$roleById->id}}">
                            <select name="role" id="role" class="form-control">
                                <option>---Select Role---</option>
                                <option value="student">Student</option>
                                <option value="staff">Staff</option>
                                <option value="coordinator">Co-ordinator</option>
                                <option value="block">Block</option>
                            </select>
                        </div>
                    </div>
                   <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Role"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editRoleForm'].elements['role'].value = '{{ $roleById->name }}';
    </script>
@endsection