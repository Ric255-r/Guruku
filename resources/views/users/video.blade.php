@extends('layouts.defaultplaying')

@section('content')
    {{--<p>haloo</p>--}}
    <p>{{ $videodetails->nama }}</p>
        <video controls width="100%" height="400">
            <source src="{{ asset('/storage/'.$videodetails->file) }}"  type="video/mp4">
            Your browser does not support the video tag.
        </video>
    {{--@foreach ($videodetails as $query)
        <p>{{ $query->kelas }}</p>
    @endforeach--}}
    {{--@foreach ($anakvideo as $query)
        <p>{{ $query->nama }}</p>
        <video controls width="100%" height="400">
            <source src="{{ asset('/storage/'.$query->file) }}"  type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endforeach--}}
@endsection
