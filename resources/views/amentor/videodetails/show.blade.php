{{--@extends('layouts.default')

@section('content')--}}

    {{--<div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Tampilan Print</h4>

                    </div>
                    <div class="card-body--">

                    </div>
                </div>
            </div>
        </div>
    </div>--}}

{{--@endsection--}}

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Details</title>
  </head>
  <body>
    {{--<iframe src="{{ asset('/storage/'.$video->modul) }}" style="border:none; width:100%; height:700px;"></iframe>--}}

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table mt-5">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Video_Id</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Nama Video</th>
                                {{--<th scope="col">Video</th>--}}
                                <th scope="col">Number</th>
                                <th scope="col">Kuis</th>
                                <th scope="col">Link Kuisr</th>
                                {{--<th scope="col">Blog</th>
                                <th scope="col">Link Blog</th>--}}
                                {{--<th scope="col">Status</th>--}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $video->video->judul }}</td>
                                <td>{{ $video->products_id }}</td>
                                <td>{{ $video->nama }}</td>
                                <td>{{ $video->number }}</td>
                                <td>
                                    @if ($video->kuis == 0)
                                        Tidak
                                    @else
                                        Ya
                                    @endif
                                </td>
                                <td>
                                    @if ($video->link_kuis == !null)
                                        <a href="{{ $video->link_kuis }}">Menuju Kuis</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                {{--<td>
                                    @if ($video->blog == 0)
                                        Tidak
                                    @else
                                        Ya
                                    @endif
                                </td>
                                <td>
                                    @if ($video->link_blog == !null)
                                        <a href="{{ $video->link_blog }}">Menuju Blog</a>
                                    @else
                                        -
                                    @endif
                                </td>--}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <iframe width="100%" height="450" src="https://www.youtube.com/embed/{{ $video->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-warning btn-block" onclick="event.preventDefault(); location.href='{{ route('amentor.videodetails.edit',$video->id) }}';">Edit</button>
                    <form action="{{ route('amentor.videodetails.destroy',$video->id) }}" method="post" class="mt-2">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
