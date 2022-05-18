{{--@extends('users.defaults.app')


@section('content')--}}
    {{--{{ $videodetails->nama }}
    <br>
    @foreach ($kelas as $query)
        {{ $query->kelas }}
    @endforeach
    <br>--}}
    {{--@foreach ($anakvideo as $query => $videos)
        @foreach ($video as $query)
            @if ($query->details->id == $videos->video->video_id)
                {{ $query->judul }}
            @endif
        @endforeach
    @endforeach--}}

    {{--@foreach ($video as $query)
        @if ($query->bayar->products_slug == $video)
            <p>{{ $query->judul }}</p>
        @endif
    @endforeach--}}

    {{--@foreach ($anakvideo as $query => $videos)
        @foreach ($video as $query)
            @if ($query->details->id == $videos->video->video_id)
                <a href="{{ $videodetails->url }}/users/course_playing/{{ $query->id }}/{{ $query->products_slug }}">
                    {{ Str::limit($query->nama,'21') }}
                </a>
            @endif
        @endforeach
    @endforeach--}}

    {{--@foreach ($video as $query => $videos)
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h5 class="text-header">{{ $videos->details->judul }}</h5>
                    <h5 class="mb-0">
                        @foreach ($anakvideo as $query)
                            @if ($query->video->video_id == $videos->details->id)
                                <a href="{{ $videodetails->url }}/users/course_playing/{{ $query->id }}/{{ $query->products_slug }}">
                                    {{ Str::limit($query->nama,'21') }}
                                </a>
                            @endif
                        @endforeach
                    </h5>
                    </div>
                </div>
            @endforeach--}}


    {{--logika saya yang kepake--}}
    {{--@foreach ($anakvideo as $query => $videos)
        @foreach ($video as $query)
            @if ($query->id == $videos->video_id)
                <table border="1">
                    <tr>
                        <td>{{ $query->judul }}</td>
                        <td>{{ $videos->nama }}</td>
                    </tr>
                    <tr>

                    </tr>
                </table>
            @endif
        @endforeach
    @endforeach--}}

    {{--<script>
        var vid = document.getElementById("myVideo");

        function getPlaySpeed() {
          alert(vid.playbackRate);
        }

        function setPlaySpeed() {
          vid.playbackRate = 0.5;
        }
    </script>--}}

    {{--@foreach ($kelas as $query)
        <p>{{ $query->kelas }}</p>
    @endforeach--}}
    {{ $videodetails->nama }}
    <p>Hai</p>
    <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">{{ $videodetails->nama }}</p>
    <p>Materi bagian : {{ $videodetails->video->judul }}</p>

    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $videodetails->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    {{--<video id="myVideo" width="100%" height="500" controls>
        <source src="{{ asset('/storage/'.$videodetails->file) }}"  type="video/mp4">
        Your browser does not support the video tag.
    </video>--}}


    {{--<video width="400" controls>
        <source src="{{ URL::asset('img/beruang.mp4') }}" type="video/mp4">
        Your browser does not support HTML video.
    </video>--}}

{{--@endsection--}}
