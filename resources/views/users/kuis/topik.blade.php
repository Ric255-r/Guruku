<div class="row justify-content-center mt-2 divkategori">
    @forelse ($kuis as $item)
        <div class="col-lg-4 mt-3">
            <div class="card card-kuis" data-aos="zoom-out-up">
                <img src="{{ asset('gambar_kuis/'.$item->gambar) }}" alt="gbr_kuis" class="wanita1 img-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="rating-baru mr-auto">
                            @php
                                $total = 0;
                                $counter = 0;
                            @endphp
                            @foreach ($rating as $value)
                                @if ($value->id_kuis == $item->id)
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
                            {{ $item->tingkatan }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h5 class="txt-kelas">{{ $item->nama_kuis }}</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="br-topik-kuis"> Topik : {{ $item->topic }} </p>
                        </div>
                    </div>
                    <div class="media" style="margin-top:30px;">
                        <img src="{{ asset('/storage/'.$item->file) }}" class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;" alt="gbr_mentor">
                        <div class="media-body txt-mentor">
                            <h5 class="mt-0 nama-mentor">{{ $item->name }}</h5>
                            <p class="exp">{{ $item->bidang }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <p class="br-tgl">{{ date_format(new DateTime($item->created_at), "Y-m-d") }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <a href="{{ route('kuis.detailnya', $item->slug) }}" class="btn btn-beli btn-block stretched-link mb-2">Ikut Kuis</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <div class="alert alert-danger mt-5 text-center">
        <h4>Kuis Tidak Tersedia</h4>
    </div>
    @endforelse
</div>