@extends('admin.master')
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
            <div class="well">
                <h1 style="text-align: center;padding-bottom: 50px;">ADD NEW DEPARTMENT</h1>
                <h4 class="text-success">{{ Session::get('message') }}</h4>
                <form action="{{ url('/new-department') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Department Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="departmentName" class="form-control" />
                            <span style="color: red" >{{ $errors->has('departmentName') ? $errors->first('departmentName') : ' ' }}</span>
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