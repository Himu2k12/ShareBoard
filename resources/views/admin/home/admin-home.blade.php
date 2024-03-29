@extends('admin.master')

@section('content')
    <script>

        var Bit="<?php echo $percentOfBit;?>";
        var Cis="<?php echo $percentOfCis;?>";
        var Cse="<?php echo $percentOfCse;?>";
    </script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="text-align: center;font-family: 'Kalam';font-size: 28px;">{{session()->get('role')}}-DashBoard</h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-success">
        <div class="panel-heading" style="margin-bottom: 15px">
            <h4 style="text-align: center;font-family: 'Kalam';font-size: 22px;";>Number of Ideas Made By Each Department</h4>
        </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p style="text-align: center">BIT Department</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if(isset($totalBitIdeas)){echo $totalBitIdeas;} else{ echo 0;}?></div>
                            <div>IDEAS</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/report#bit')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <p style="text-align: center">CIS Department</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if(isset($totalCisIdeas)){echo $totalCisIdeas;} else{ echo 0;}?></div>
                            <div>IDEAS</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/report#cis')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <p style="text-align: center">CSE Department</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if(isset($totalCseIdeas)){echo $totalCseIdeas;} else{ echo 0;}?></div>
                            <div>IDEAS</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/report#cse')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    </div>
    <div class="panel panel-info">
        <div class="panel-heading" style="margin-bottom: 15px">
            <h4 style="text-align: center;font-family: 'Kalam';font-size: 22px;";>Other Essential Reports of all Department</h4>
        </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <p style="text-align: center">Number Of Contributors</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>BIT Department: {{$BitContributors}}</div>
                            <div>CIS Department: {{$CisContributors}}</div>
                            <div>CSE Department: {{$CseContributors}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/report#bit')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <p style="text-align: center">Ideas Without a Comment</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comment-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if(isset($IdeaWithoutCmnt)){echo $IdeaWithoutCmnt;} else{ echo 0;}?></div>
                            <div>Ideas has No Comments</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/report#cis')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <p style="text-align: center">Anonymous Ideas and Comments</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-question-circle-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>ANONYMOUS IDEAS: <?php if(isset($AnonymousIdeas)){echo $AnonymousIdeas;} else{ echo 0;}?></div>
                            <div>ANONYMOUS COMMENTS: <?php if(isset($AnonymousCmnts)){echo $AnonymousCmnts;} else{ echo 0;}?></div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/report#cse')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="morris-area-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <!-- /.panel -->
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: darkslategray;color: white">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Idea Percentage of Each Department
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                    <a href="#" class="btn btn-default btn-block">View Details</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
           <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
@endsection