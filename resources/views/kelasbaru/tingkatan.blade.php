<div id="kelgratis">
    @guest
        @if ($gratis->count() == 0)
            <div class="alert alert-danger mt-5">
                <h4>Kelas Not Found</h4>
            </div>
        @else
            @foreach ($gratis as $query)
                @if ($query->jenis == 'gratis')
                    @if ($query->status == 'PUBLISH')
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                            <div class="card card-kelas">
                                <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid" />
                                <div class="row">
                                    <div class="col-lg-6">
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
                                                    echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1' />" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                }else{
                                                    $lala = $total / $counter;
                                                    $foto = URL::asset('/foto/bintang.png');
                                                    echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1' />" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="kategori-baru ml-auto">
                                            {{ $query->tingkat }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-3">
                                    <div class="col-lg-12">
                                        <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->kelas }}">{{ Str::limit($query->kelas,'20') }}</h5>
                                        <div class="media" style="margin-top:30px;">
                                            <a href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}" target="_blank">
                                                <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                    class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                    alt="people"
                                                    data-toggle="tooltip"
                                                    title="{{ $query->mentor->name }}"
                                                />
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
                                <hr />
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
                    @endif
                @endif
            @endforeach
        @endif
    @endguest
    @auth
        @if (Auth::user()->roles == 'ADMIN')
            <div class="container">
                <div class="row justify-content-center mt-3">
                    @if ($gratis->count() == 0)
                        <div class="alert alert-danger mt-5">
                            <h4>Kelas Not Found</h4>
                        </div>
                    @else
                        @foreach ($gratis as $query)
                            @if ($query->jenis == 'gratis')
                                @if ($query->status == 'PUBLISH')
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                        <div class="card card-kelas">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                            <div class="row">
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
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                                    @elseif($query->jenis == 'premium')
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                    @else
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                    @endif
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>


        @elseif(Auth::user()->roles == 'USERS')

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p style="color:#1d1d1d; font-size:20px;" class="mt-3">Ayuk lanjut belajar!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 slick-sedang-populer">
                        @forelse ($join as $query)
                            @if ($query->user_id == Auth::user()->id)
                                {{--<div class="item px-2">
                                    <div class="card card-kelas mt-3" data-aos="zoom-out-down" data-aos-delay="300">
                                        <div class="card">
                                            <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1"
                                            class="wanita1 img-fluid"
                                            data-toggle="tooltip"
                                            title="{{ $query->product->kelas }}">
                                            <div class="row">
                                                <div class="col-lg-6">
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
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="kategori-baru ml-auto">
                                                        {{ $query->product->tingkat }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-3">
                                                <div class="col-lg-12">
                                                    <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->product->kelas }}">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                    <div class="media" style="margin-top:30px;">
                                                        <a href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}" target="_blank">
                                                            <img src="{{ @$query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                                alt="people"
                                                                data-toggle="tooltip"
                                                                title="{{ $query->product->mentor->name }}"
                                                            >
                                                        </a>
                                                        <div class="media-body txt-mentor">
                                                            <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->product->mentor->name }}">
                                                                <a target="_blank"
                                                                style="color:#1d1d1d; text-decoration:none;"
                                                                href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}">
                                                                    {{ $query->product->mentor->name }}
                                                                </a>
                                                            </h5>
                                                            <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Lanjut Belajar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                                <div class="item px-2 mt-3">
                                    <div class="card card-kelas">
                                        <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1"
                                        class="wanita1 img-fluid"
                                        data-toggle="tooltip"
                                        title="{{ $query->product->kelas }}">
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
                                                    {{ $query->product->tingkat }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pl-3">
                                            <div class="col-lg-12">
                                                <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->product->kelas }}">{{ Str::limit($query->product->kelas,'20') }}</h5>
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
                                                <div class="media" style="margin-top:30px;">
                                                    <a href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}" target="_blank">
                                                        <img src="{{ $query->product->mentor->file != null ? asset('/storage/'.$query->product->mentor->file) : asset('/Foto/peo2.png') }}"
                                                            class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                            alt="people"
                                                            data-toggle="tooltip"
                                                            title="{{ $query->product->mentor->name }}"
                                                        >
                                                    </a>
                                                    <div class="media-body txt-mentor">
                                                        <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->product->mentor->name }}">
                                                            <a target="_blank"
                                                            style="color:#1d1d1d; text-decoration:none;"
                                                            href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}">
                                                                {{ $query->product->mentor->name }}
                                                            </a>
                                                        </h5>
                                                        <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    {{--@if ($query->jenis == 'gratis')
                                                        <p class="kelas-gratis">GRATIS</p>
                                                    @elseif($query->jenis == 'premium')
                                                        <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                                                    @else
                                                        <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                                                    @endif--}}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-lanjut btn-block stretched-link">Lanjut Belajar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>Yah Kamu belum mempunyai kelas</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <p style="color:#1d1d1d; font-size:20px; font-weight:600" class="mt-5">Semua Kelas</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @if ($gratis->count() == 0)
                        <div class="alert alert-danger">
                            <h4>Kelas Not Found</h4>
                        </div>
                    @else

                        @foreach ($gratis as $query)
                            @if ($query->jenis == 'gratis')
                                @if ($query->status == 'PUBLISH')
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
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
                                                            <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                                        @elseif($query->jenis == 'premium')
                                                            <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                        @else
                                                            <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

        @else
            <div class="container">
                <div class="row justify-content-center mt-3">
                    @if ($gratis->count() == 0)
                        <div class="alert alert-danger mt-5">
                            <h4>Kelas Not Found</h4>
                        </div>
                    @else
                        @foreach ($gratis as $query)
                            @if ($query->jenis == 'gratis')
                                @if ($query->status == 'PUBLISH')
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                        <div class="card card-kelas">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                            <div class="row">
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
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                                    @elseif($query->jenis == 'premium')
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                    @else
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                    @endif
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    @endauth
</div>

