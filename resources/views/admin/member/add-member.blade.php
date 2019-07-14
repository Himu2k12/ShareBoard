@extends('admin.master')
@section('title')
    Members
    @endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-10">
            <div class="well">
                <h3 style="text-align: center">ADD New Member</h3>

                <h4 style="text-align: center">{{ Session::get('mass') }}</h4>
                <form action="{{url('/new-member') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Role Name</label>
                        <div class="col-sm-9">
                            <select id="role" name="role" class="form-control">
                                <option value="">---Select Role---</option>
                                <option value="student">Student</option>
                                <option value="coordinator">Co-ordinator</option>
                            </select>
                            <span style="color: red" >{{ $errors->has('role') ? $errors->first('role') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3">Department Name</label>
                        <div class="col-sm-9">
                            <select id="department" name="department_id" class="form-control">
                                <option value="">---Select Department---</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">New User ID</label>
                        <div class="col-sm-9">
                            <select name="user_id" class="form-control">
                                <option value="">---Select New User---</option>
                                @foreach($newUsers as $newUser)
                                    <option value="{{$newUser->id}}">{{$newUser->name}}({{$newUser->id}})</option>
                                @endforeach
                            </select>
                            <span style="color: red" >{{ $errors->has('user_id') ? $errors->first('user_id') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Role"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {


            $('#role').on('change', function() {
                var student = $('#role').val();

                if(student=="student") {
                    $('#department').attr('required', true);
                }else{
                    $('#department').attr('required', false);
                }
            });
        });

    </script>
@endsection