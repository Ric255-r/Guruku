<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('before-style')
        @include('includes.styleplaying')
    @stack('after-style')
    <title>Belajar</title>
  </head>
  <body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
            @include('includes.sidebarplaying')
        <!-- /#sidebar-wrapper -->



        <!-- Page Content -->
        <div id="page-content-wrapper">

            {{--navbar--}}
                @include('includes.navbarplaying')
            {{--endnav --}}


            {{--content --}}
                <div class="container-fluid">
                    @yield('content')
                    {{--@foreach ($anakvideo as $query =>$videos)
                        @if ($videos->is_default == 1)
                            <div class="card-body">
                                <p>{{ $loop->iteration }}. {{ $videos->nama }}</p>
                                <video controls width="100%" height="400">
                                    <source src="{{ asset('/storage/'.$videos->file) }}"  type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @else

                        @endif
                    @endforeach--}}
                </div>
                {{--end content --}}
        </div>
        <!-- /#page-content-wrapper -->

    </div>
      <!-- /#wrapper -->



      {{--ini dari bootstrap --}}


      {{--<div class="row">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
          </div>
        </div>
      </div>--}}


      {{--end bootstrap --}}










    @stack('before-script')
        @include('includes.scriptplaying')
    @stack('after-script')
  </body>
</html>
