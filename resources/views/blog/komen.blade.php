<div class="row mb-1">
    <div class="col-sm-8" data-aos="fade-up" data-aos-delay="300">
        <h4>Komentar</h4>
    </div>
</div>

<div id="refresh-comment">
    @if ($comment->isEmpty())
        <div class="row mb-3">
            <div class="col-xl-8 col-lg-12" data-aos="fade-up" data-aos-delay="400">
                Jadilah Orang Pertama Untuk Berkomentar
            </div>
        </div>
    @else
        <div class="row mt-2" data-aos="fade-up" data-aos-delay="400">
            <div class="col-xl-8 col-lg-12 overflow-auto scroll-able" style="border:0.5px solid lightgrey; height:600px; border-radius:5px;">
                <ul class="list-unstyled">
                    @foreach ($comment as $komen)
                        <li class="media my-3 py-3" style="border:1px solid #e0e0e0; border-radius:5px;">
                            @if ($komen->file == null)
                                <img class="mr-3 img-fluid" style="width:60px; height:60px; border-radius:100px;"
                                    src="{{ asset('/foto/users.png') }}" alt="pic">
                            @else
                                <img class="mr-3 img-fluid" style="width:60px; height:60px; border-radius:100px;"
                                    src="{{ asset('/storage/'.$komen->file) }}" alt="pic">
                            @endif
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{{ $komen->name }}</h5>
                                <p>{{ $komen->pesan }}</p>
                                {{-- Bagian Reply dan Delete Buat Komentar --}}
                                <div class="text-right mx-3 pb-3">
                                    @guest
                                        <span class="mr-3">
                                            <a href="{{ url('/login') }}" onclick="alert('Login Dulu Ya')">Reply</a>
                                        </span>
                                    @endguest
                                    @auth
                                        <span class="mr-3">
                                            <a style="color: blue; cursor: pointer;"
                                            onclick="reply({{ $komen->id }}, '{{ $komen->name }}');
                                            return false"
                                            class="showreply" data-id="{{ $komen->id }}">Reply</a>
                                        </span>
                                        <span>
                                            @if ($komen->id_user == Auth::user()->id)
                                                <form action="{{ route('blog.delcomment', $komen->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                    style="background: transparent; border: 0; color: blue;" onclick="return confirm('Anda Yakin Ingin Menghapus Komentar?');" class="ml-5">Delete</button>
                                                </form>
                                            @endif
                                        </span>
                                    @endauth
                                </div>
                                {{-- End Komentar --}}
                                @foreach ($reply as $balas)
                                    @if ($komen->id == $balas->id_comment)
                                        <div class="media mt-1">
                                            @if ($balas->file == null)
                                                <a class="" href="#">
                                                    <img class="img-fluid" style="width:60px; height:60px; border-radius:100px;" src="{{ asset('/foto/users.png') }}" alt="pc">
                                                </a>
                                            @else
                                                <a class="" href="#">
                                                    <img class="img-fluid" style="width:55px; height:55px; border-radius:100px;" src="{{ asset('/storage/'.$balas->file) }}" alt="pc">
                                                </a>
                                            @endif
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $balas->name }}</h5>
                                                <p>{{ $balas->pesan }}</p>
                                                {{-- ini bagian balas delete untuk reply --}}
                                                <div class="text-right mx-3">
                                                    @guest
                                                        <span class="mr-xl-3 mr-lg-3 mr-md-3 mr-sm-0 mr-0">
                                                            <a href="{{ url('/login') }}" onclick="alert('Login Dulu Ya')">Reply</a>
                                                        </span>
                                                    @endguest
                                                    @auth
                                                        @if ($balas->id_user != Auth::user()->id)
                                                            <span class="mr-xl-3 mr-lg-3 mr-md-3 mr-sm-0 mr-0">
                                                                <a style="color: blue; cursor: pointer;"
                                                                onclick="reply({{ $komen->id }}, '{{ $balas->name }}');
                                                                return false"
                                                                class="showreply">Reply</a>
                                                            </span>
                                                        @endif
                                                        @if ($balas->id_user == Auth::user()->id)
                                                            <span class="ml-xl-0 ml-lg-0 ml-md-0 ml-sm-0">
                                                                <form action="{{ route('blog.delreply', $balas->id) }}" method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                    style="background: transparent; border: 0; color: blue;" onclick="return confirm('Anda Yakin Ingin Menghapus Komentar?');">Delete</button>
                                                                </form>
                                                            </span>
                                                        @endif
                                                    @endauth
                                                </div>
                                                {{-- Endreply --}}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                    {{-- <li class="media my-3 py-3" style="border:1px solid #e0e0e0; border-radius:5px;">
                        <img class="mr-3 img-fluid" style="width:60px; height:60px; border-radius:100px;" src="{{ asset('/Foto/users.png') }}" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">Nama</h5>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            <div class="text-right mx-3 pb-3">
                                <span class="mr-3">Reply</span>
                                <span>Delete</span>
                            </div>
                            <div class="media">
                                <a class="" href="#">
                                    <img class="img-fluid" style="width:60px; height:60px; border-radius:100px;" src="{{ asset('/Foto/users.png') }}" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">Nama</h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                    <div class="text-right mx-3">
                                        <span class="mr-xl-3 mr-lg-3 mr-md-3 mr-sm-0 mr-0">Reply</span>
                                        <span class="ml-xl-0 ml-lg-0 ml-md-0 ml-sm-0 ml-5">Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="media my-3 py-3" style="border:1px solid #e0e0e0; border-radius:5px;">
                        <img class="mr-3 img-fluid" style="width:60px; height:60px; border-radius:100px;" src="{{ asset('/Foto/users.png') }}" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">Nama</h5>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            <div class="text-right mx-3 pb-3">
                                <span class="mr-3">Reply</span>
                                <span>Delete</span>
                            </div>
                            <div class="media">
                                <a class="" href="#">
                                    <img class="img-fluid" style="width:60px; height:60px; border-radius:100px;" src="{{ asset('/Foto/users.png') }}" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">Nama</h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                    <div class="text-right mx-3">
                                        <span class="mr-xl-3 mr-lg-3 mr-md-3 mr-sm-0 mr-0">Reply</span>
                                        <span class="ml-xl-0 ml-lg-0 ml-md-0 ml-sm-0 ml-5">Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="media my-3 py-3" style="border:1px solid #e0e0e0; border-radius:5px;">
                        <img class="mr-3 img-fluid" style="width:60px; height:60px; border-radius:100px;" src="{{ asset('/Foto/users.png') }}" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">Nama</h5>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            <div class="text-right mx-3 pb-3">
                                <span class="mr-3">Reply</span>
                                <span>Delete</span>
                            </div>
                            <div class="media">
                                <a class="" href="#">
                                    <img class="img-fluid" style="width:60px; height:60px; border-radius:100px;" src="{{ asset('/Foto/users.png') }}" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">Nama</h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                    <div class="text-right mx-3">
                                        <span class="mr-xl-3 mr-lg-3 mr-md-3 mr-sm-0 mr-0">Reply</span>
                                        <span class="ml-xl-0 ml-lg-0 ml-md-0 ml-sm-0 ml-5">Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    @endif

    {{-- ini kodingan awal --}}
    {{-- <div class="card">
        <div class="card-title" style="margin-bottom: -0.25rem !important">
            <div class="row">
                <div class="col-2" style="border:1px solid black;">
                    @if ($komen->file != null)
                        <img src="{{ asset('/storage/'.$komen->file) }}" alt="profile" class="img-fluid" style="border-radius:50px;">
                    @else
                        <img src="{{ asset('/Foto/cewe4.jpg') }}" alt="profile" class="img-fluid" style="border-radius:100px; width:100px;">
                    @endif
                </div>
                <div class="col-10">
                    <b>{{ $komen->name }}</b>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10">
                    {{ $komen->pesan }}
                    @foreach ($reply as $balas)
                        @if ($komen->id == $balas->id_comment)
                            <div class="card mt-2">
                                <div class="card-title" style="margin-bottom: -0.25rem !important">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('/storage/'.$balas->file) }}" alt="profile" class="img-fluid" style="border-radius:50px;">
                                        </div>
                                        <div class="col-10">
                                            <b>{{ $balas->name }}</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-10">
                                            {{ $balas->pesan }}
                                        </div>
                                        <div class="col-10 text-right">
                                        </div>
                                        @auth
                                            @if ($balas->id_user == Auth::user()->id)
                                                <div class="col-2 text-right">
                                                    <form action="{{ route('blog.delreply', $balas->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                        style="background: transparent; border: 0; color: blue;" onclick="return confirm('Anda Yakin Ingin Menghapus Komentar?');">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                @auth
                    <div class="col-10 mt-2 text-right">
                        <a href="#" onclick="reply({{ $komen->id }}, {{ $komen->id_blog }}); return false">Reply</a>
                    </div>
                    @if ($komen->id_user == Auth::user()->id)
                        <div class="col-2 mt-2 text-right">
                            <form action="{{ route('blog.delcomment', $komen->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                style="background: transparent; border: 0; color: blue;" onclick="return confirm('Anda Yakin Ingin Menghapus Komentar?');">Delete</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div> --}}
    {{-- <div class="row mb-3">
        <div class="col-xl-8 col-lg-12" data-aos="fade-up" data-aos-delay="400">
            Jadilah Orang Pertama Untuk Berkomentar
        </div>
    </div> --}}
    {{-- <div class="row mt-2 ml-5 pl-5 justify-content-center" data-aos="fade-up" data-aos-delay="300">
        <div class="col-sm-8">
            {{ $comment->links("pagination::bootstrap-4") }}
        </div>
    </div> --}}
</div>
<div class="row mb-5">
    <div class="col-xl-8 col-lg-12 mt-3" data-aos="fade-up" data-aos-delay="300">
        @guest
            <textarea name="pesan" id="pesan" rows="5" class="form-control" placeholder="Berikan respon anda"></textarea>
            <input type="submit" value="Respon" class="form-control mt-3 btn btn-info" onclick="alert('Login Dulu Ya!'); location.href='/login';">
        @endguest
        @auth
            <form action="{{ route('blog.comment') }}" method="post" class="formkomen">
                @csrf
                @method('POST')
                <textarea name="pesan" id="pesan" rows="5" class="form-control" placeholder="Berikan respon anda"></textarea>
                <input type="hidden" name="id_blog" value="{{ $blog->id }}">
                <input type="hidden" name="blog_slug" value="{{ $blog->slug }}">
                <input type="submit" value="Respon" class="form-control mt-3 btn btn-info">
            </form>
        @endauth
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balastitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="balasbody">

            </div>
        </div>
    </div>
</div>
<script>
    function reply(int1, str1){
        //cara1 = alertPr bisa
        // var rep_comment =  prompt("Input Balasan Anda  : ");
        // var link = "{{ route('blog.reply', 'params') }}";
        //     link = link.replace('params', int1);
        // if(rep_comment){
        //     $.ajax({
        //         url: link,
        //         type: 'POST',
        //         data: {
        //             "_token" : "{{ csrf_token() }}",
        //             "_method" : "POST",
        //             "id_blog": {{ $blog->id }},
        //             "pesan" : rep_comment,
        //             "blog_slug": "{{ $blog->slug }}"
        //         },
        //         success: function(){
        //             $('#refresh-comment').load(" #refresh-comment > *");
        //         }
        //     });
        // }
        //cara 1.5 modal innerhtml ajax bisa
        $('#myModal').modal('show');
        var link = "{{ route('blog.reply', 'params') }}";
            link = link.replace('params', int1);

        document.getElementById('balastitle').innerHTML = `Balas Kepada User : ` + str1;
        document.getElementById('balasbody').innerHTML =
        `
            <form action="`+link+`" method="post" class="classreplycomment">
                @csrf
                @method('POST')
                <textarea name="pesan" id="replypesan" cols="30" rows="10" class="form-control"
                    placeholder="Masukan Balasan Anda Disini">@`+str1+`  </textarea>
                <input type="hidden" name="blog_slug" value="{{ $blog->slug }}">
                <input type="hidden" name="id_blog" value="{{ $blog->id }}">
                <input type="submit" value="Kirim" class="form-control btn btn-info mt-3">
            </form>
        `;
        $('.classreplycomment').on('submit', function(e){
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(){
                    $('#refresh-comment').load(" #refresh-comment > *");
                    $('#replypesan').val('');
                    $('#myModal').modal('hide');
                }
            });
            e.preventDefault();
        });
    }
   // $(document).ready(function(){
    //     $('.classreplycomment').hide();
    //     $('.showreply').click(function(){
    //         var $toggle = $(this);
    //         var id = "#replycomment-" + $toggle.data('id');
    //         $( id ).toggle();
    //         $( id ).on('submit', function(e){
    //             e.preventDefault();
    //             $.ajax({
    //                 url: $(this).attr('action'),
    //                 type: 'POST',
    //                 data: $(this).serialize(),
    //                 success: function(){
    //                     $('#refresh-comment').load(" #refresh-comment > *");
    //                     $('.classreplycomment').hide();
    //                 }
    //             });
    //         })
    //     });
    // });
</script>
