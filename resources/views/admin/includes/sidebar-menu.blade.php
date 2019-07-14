<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <?php if(session()->get('role')=='Superadmin' || session()->get('role')=='manager'){?>
            <li>
                <a href="{{ asset('/super-admin') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <?php } ?>
            <li>
                <a href="{{ asset('/') }}"><i class="fa fa-dashboard fa-fw"></i> student forum</a>
            </li>
            <?php if(session()->get('role')=='Superadmin'){?>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Member <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/add-member') }}">Add Member</a>
                    </li>
                    <li>
                        <a href="{{ url('/manage-member') }}">Manage Member</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Department <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/add-department') }}">Add Department</a>
                    </li>
                    <li>
                        <a href="{{ url('/allocate-coordinator') }}">Set Coordinator In Department</a>
                    </li>
                    <li>
                        <a href="{{ url('/manage-department') }}">Manage Coorrdinator In Department</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php } ?>
            <?php if(session()->get('role')=='manager'){?>
            <li>


                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Idea <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ url('/review-idea') }}">Manage Idea</a>
                    </li>
                    <li>
                        <a href="{{ url('/view-download') }}">Download Zip</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category Info <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/add-category') }}">Add Category</a>
                    </li>
                    <li>
                        <a href="{{ url('/manage-category') }}">Manage Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php } ?>
            <li>
                <a href="{{ url('/report') }}"><i class="fa fa-table fa-fw"></i>Reports </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>