<div id="kelbayar">
    @guest
        @if ($bayar->count() == 0)
            <div class="alert alert-danger mt-5">
                <h4>Kelas Not Found</h4>
            </div>
        @else
            @foreach ($bayar as $query)
                @if ($query->jenis == 'premium')
                    @if ($query->status == 'PUBLISH')
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
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
                    @endif
                    {{--@else
                    <div class="alert alert-danger">
                        <h4>Kelas Not Found</h4>
                    </div>--}}
                @endif
            @endforeach
        @endif
    @endguest


    @auth
        @if (Auth::user()->roles == 'ADMIN')
            <div class="container">
                <div class="row justify-content-center mt-3">
                    @if ($bayar->isEmpty())
                        <div class="alert alert-danger mt-5">
                            <h4>Kelas Not Found</h4>
                        </div>
                    @else
                        @foreach ($bayar as $query)
                            @if ($query->jenis == 'premium')
                                @if ($query->status == 'PUBLISH')
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                        <div class="card card-kelas">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                            class="wanita1 img-fluid"
                                            data-toggle="tooltip"
                                            title="{{ $query->kelas }}">
                                            <div class="row">
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
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

        @elseif(Auth::user()->roles == 'USERS')

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <p style="color:#464646; font-size:20px; font-weight:600" class="mt-3">Ayuk lanjut belajar!</p>
                            </div>
                        </div>
                    </div>
                    @forelse ($user as $query)
                        @if ($query->user_id == Auth::user()->id && $query->transaction->transaction_status == 'SUCCESS')
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                <div class="card card-kelas">
                                    <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1"
                                    class="wanita1 img-fluid"
                                    data-toggle="tooltip"
                                    title="{{ $query->product->kelas }}">
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
                                                {{ $query->product->tingkat }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pl-3">
                                        <div class="col-lg-12">
                                            <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->product->kelas }}">{{ Str::limit($query->product->kelas,'20') }}</h5>
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
                                            <div class="media" style="margin-top:30px;">
                                                <a href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}" target="_blank">
                                                    <img src="{{ @$query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                        class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                        alt="people"
                                                        data-toggle="tooltip"
                                                        title="{{ $query->product->mentor->name }}"
                                                    >
                                                </a>
                                                <div class="media-body txt-mentor">
                                                    <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->product->mentor->name }}">
                                                        <a target="_blank"
                                                        style="color:#1d1d1d; text-decoration:none;"
                                                        href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}">
                                                            {{ $query->product->mentor->name }}
                                                        </a>
                                                    </h5>
                                                    <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            {{--@if ($query->product->jenis == 'gratis')
                                                <p class="kelas-gratis">GRATIS</p>
                                            @elseif($query->product->jenis == 'premium')
                                                <p class="hrg-kelas">Rp. @convert($query->product->harga)</p>
                                            @else
                                                <p class="hrg-kelas">Rp. @convert($query->product->harga)</p>
                                            @endif--}}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Lanjut Belajar</a>
                                            {{--@if ($query->product->jenis == 'gratis')
                                                <a href="{{ route('kelas.show',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                            @elseif($query->jenis == 'premium')
                                                <a href="{{ route('kelas.show',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                            @else
                                                <a href="{{ route('kelas.show',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                            @endif--}}
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @empty
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>Yah kamu belum ada kelas premium!</p>
                                    </div>
                                </div>
                            </div>
                    @endforelse
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <p style="color:#1d1d1d; font-size:20px; font-weight:600" class="mt-5">Semua Kelas</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @if ($bayar->count() == 0)
                        <div class="alert alert-danger">
                            <h4>Kelas Not Found</h4>
                        </div>
                    @else
                        @foreach ($bayar as $query)
                            @if ($query->jenis == 'premium')
                                @if ($query->status == 'PUBLISH')
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
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
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

        @else
            <div class="container">
                <div class="row justify-content-center mt-3">
                    @if ($bayar->count() == 0)
                        <div class="alert alert-danger mt-5">
                            <h4>Kelas Not Found</h4>
                        </div>
                    @else
                        @foreach ($bayar as $query)
                            @if ($query->jenis == 'premium')
                                @if ($query->status == 'PUBLISH')
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                        <div class="card card-kelas">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                            class="wanita1 img-fluid"
                                            data-toggle="tooltip"
                                            title="{{ $query->kelas }}">
                                            <div class="row">
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
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    @endauth
</div>