@extends('admin.master')
@section('title')
    Manage Idea
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
                    <h2 class="text-info"> Manage Ideas</h2>
                    <h4 style="text-align: center;">@if( $message = Session::get('message') )
                            {{ $message }}
                        @endif</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>

                            <th>Idea ID</th>
                            <th>Idea Title</th>
                            <th>Idea Description</th>
                            <th>User ID</th>
                            <th>Category ID</th>
                            <th>Closer Date</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($ideas as $idea)
                            <tr class="odd gradeX">
                                <td>{{ $idea->id }}</td>
                                <td>{{ $idea->idea_title }}</td>
                                <td>{{ $idea->idea_description }}</td>
                                <td>{{ $idea->user_id }}</td>
                                <td>{{ $idea->category_id }}</td>
                                <td>{{ $idea->closer_date }}</td>
                                <td>{{ $idea->publication_status ==1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    @if($idea->publication_status ==1)
                                        <a href="{{ url('/unpublished-idea/'.$idea->id) }}" class="btn btn-success btn-xs" title="Published Idea">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ url('/published-idea/'.$idea->id) }}" class="btn btn-warning btn-xs" title="Unpublished Idea">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif
                                        <a href="{{ url('/delete-idea/'.$idea->id) }}" class="btn btn-danger btn-xs" title="Delete Idea" onclick="return confirm('Are you sure to delete this'); ">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a href="{{ url('/edit-idea/'.$idea->id) }}" class="btn btn-primary btn-xs" title="Edit Idea">
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