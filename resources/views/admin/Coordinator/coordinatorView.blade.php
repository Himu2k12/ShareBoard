@extends('admin.master')

@section('content')
    <script>

        var Bit="<?php echo $percentOfBit;?>";
        var Cis="<?php echo $percentOfCis;?>";
        var Cse="<?php echo $percentOfCse;?>";
    </script>
    <!-- /.row -->
    <div class="panel panel-success">
        <div class="panel-heading" style="margin-bottom: 15px">
            <h4 style="text-align: center;font-family: 'Kalam';font-size: 22px;";>{{$departments->department_name}}  Department</h4>
        </div>
        <div class="row">
            @if($departments->department_name=='BIT')
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p style="text-align: center">BIT Department Ideas</p>
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
                @elseif($departments->department_name=='CIS')
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <p style="text-align: center">CIS Department ideas</p>
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
            @elseif($departments->department_name=='CSE')
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <p style="text-align: center">CSE Department ideas</p>
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
                @endif
                <div class="col-lg-4 col-md-4">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: darkslategray;color: white">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Idea Percentage of Each Department
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- /.panel .chat-panel -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">

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

        </div>
        <!-- /.row -->
    </div>

@endsection