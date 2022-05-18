{{-- @extends('layout.main')

@section('container')
<link rel="stylesheet" href="{{URL::asset('css/kelas.css')}}">
    <div class="container-fluid" style="margin-top:100px;">
        <div class="row">
            <div class="col-xl-12">
                <form action="#" method="post" class="form-inline">
                    <input class="form-control active-cyan-4 col-xl-5" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary ml-3" style="width:100px;">CARI</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($klsindex as $query)
                            <div class="col-xl-4 mt-5">
                                <div class="card">
                                    <img src="{{ URL::asset('/adminkelas/'.$query->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                                    <div class="card-body">
                                    <span class="card-title">{{$query->pelajaran}}</span>
                                    <span class="grat">Gratis</span>
                                        <p class="card-text">{{$query->deskripsi}}</p>
                                        <a href="/kelas/{{ $query->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <p id="demo"></p>
    <script>
        var str = 'Some verys long string';
        if(str.length > 10) str = str.substring(0,10)
        document.getElementById('demo').innerHTML = str + '..';
    </script> --}}
@endsection --}}
