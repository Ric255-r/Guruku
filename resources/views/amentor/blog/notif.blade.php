@extends('includes.amentor.app')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Notifikasi Blog</h1>
                <ol class="breadcrumb mb-4 align-middle">
                    <li class="breadcumb-item active align-middle mt-1">Notifikasi Blog anda </li>
                    <li class="">
                    </li>
                </ol>
                <div class="row justify-content-center">
                    {{-- untuk blog cukup munculkan yang ada notifnya --}}
                    {{-- isi data yang didalam tooltip juga --}}
                    @php
                        $countkomen = 0;
                        $countbalas = 0;
                        foreach($blog as $query){
                            foreach ($query->komentar as $query2) {
                                $countkomen++;
                            }
                            foreach ($query->balasan as $query3) {
                                $countbalas++;
                            }
                        }
                    @endphp
                    @if ($countkomen || $countbalas != 0)
                        @foreach ($blog as $query)
                            @if ($query->komentar->count() > 0 || $query->balasan->count() > 0)
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body" data-toggle="tooltip" title="{{ $query->title }}">
                                            <i class="fas fa-newspaper"></i>
                                            {{ $query->title }}
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between"
                                        data-toggle="tooltip" title="{{ $query->komentar->count() + $query->balasan->count() }} Notifikasi Terbaru">
                                            <form action="{{ route('amentor.blog.notifkomen', $query->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <p class="small text-white">
                                                    Anda Memiliki Total "{{ $query->komentar->count() + $query->balasan->count() }}" Komentar baru di blog Ini 
                                                    <input type="hidden" name="blog_slug" value="{{ $query->slug }}">
                                                    <input type="submit" value="Cek Sekarang" style="color: blue; border: 0; background: transparent;">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body" data-toggle="tooltip">
                                    <i class="fas fa-newspaper"></i>
                                    Notifikasi
                                </div>
                                <div class="mb-3 card-footer d-flex align-items-center justify-content-between"
                                data-toggle="tooltip">
                                    <p class="small text-white">
                                        <center>Tidak Ada Notifikasi Terbaru</center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- @foreach ($blog as $query)
                        @if ($query->komentar->count() > 0 || $query->balasan->count() > 0)
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" data-toggle="tooltip" title="{{ $query->title }}">
                                        <i class="fas fa-newspaper"></i>
                                        {{ $query->title }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"
                                    data-toggle="tooltip" title="{{ $query->komentar->count() + $query->balasan->count() }} Notifikasi Terbaru">
                                        <form action="{{ route('amentor.blog.notifkomen', $query->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <p class="small text-white">
                                                Anda Memiliki Total "{{ $query->komentar->count() + $query->balasan->count() }}" Komentar baru di blog Ini 
                                                <input type="hidden" name="blog_slug" value="{{ $query->slug }}">
                                                <input type="submit" value="Cek Sekarang" style="color: blue; border: 0; background: transparent;">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach --}}
                    {{-- <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Nama Blog">
                                <i class="fas fa-newspaper"></i>
                                Blog Belajar Piano
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="2 Notifikasi">
                                <p class="small text-white">
                                    Anda memiliki 2 Notifikasi
                                    <a href="#" class="pl-2 cek-sekarang">Cek sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Nama Blog">
                                <i class="fas fa-newspaper"></i>
                                Blog Belajar Piano
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="2 Notifikasi">
                                <p class="small text-white">
                                    Anda memiliki 2 Notifikasi
                                    <a href="#" class="pl-2 cek-sekarang">Cek sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Nama Blog">
                                <i class="fas fa-newspaper"></i>
                                Blog Belajar Piano
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="2 Notifikasi">
                                <p class="small text-white">
                                    Anda memiliki 2 Notifikasi
                                    <a href="#" class="pl-2 cek-sekarang">Cek sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Nama Blog">
                                <i class="fas fa-newspaper"></i>
                                Blog Belajar Piano
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="2 Notifikasi">
                                <p class="small text-white">
                                    Anda memiliki 2 Notifikasi
                                    <a href="#" class="pl-2 cek-sekarang">Cek sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div> --}}

                    {{--kodingan lama --}}
                    {{--<div class="col-sm-12">
                        @foreach ($blog as $query)
                            @if ($query->komentar->isEmpty())
                                <div class="col-sm-12 mt-1">
                                    {{ $query->title }} :  <br>
                                    Anda Tidak Memiliki Notifikasi Terbaru <br>
                                </div>
                            @else
                                <div class="col-sm-12 mt-1">
                                    {{ $query->title }} : <br>
                                    <form action="{{ route('amentor.blog.notifkomen', $query->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        Anda Memiliki Total "{{ $query->komentar->count() + $query->balasan->count() }}" Komentar baru di blog
                                        <input type="hidden" name="blog_slug" value="{{ $query->slug }}">
                                        <input type="submit" value="{{ $query->title }}" style="color: blue; border: 0; background: transparent;">
                                    </form>
                                </div>
                            @endif
                        @endforeach
                    </div>--}}

                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Guruku 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

@endsection
