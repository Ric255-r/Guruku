 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Kelas Anda</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('amentor.kelas.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Kelas Anda</a>
                </li>
                <li class="menu-title">Video Kelas</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('amentor.video.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Video Kelas</a>
                </li>
                <li class="">
                    <a href="{{ route('amentor.video.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Video Kelas</a>
                </li>
                <li class="menu-title">Video Kelas Details</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('amentor.videodetails.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Video Details</a>
                </li>
                <li class="">
                    <a href="{{ route('amentor.videodetails.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Video Details</a>
                </li>

                <li class="menu-title">Test</li><!-- /.menu-title -->
                {{--@foreach ($users as $query)--}}
                    <li class="">
                        <a href="{{ route('amentor.soal.index',Auth::user()->kode_mentor) }}"> <i class="menu-icon fa fa-list"></i>Soal</a>
                    </li>
                {{--@endforeach--}


                <li class="menu-title">Profile</li><!-- /.menu-title -->
                {{--@foreach ($users as $query)--}}
                    <li class="">
                        <a href="{{ route('amentor.profile.index') }}"> <i class="menu-icon fa fa-list"></i>Profile Setting</a>
                    </li>
                {{--@endforeach--}}



                {{-- <li class="menu-title">Kelas Premium</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('adminkelaspremium.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Kelas</a>
                </li>
                <li class="">
                    <a href="{{ route('adminkelaspremium.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Kelas</a>
                </li>

                <li class="menu-title">Video Kelas Premium</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('videobayar.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Video Kelas</a>
                </li>
                <li class="">
                    <a href="{{ route('videobayar.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Video Kelas</a>
                </li> --}}

                {{--<li class="menu-title">Mentor</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('mentor.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Mentor</a>
                </li>
                <li class="">
                    <a href="{{ route('mentor.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Mentor</a>
                </li>--}}


                {{-- <li class="menu-title">Paket Kelas</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('adminpaket.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Kelas</a>
                </li>
                <li class="">
                    <a href="{{ route('adminpaket.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Kelas</a>
                </li>

                <li class="menu-title">Video Paket Kelas</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('videopaket.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Video Kelas</a>
                </li>
                <li class="">
                    <a href="{{ route('videopaket.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Video Kelas</a>
                </li> --}}


                {{--<li class="menu-title">Transaksi</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('transactions.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>
                </li>--}}
            </ul>
            {{-- @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">logout</button>
                </form>
            @endauth --}}
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
