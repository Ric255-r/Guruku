<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href=""><img src="{{ url('img/logo.png') }}" alt="Logo" style="width:190px; height:44px;"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ url('img/peo.png') }}" alt="User Avatar">
                </a>
                <div class="user-menu dropdown-menu">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block btn-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /#header -->



{{--navbar baru --}}

{{--<div class="navbar-header">
    <a class="navbar-brand" href="#">SMK Immanuel</a>
</div>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

<!-- Top Navigation: Left Menu -->
<ul class="nav navbar-nav navbar-left navbar-top-links">
    <li><a href="#"><i class="fa fa-home fa-fw"></i>Home</a></li>
</ul>

<!-- Top Navigation: Right Menu -->
<ul class="nav navbar-right navbar-top-links">
    <li class="dropdown navbar-inverse">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-comment fa-fw"></i> New Comment
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
    </li>
</ul>--}}
