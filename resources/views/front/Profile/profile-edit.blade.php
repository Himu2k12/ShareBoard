@extends('front.master')


@section('title')
    User Profile
@endsection
@section('content')
<div class="container">
    <h1 style="padding-left: 4%;float: left">{{Session::get('role')}}-Profile</h1>
    <h1 style="padding-left: 4%;float: right;">{{Session::get('role')}}-ID: #{{$userInfo->id}}</h1>
    <hr>
    <div class="row">
        <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{url('/update-profile')}}" method="post">
            {{csrf_field()}}
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <?php if(isset($profileInfo->image)) {?>
                <img src="{{url('/'.$profileInfo->image)}}" height="200" width="200" class="avatar img-circle" alt="avatar">
               <?php }else{ ?>
                    <img src="http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png" height="200" width="200" class="avatar img-circle" alt="avatar">
                <?php } ?>
                    <h6>Upload a different photo...</h6>

                <input type="file" name="image" accept="image/*" class="form-control">
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                <strong>{{ Session::get('message') }}</strong>
            </div>
            <h3>Personal info</h3>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Full name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" type="text" value="{{$userInfo->name}}">
                        <input class="form-control" name="id" type="hidden"  value="{{$userInfo->id}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Department:</label>
                    <div class="col-lg-8">
                        <input class="form-control"  type="text" disabled value="{{$userInfo->department_name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="" type="text" disabled value="{{$userInfo->email}}">
                        <input class="form-control" name="email" type="hidden" value="{{$userInfo->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="username" type="text" required value="<?php if(isset($profileInfo->user_name)){echo $profileInfo->user_name;}else{echo " ";};?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>
@endsection