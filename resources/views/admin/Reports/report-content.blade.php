@extends('admin.master')
@section('title')
    Manage Idea
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if( $message = Session::get('message') )
                <h1 class="page-header">{{ $message }}</h1>
            @endif
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="text-align: center;">
                    <h2 class="text-info">Department wise Ideas</h2>
                </div>
                <!-- /.panel-heading -->



                <?php if(Session::get('role')=='Superadmin'||Session::get('role')=='manager'){?>
                    <h4 id="bit" style="text-align: center" class="text-info">BIT</h4>

                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th>Idea ID</th>
                                <th>Idea Title</th>
                                <th>Category Name(ID)</th>
                                <th>User Name(ID)</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reportsBit as $reportBit)
                                <tr class="odd gradeX">
                                    <td>{{ $reportBit->id }}</td>
                                    <td>{{ $reportBit->idea_title }}</td>
                                    <td>{{ $reportBit->category_name }}({{$reportBit->Cid}})</td>
                                    <td>{{ $reportBit->name}}({{$reportBit->user_id}})</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </div>
                    <h4 id="cis" style="text-align: center" class="text-info">CIS</h4>

                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th>Idea ID</th>
                                <th>Idea Title</th>
                                <th>Category Name(ID)</th>
                                <th>User Name(ID)</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reportsCis as $reportCis)
                                <tr class="odd gradeX">
                                    <td>{{ $reportCis->id }}</td>
                                    <td>{{ $reportCis->idea_title }}</td>
                                    <td>{{ $reportCis->category_name }}({{$reportCis->Cid}})</td>
                                    <td>{{ $reportCis->name}}({{$reportCis->user_id}})</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </div>
                    <h4 id="cse" style="text-align: center" class="text-info">CSE</h4>

                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th>Idea ID</th>
                                <th>Idea Title</th>
                                <th>Category Name(ID)</th>
                                <th>User Name(ID)</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reportsCse as $reportCse)
                                <tr class="odd gradeX">
                                    <td>{{ $reportCse->id }}</td>
                                    <td>{{ $reportCse->idea_title }}</td>
                                    <td>{{ $reportCse->category_name }}({{$reportCse->Cid}})</td>
                                    <td>{{ $reportCse->name}}({{$reportCse->user_id}})</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </div>

            <?php }else{ ?>
                @if($departments->department_name=='BIT')
                    <h4 style="text-align: center" class="text-info">BIT</h4>

                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th>Idea ID</th>
                                <th>Idea Title</th>
                                <th>Category Name(ID)</th>
                                <th>User Name(ID)</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reportsBit as $reportBit)
                                <tr class="odd gradeX">
                                    <td>{{ $reportBit->id }}</td>
                                    <td>{{ $reportBit->idea_title }}</td>
                                    <td>{{ $reportBit->category_name }}({{$reportBit->Cid}})</td>
                                    <td>{{ $reportBit->name}}({{$reportBit->user_id}})</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </div>

                @elseif($departments->department_name=='CIS')
                    <h4 id="cis" style="text-align: center" class="text-info">CIS</h4>

                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th>Idea ID</th>
                                <th>Idea Title</th>
                                <th>Category ID</th>
                                <th>User ID</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reportsCis as $reportCis)
                                <tr class="odd gradeX">
                                    <td>{{ $reportCis->id }}</td>
                                    <td>{{ $reportCis->idea_title }}</td>
                                    <td>{{ $reportCis->category_id }}</td>
                                    <td>{{ $reportCis->user_id }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </div>

                @elseif($departments->department_name=='CSE')
                    <h4 style="text-align: center" class="text-info">CSE</h4>

                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th>Idea ID</th>
                                <th>Idea Title</th>
                                <th>Category Name(ID)</th>
                                <th>User Name(ID)</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reportsCse as $reportCse)
                                <tr class="odd gradeX">
                                    <td>{{ $reportCse->id }}</td>
                                    <td>{{ $reportCse->idea_title }}</td>
                                    <td>{{ $reportCse->category_name }}({{$reportCse->Cid}})</td>
                                    <td>{{ $reportCse->name}}({{$reportCse->user_id}})</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </div>
            @endif

                <?php } ?>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection