@extends('admin.master')
@section('content')
<br/>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-2">
        <div class="well" style="height: 300px">
            <h2 style="text-align: center">Edit Coordinator In Department</h2>
            <h4 class="text-success">{{ Session::get('message') }}</h4>
            <form name="editDepForm" action="{{ url('/update-department') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3">Department Name</label>
                    <div class="col-sm-9">
                        <select name="id" id="departmentName" class="form-control">
                            <option value="{{$departmentById->id}}">{{$departmentById->department_name}}</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Coordinator Name</label>
                    <div class="col-sm-9">
                        <select name="coordinator_id" id="coordinatorId" class="form-control">
                            <option value="{{$departmentById->coordinator_id}}">{{$departmentById->name}}</option>
                            @foreach($coordinators as $coordinator)
                                <option value="{{$coordinator->id}}">{{$coordinator->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-9 col-sm-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block form-control" value="Update Department Info"/>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
