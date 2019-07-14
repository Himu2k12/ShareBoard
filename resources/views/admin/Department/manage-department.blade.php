@extends('admin.master')
@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="text-align: center;">Coordinator in Department</h3>
                    @if( $message = Session::get('message') )
                        <h4 style="color:green;text-align: center" class="page-header">{{ $message }}</h4>
                    @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Department ID</th>
                            <th>Department Name</th>
                            <th>Coordinator ID</th>
                            <th>Coordinator Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($allDepartments as $department)
                            <tr class="odd gradeX">

                                <td>{{ $department->id }}</td>
                                <td>{{ $department->department_name }}</td>
                                <td>{{ $department->coordinator_id}}</td>
                                <td>{{ $department->name}}</td>
                                <td>

                                    <a href="{{ url('/edit-department/'.$department->id) }}" class="btn btn-primary btn-xs" title="Edit Department">
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