@extends('admin.master')
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
            <div class="well">
                <h1 style="text-align: center;padding-bottom: 50px;">Coordinator On Department</h1>
                <h4 class="text-success">{{ Session::get('message') }}</h4>
                <form action="{{ url('/save-coordinator') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">New Department</label>
                        <div class="col-sm-9">
                            <select name="department_id" class="form-control">
                                <option>---Select Department Name---</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Coordinator Name</label>
                        <div class="col-sm-9">
                            <select name="coordinator_id" class="form-control">
                                <option value="">---Select Coordinator Name---</option>
                                @foreach($coordinators as $coordinator)
                                    <option value="{{$coordinator->id}}">{{$coordinator->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-info btn-block" value="Save Department"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection