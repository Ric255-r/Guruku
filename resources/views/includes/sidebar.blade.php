 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title"> Kelas
                    @if ($req > 0)
                        <span class="badge badge-info">{{ $req }}</span>
                    @endif
                </li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('adminkelasbaru.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Kelas</a>
                </li>
                <li class="">
                    <a href="{{ route('adminkelasbaru.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Kelas</a>
                </li>

                <li class="menu-title">Kategori</li>
                <li class="">
                    <a href="{{ route('kategori.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Kategori</a>
                </li>
                <li class="">
                    <a href="{{ route('kategori.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Kategori</a>
                </li>
                <li class="menu-title">Topik</li>
                <li class="">
                    <a href="{{ route('topik.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Topik</a>
                </li>
                <li class="">
                    <a href="{{ route('topik.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Topik</a>
                </li>
                <li class="menu-title">Video Kelas</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('video.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Video Kelas</a>
                </li>
                <li class="">
                    <a href="{{ route('video.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Video Kelas</a>
                </li>
                <li class="menu-title">Video Kelas Details</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('videodetails.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Video Details</a>
                </li>
                <li class="">
                    <a href="{{ route('videodetails.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Video Details</a>
                </li>


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

                <li class="menu-title">Mentor Dan User
                    @if ($itung > 0)
                        <span class="badge badge-info">{{ $itung }}</span>
                    @endif
                </li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('mentor.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Mentor</a>
                </li>
                <li class="">
                    <a href="{{ route('mentor.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Mentor</a>
                </li>


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

                <li class="menu-title">Bank</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('bank.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Bank</a>
                </li>
                <li class="">
                    <a href="{{ route('bank.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Bank</a>
                </li>

                <li class="menu-title">
                    Contact Us
                    @if ($bls > 0)
                        <span class="badge badge-info">{{ $bls }}</span>
                    @else

                    @endif
                </li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('admin.contact.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Pesan</a>
                </li>
                {{--<li class="">
                    <a href="{{ route('bank.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Bank</a>
                </li>--}}


                <li class="menu-title">
                    Transaksi
                    @if ($pen > 0)
                        <span class="badge badge-info">{{ $pen }}</span>
                    @else

                    @endif
                </li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('transactions.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>
                </li>
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
