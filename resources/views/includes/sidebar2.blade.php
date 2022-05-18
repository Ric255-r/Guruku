 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('orang.index') }}"><i class
                        ="menu-icon fa fa-laptop"></i>Profile</a>
                </li>
                <hr>
                <li class="">
                    <a href="{{ route('myclass.index') }}"> <i class="menu-icon fa fa-book"></i>Kelas Saya</a>
                </li>
                <li class="">
                    <a href="{{ route('notification.index') }}"> <i class="menu-icon fa fa-bell"></i>Pemberitahuan</a>
                </li>
                <li class="">
                    <a href="{{ url('/password/reset') }}"> <i class="menu-icon fa fa-gear"></i>Reset Password</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->





{{--sidebar baru --}}
{{--<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('orang.index') }}" class="active"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
            </li>
            <li>
                <a href="{{ route('myclass.index') }}"><i class="fa fa-sitemap fa-fw"></i>Kelas Saya</a>
            </li>
            <li>
                <a href="{{ route('notification.index') }}"><i class="fa fa-sitemap fa-fw"></i>Nofitikasi</a>
            </li>
            <li>
                <a href="{{ url('/password/reset') }}"><i class="fa fa-sitemap fa-fw"></i>Reset Password</a>
            </li>
        </ul>

    </div>
</div>--}}
