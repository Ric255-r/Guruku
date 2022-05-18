<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-outline-secondary" id="menu-toggle">
        <span class="navbar-toggler-icon"></span>
    </button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        @auth
            <div class="user-area dropdown" style="margin-right:100px;">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="{{ url('img/peo.png') }}" alt="User Avatar" style="width:40px;">
                </a>
                <div class="user-menu dropdown-menu">
                    @if (Auth::user()->roles == 'ADMIN')
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Halaman Admin</a>
                        <form action="{{url('logout')}}" method="post" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('orang.index') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
                        <form action="{{url('logout')}}" method="post" class="form-inline mt-2">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm btn-block">
                                Logout
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endauth
        </ul>
    </div>
    </nav>
