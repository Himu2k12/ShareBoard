
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('/') !!}">
                <img src="{{ asset('/front/') }}/assets/img/logo.png" height="36px;" alt="Site Logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{!! url('/') !!}">Home</a></li>
                <?php if(session()->get('role')=='student'||session()->get('role')=='coordinator'){?>
                <li><a href="{!! url('/Profile-view') !!}">Profile</a></li>
                <?php } ?>
                <li><a href="{{url('/idea-details')}}">Submit Idea</a></li>
                <?php if(session()->get('role')=='manager'||session()->get('role')=='Superadmin'){?>
                <li><a href="{{url('/super-admin')}}">Admin</a></li>
                <?php } ?>
                <?php if(session()->get('role')=='coordinator'){?>
                <li><a href="{{url('/report-of-coordinator')}}">Report</a></li>
                <?php } ?>
                <li><a href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit(); ">
                        <i class="fa fa-sign-out fa-fw"></i> Logout-({{Auth::user()->name}})
                    </a>
                </li>
            </ul>
        </div><!-- end of /.navbar-collapse -->
    </div><!-- end of /.container -->
</nav>
<form action="{{ route('logout') }}" method="POST" id="logoutForm">
    {{ csrf_field() }}
</form>
