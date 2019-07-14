@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-md-offset-3" style="background-color: skyblue">
            <h1 class="page-header" style="text-align: center;font-family: 'Kalam';font-size: 28px;">Download resources</h1>
            <form action="{{ url('/download') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Download"/>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection