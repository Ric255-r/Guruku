<div id="query_kontengratis">
    <div class="row">
        <div class="col-lg-12 owl-carousel owl-theme carousel-terbaru" data-aos="zoom-out-up">
            @forelse ($terbarugrat as $query)
            {{--<div class="slick-kelas-terbaru">--}}
                <div class="item px-2">
                    <div class="card">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <img src="{{ asset('/storage/'.$query->file) }}" alt=""
                                width="107px" height="112px" class="ml-lg-2 jarak-terbaru" style="">
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-xl-0 mx-lg-0 mx-md-3 mx-sm-3 mx-3">
                                <span class="badge badge-success jenis-terbaru mr-xl-1 mr-lg-4 mr-md-4 mr-sm-4 mr-4" style="float:right;">
                                    {{ $query->jenis }}
                                </span>
                                <p class="matpel">{{ Str::limit($query->kelas,'14') }}</p>
                                <p class="waktu-buat">{{ $query->created_at->toDateString() }} / {{ $query->tingkat }}</p>
                                <div class="media">
                                    <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                    style="width:50px; height:50px; border-radius:50px;"
                                    class="people-terbaru" alt="">
                                    <div class="media-body ml-3">
                                        <p class="vet-terbaru">{{ $query->mentor->name }}</p>
                                        <p class="ex-terbaru">{{ $query->mentor->bidang }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('kelas.show', $query->slug) }}" class="stretched-link" data-toggle="tooltip" title="{{ $query->kelas }}"></a>
                    </div>
                </div>
            {{--</div>--}}
            @empty
                <div class="item">
                    <p class="text-center">Belum ada kelas terbaru</p>
                </div>
            @endforelse
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p class="txt-kategori mt-4">Semua kursus {{ $topik->topik }}</p>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        @forelse ($gratis as $query)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up">
                <div class="card card-kelas">
                    <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                    class="wanita1 img-fluid"
                    data-toggle="tooltip"
                    title="{{ $query->kelas }}">
                    <div class="row">
                        {{--<div class="col-lg-6">
                            <div class="rating-baru mr-auto">
                                @php
                                    $total = 0;
                                    $counter = 0;
                                @endphp
                                @foreach ($rating as $value)
                                    @if ($value->id_kelas == $query->id)
                                        @php
                                            $total += intval($value->rating);
                                            $counter++;
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                    if($total == null){
                                        $foto = URL::asset('/foto/bintang.png');
                                        echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                    }else{
                                        $lala = $total / $counter;
                                        $foto = URL::asset('/foto/bintang.png');
                                        echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                    }
                                @endphp
                            </div>
                        </div>--}}
                        <div class="col-lg-12">
                            <div class="kategori-baru mx-auto">
                                {{ $query->tingkat }}
                            </div>
                        </div>
                    </div>
                    <div class="row pl-3">
                        <div class="col-lg-12">
                            <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->kelas }}">{{ Str::limit($query->kelas,'20') }}</h5>
                            @php
                                $total = 0;
                                $counter = 0;
                            @endphp
                            @foreach ($rating as $value)
                                @if ($value->id_kelas == $query->id)
                                    @php
                                        $total += intval($value->rating);
                                        $counter++;
                                    @endphp
                                @endif
                            @endforeach
                            @php
                                if($total == null){
                                    $foto = URL::asset('/Foto/bintang.png');
                                    echo "
                                    <span>
                                        <img src='$foto' alt='bintang' class='img-fluid d-inline vertical-align-center' style='margin-top:-5px; width:20px; height:20px;'>
                                    </span>
                                    <span class='rating-jumlah'> 0 <span class='rating-total'> (0) </span> </span>";
                                    
                                }else{
                                    $lala = $total / $counter;
                                    $foto = URL::asset('/Foto/bintang.png');
                                    echo "
                                    <span>
                                        <img src='$foto' alt='bintang' class='img-fluid d-inline vertical-align-center' style='margin-top:-5px; width:20px; height:20px;'>
                                    </span>
                                    <span class='rating-jumlah'> ". number_format($lala, 1) . " <span class='rating-total'> ($counter) </span> </span>";
                                }
                            @endphp
                            {{-- <span>
                                <img src="{{ asset('/Foto/bintang.png') }}" alt="bintang" class="img-fluid d-inline vertical-align-center" style="margin-top:-5px; width:20px; height:20px;">
                            </span>
                            <span class="rating-jumlah"> 4.7 <span class="rating-total"> (20) </span> </span> --}}
                            <div class="media" style="margin-top:30px;">
                                <a href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}" target="_blank">
                                    <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                        class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                        alt="people"
                                        data-toggle="tooltip"
                                        title="{{ $query->mentor->name }}"
                                    >
                                </a>
                                <div class="media-body txt-mentor">
                                    <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->mentor->name }}">
                                        <a target="_blank"
                                        style="color:#1d1d1d; text-decoration:none;"
                                        href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}">
                                            {{ $query->mentor->name }}
                                        </a>
                                    </h5>
                                    <p class="exp">{{ $query->mentor->bidang }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                @if ($query->jenis == 'gratis')
                                    <p class="kelas-gratis">GRATIS</p>
                                @elseif($query->jenis == 'premium')
                                    <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                                @else
                                    <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                @if ($query->jenis == 'gratis')
                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>--}}
                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                @elseif($query->jenis == 'premium')
                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                @else
                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col-lg-12">
                    <p>Yah kelasnya belum tersedia</p>
                </div>
            </div>
        @endforelse
        <div class="row justify-content-center">
            <div class="col-lg-12">
                {{ $gratis->links() }}
            </div>
        {{--@endforeach--}}
        </div>
    </div>
</div>

<div id="query_kontenbayar">
    <div class="row">
        <div class="col-lg-12 owl-carousel owl-theme carousel-terbaru" data-aos="zoom-out-up">
            @forelse ($terbarubayar as $query)
                {{--<div class="slick-kelas-terbaru">--}}
                    <div class="item px-2">
                        <div class="card">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <img src="{{ asset('/storage/'.$query->file) }}" alt=""
                                    width="107px" height="112px" class="ml-lg-2 jarak-terbaru" style="">
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-xl-0 mx-lg-0 mx-md-3 mx-sm-3 mx-3">
                                    <span class="badge badge-success jenis-terbaru mr-xl-1 mr-lg-4 mr-md-4 mr-sm-4 mr-4" style="float:right;">
                                        {{ $query->jenis }}
                                    </span>
                                    <p class="matpel">{{ Str::limit($query->kelas,'14') }}</p>
                                    <p class="waktu-buat">{{ $query->created_at->toDateString() }} / {{ $query->tingkat }}</p>
                                    <div class="media">
                                        <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                        style="width:50px; height:50px; border-radius:50px;"
                                        class="people-terbaru" alt="">
                                        <div class="media-body ml-3">
                                            <p class="vet-terbaru">{{ $query->mentor->name }}</p>
                                            <p class="ex-terbaru">{{ $query->mentor->bidang }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('kelas.show', $query->slug) }}" class="stretched-link" data-toggle="tooltip" title="{{ $query->kelas }}"></a>
                        </div>
                    </div>
                {{--</div>--}}
            @empty
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center">Belum ada kelas terbaru</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p class="txt-kategori mt-5">Semua kursus {{ $topik->topik }}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        @forelse ($bayar as $query)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up">
                <div class="card card-kelas">
                    <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                    class="wanita1 img-fluid"
                    data-toggle="tooltip"
                    title="{{ $query->kelas }}">
                    <div class="row">
                        {{--<div class="col-lg-6">
                            <div class="rating-baru mr-auto">
                                @php
                                    $total = 0;
                                    $counter = 0;
                                @endphp
                                @foreach ($rating as $value)
                                    @if ($value->id_kelas == $query->id)
                                        @php
                                            $total += intval($value->rating);
                                            $counter++;
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                    if($total == null){
                                        $foto = URL::asset('/foto/bintang.png');
                                        echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                    }else{
                                        $lala = $total / $counter;
                                        $foto = URL::asset('/foto/bintang.png');
                                        echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                    }
                                @endphp
                            </div>
                        </div>--}}
                        <div class="col-lg-12">
                            <div class="kategori-baru mx-auto">
                                {{ $query->tingkat }}
                            </div>
                        </div>
                    </div>
                    {{--</div>--}}
                    <div class="row pl-3">
                        <div class="col-lg-12">
                            <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->kelas }}">{{ Str::limit($query->kelas,'20') }}</h5>
                            @php
                                $total = 0;
                                $counter = 0;
                            @endphp
                            @foreach ($rating as $value)
                                @if ($value->id_kelas == $query->id)
                                    @php
                                        $total += intval($value->rating);
                                        $counter++;
                                    @endphp
                                @endif
                            @endforeach
                            @php
                                if($total == null){
                                    $foto = URL::asset('/Foto/bintang.png');
                                    echo "
                                    <span>
                                        <img src='$foto' alt='bintang' class='img-fluid d-inline vertical-align-center' style='margin-top:-5px; width:20px; height:20px;'>
                                    </span>
                                    <span class='rating-jumlah'> 0 <span class='rating-total'> (0) </span> </span>";
                                    
                                }else{
                                    $lala = $total / $counter;
                                    $foto = URL::asset('/Foto/bintang.png');
                                    echo "
                                    <span>
                                        <img src='$foto' alt='bintang' class='img-fluid d-inline vertical-align-center' style='margin-top:-5px; width:20px; height:20px;'>
                                    </span>
                                    <span class='rating-jumlah'> ". number_format($lala, 1) . " <span class='rating-total'> ($counter) </span> </span>";
                                }
                            @endphp
                            {{-- <span>
                                <img src="{{ asset('/Foto/bintang.png') }}" alt="bintang" class="img-fluid d-inline vertical-align-center" style="margin-top:-5px; width:20px; height:20px;">
                            </span>
                            <span class="rating-jumlah"> 4.7 <span class="rating-total"> (20) </span> </span> --}}
                            <div class="media" style="margin-top:30px;">
                                <a href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}" target="_blank">
                                    <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                        class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                        alt="people"
                                        data-toggle="tooltip"
                                        title="{{ $query->mentor->name }}"
                                    >
                                </a>
                                <div class="media-body txt-mentor">
                                    <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->mentor->name }}">
                                        <a target="_blank"
                                        style="color:#1d1d1d; text-decoration:none;"
                                        href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}">
                                            {{ $query->mentor->name }}
                                        </a>
                                    </h5>
                                    <p class="exp">{{ $query->mentor->bidang }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            @if ($query->jenis == 'gratis')
                                <p class="kelas-gratis">GRATIS</p>
                            @elseif($query->jenis == 'premium')
                                <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                            @else
                                <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            @if ($query->jenis == 'gratis')
                                {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>--}}
                                <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                            @elseif($query->jenis == 'premium')
                                {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                            @else
                                {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <p>Yah kelasnya belum ada</p>
                </div>
            </div>
        @endforelse
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            {{ $bayar->links() }}
        </div>
    </div>
</div>

