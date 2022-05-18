<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

    <title>Details Mentor</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-responsive-sm table-borderless">
                    <thead>
                        <tr>
                            {{--<th>Foto</th>--}}
                            @if ($mentor->file == null)
                                <tr>
                                    <th><img src="{{ URL::asset('/Foto/man.png') }}" style="width:100px; height:100px; border-radius:100px; background-color:#7e7e7e;" alt=""></th>
                                </tr>
                            @else
                                <tr>
                                    <th>
                                        <img src="{{ asset('/storage/'.$mentor->file) }}" style="width:100px; height:100px; border-radius:100px;" alt="Gambar">
                                    </th>
                                </tr>
                            @endif
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $mentor->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $mentor->email }}</td>
                        </tr>
                        <tr>
                            <th>Bidang</th>
                            @if ($mentor->bidang == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->bidang }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            @if ($mentor->deskripsi == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->deskripsi }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Bank</th>
                            @if ($mentor->bank == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->ben->namabank }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>No. Rekening</th>
                            @if ($mentor->no_rek == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->no_rek }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Instagram Profile</th>
                            @if ($mentor->instagram_profile == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->instagram_profile }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Twitter Profile</th>
                            @if ($mentor->twitter_profile == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->twitter_profile }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Github Profile</th>
                            @if ($mentor->github_profile == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->github_profile }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Dribbble Profile</th>
                            @if ($mentor->dribbble_profile == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->dribbble_profile }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Link Website</th>
                            @if ($mentor->link_website == null)
                                <td>-</td>
                            @else
                                <td>{{ $mentor->link_website }}</td>
                            @endif
                        </tr>
                        <tr>
                            @if ($mentor->roles == 'MENTOR')
                                <th>Status</th>
                                <td>
                                    @if ($mentor->status === "PENDING")
                                        <span class="badge badge-info">
                                    @elseif($mentor->status == "SUCCESS")
                                        <span class="badge badge-success">
                                    @elseif($mentor->status === "FAILED")
                                        <span class="badge badge-danger">
                                    @else
                                        <span></span>
                                    @endif
                                        {{ $mentor->status }}
                                        </span>
                                </td>
                            @else

                            @endif
                        </tr>
                        <tr>
                            <td>
                                @if ($mentor->roles == 'MENTOR')
                                    @if ($mentor->status == "PENDING")
                                        <a href="{{ route('mentor.status', $mentor->id) }}?status=SUCCESS"
                                            class="btn btn-success btn-sm">
                                            Set Success
                                            {{--<i class="fa fa-check"></i>--}}
                                        </a>
                                        <a href="{{ route('mentor.status', $mentor->id) }}?status=FAILED"
                                            class="btn btn-warning btn-sm">
                                            Set Gagal
                                            {{--<i class="fa fa-times"></i>--}}
                                        </a>
                                    @elseif($mentor->status == 'SUCCESS')
                                        <a href="{{ route('mentor.status', $mentor->id) }}?status=PENDING"
                                            class="btn btn-info btn-sm">
                                            Set Pending
                                            {{--<i class="fa fa-spinner"></i>--}}
                                        </a>
                                        <a href="{{ route('mentor.status', $mentor->id) }}?status=FAILED"
                                            class="btn btn-warning btn-sm">
                                            Set Gagal
                                            {{--<i class="fa fa-times"></i>--}}
                                        </a>
                                    @else
                                        <a href="{{ route('mentor.status', $mentor->id) }}?status=SUCCESS"
                                            class="btn btn-success btn-sm">
                                            Set Success
                                            {{--<i class="fa fa-check"></i>--}}
                                        </a>
                                        <a href="{{ route('mentor.status', $mentor->id) }}?status=PENDING"
                                            class="btn btn-info btn-sm">
                                            Set Pending
                                            {{--<i class="fa fa-spinner"></i>--}}
                                        </a>
                                    @endif

                                    @else

                                @endif
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
