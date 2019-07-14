@extends('admin.master')
@section('title')
    Manage Brand
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading " style="text-align: center">
                   <h2 class="text-info"> Manage Role Information</h2>
                </div>
                @if( $message = Session::get('message') )
                    <h4 style="text-align: center" class="page-header">{{ $message }}</h4>
            @endif
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>

                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Role Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($allRoles as $allRole)
                            <tr class="odd gradeX">
                                <td>{{ $allRole->id }}</td>
                                <td>{{ $allRole->name }}</td>
                                <td>{{ $allRole->roleName }}</td>
                                <td>
                                    {{--@if()--}}
                                        {{--<a href="{{ url('/unpublished-category/') }}" class="btn btn-success btn-xs" title="Published Category">--}}
                                            {{--<span class="glyphicon glyphicon-arrow-up"></span>--}}
                                        {{--</a>--}}
                                    {{--@else--}}
                                        {{--<a href="{{ url('/published-category/') }}" class="btn btn-warning btn-xs" title="Unpublished Category">--}}
                                            {{--<span class="glyphicon glyphicon-arrow-down"></span>--}}
                                        {{--</a>--}}
                                    {{--@endif--}}

                                    <a href="{{ url('/edit-member/'.$allRole->id) }}" class="btn btn-primary btn-xs" title="Edit Role">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection