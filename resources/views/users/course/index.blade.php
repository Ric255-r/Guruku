@extends('users.defaults.app')

@section('content')
    @foreach ($anakvideo as $query)
        @if ($query->number == 0)
        <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">{{ $videodetails->nama }}</p>
        <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            {{--<video controls width="100%" height="550">
                <source src="{{ asset('/storage/'.$query->file) }}"  type="video/mp4">
                Your browser does not support the video tag.
            </video>--}}
        @else

        @endif
    @endforeach
@endsection
