{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Register</title>
    <style>
        .ic-password{
            margin-left:-30px;
            z-index: 1;
            margin-top: 17px;
            color: #7e7e7e;
            cursor: pointer;
        }
        .ic-password:hover{
            color:#696969;
        }
        .blkg{
            background:linear-gradient(180deg,rgba(10, 61, 63, 0.80),rgba(8, 51, 53, 0.80)),url('gmbr/blkg.png') no-repeat;
            background-size: cover;
            /*max-height:100%;*/
            min-height: 100vh;
        }
        .guru{
            background:rgba(54, 197, 186, 0.20);
            font-weight: bold;
            border-radius: 10px;
            border: 2px;
            border-style: dashed;
            border-color: #36C5BA;
            width: 180px;
        }
        .sign-up{
            margin-bottom:50px;
            margin-top:-30px;
        }
        .btn-login{
            margin-top:-20px;
        }

        /* If the screen size is 320px or less*/
        @media only screen and (max-width: 320px){
            .welcome-back{
                font-size:30px;
                font-weight: bold;
            }
            .fill-your{
                font-size:16px;
            }
        }

        /* Extra small devices (phones, 600px and down) */
        /*batas besarnya 600 ato kurang & kalo screen 320 ato lebih (600-320)*/
        @media only screen and (max-width: 600px) and (min-width: 320px){
            .blkg{
                min-height:40vh;
            }
            .guru{
                margin-bottom:50px;
            }
            .remember-me{
                margin-top:10px;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        /*screen nya 600 ato lebih */
        @media only screen and (min-width: 600px) {
            .txt-belajar{
                font-size:30px;
                margin-top:-50px;
            }
            .guru{
                width: 160px;
                font-size:30px;
                margin-bottom: 30px;
            }
            .blkg{
                /*background:linear-gradient(180deg,rgba(10, 61, 63, 0.80),rgba(8, 51, 53, 0.80)),url('gmbr/blkg.png') no-repeat;*/
                background-size: cover;
                min-height: 50vh;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        /*screen nya 768 ato lebih*/
        @media only screen and (min-width: 768px) {
            .txt-belajar{
                font-size:30px;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        /*klo screen 992 ato lebih*/
        @media only screen and (min-width: 992px) {
            .guru{
                margin-top:100px;
            }
        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        /*klo screen 1200 ato lebih*/
        @media only screen and (min-width: 1200px) {
            .txt-belajar{
                font-size:48px;
            }
            .guru{
                width: 160px;
                font-size:30px;
                margin-top:30px !important;
                text-align: center;
                /*padding-top:10px;*/
                /*margin-top:10px;*/
            }
        }
    </style>
  </head>
  <body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12
                blkg image-container px-5 text-center text-xl-center">
                <img src="{{ URL::asset('/Foto/owlputih.png') }}" class="my-5" style="width: 150px;height: 50px">
                <h1 class="pt-5 text-white txt-belajar">
                    Belajar apapun<br>dimanapun<br>bersama
                </h1>
                <p class="text-white guru mx-auto px-2 py-2">Guruku.</p>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 px-5 pt-5">
                <h1 class="welcome-back text-xl-left text-lg-left text-md-left text-sm-center text-center">Make your Account</h1>
                <p class="fill-your text-xl-left text-lg-left text-md-left text-sm-center text-center">Fill your identity or continue with<br>social media</p>

                <button class="btn text-white p-3 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 d-inline mx-auto" style="background-color: #4285F4; border-radius: 13px;border:none;"><i class="fa fa-google" style="color: white"></i> Sign in with Google</button>

                <button class="btn p-3 col-xl-1 col-lg-1 col-md-12 col-sm-12 col-12 my-3" style="background-color: #f2f2f2;min-width: 60px; border-radius: 13px;"><i class="fa fa-facebook" style="color: #7e7e7e"></i></button>

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto">
                        <hr class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"> <span class="mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto">Or</span><hr class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    </div>
                    <div class="form-row">
                        <div class="col-lg-8 my-3">
                            <h5 class="">Username</h5>
                            <div class="input-group">
                                <input id="name" placeholder="Your name..." type="text" class="form-control p-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    style="border-radius: 13px; outline-color: #929292;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <i class="fa fa-user" style="margin-left: -30px;z-index: 1; margin-top: 17px;color: #7e7e7e"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-8 my-3">
                            <h5 class="">Email</h5>
                            <div class="input-group">
                                <input id="email" placeholder="Your email..." type="email" class="form-control p-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                    style="border-radius: 13px; outline-color: #929292;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <i class="fa fa-envelope" style="margin-left: -30px;z-index: 1; margin-top: 17px;color: #7e7e7e"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-8 my-3">
                            <h5 class="">No.Telp</h5>
                            <div class="input-group">
                                <input id="telp" placeholder="xxxx-xxxx-xxxx" type="tel" class="form-control p-4 @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" autocomplete="telp"
                                    style="border-radius: 13px; outline-color: #929292;" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}">
                                @error('telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <i class="fa fa-phone" style="margin-left: -30px;z-index: 1; margin-top: 17px;color: #7e7e7e"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-8 my-3">
                            <h5 class="">Password</h5>
                            <div class="input-group">
                                <input id="password" placeholder="Your password..." type="password" class="form-control p-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                style="border-radius: 13px; outline-color: #929292;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="input-group-append">
                                    <i class="fa fa-eye ic-password" onclick="showPass()"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-8 my-3">
                            <h5 class="">Confirm Password</h5>
                            <div class="input-group">
                                <input id="password-confirm" placeholder="Confirm password..." type="password" class="form-control p-4" name="password_confirmation" required autocomplete="new-password"
                                style="border-radius: 13px; outline-color: #929292;">

                                <div class="input-group-append">
                                    <i class="fa fa-eye ic-password" onclick="showPass2()"></i>
                                    {{--  style="margin-left: -30px;z-index: 1; margin-top: 17px;color: #7e7e7e" --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-8 my-3">
                            <h5 class="">Roles</h5>
                            <div class="input-group">
                                <select name="roles" id="roles" class="form-control" required autocomplete="roles">
                                    <option value="">-- Pilih Roles --</option>
                                    <option value="USERS">Users</option>
                                    <option value="MENTOR">Mentor</option>
                                </select>
                                {{--<input id="roles" type="text" class="form-control p-4 @error('roles') is-invalid @enderror" name="roles" value="{{ old('roles') }}" required autocomplete="roles"
                                    style="border-radius: 13px; outline-color: #929292;">--}}
                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{--<div class="input-group-append">
                                    <i class="fa fa-user" style="margin-left: -30px;z-index: 1; margin-top: 17px;color: #7e7e7e"></i>
                                </div>--}}
                            </div>

                        </div>
                    </div>

                    <div class="form-row" id="jadimentor">
                        <div class="col-lg-8 my-3">
                            <h5 class="">CV</h5>
                            <div class="input-group">
                               <input type="file" id="cv" name="cv" class="form-control @error('cv') is-invalid @enderror" autocomplete="cv">
                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 my-3">
                            <h5 class="">KTP</h5>
                            <div class="input-group">
                               <input type="file" id="ktp" name="ktp" class="form-control @error('ktp') is-invalid @enderror" autocomplete="ktp">
                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 my-3">
                            <h5 class="">Alamat</h5>
                            <div class="input-group">
                               <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat"></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 my-3">
                            <h5 class="">Bidang</h5>
                            <div class="input-group">
                               <input type="text" id="bidang" name="bidang" class="form-control @error('bidang') is-invalid @enderror" autocomplete="bidang">
                                @error('bidang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 my-3">
                            <h5 class="">Alasan</h5>
                            <div class="input-group">
                               <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="alasan"></textarea>
                                @error('alasan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row" hidden>
                        <div class="col-lg-8 my-3">
                            <h5 class="">Status</h5>
                            <div class="input-group">
                               <input type="text" id="status" name="status" class="form-control @error('roles') is-invalid @enderror" required autocomplete="status">
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form-row my-5">
                        <button type="submit" class="btn btn-primary btn-login d-inline mx-auto d-sm-inline mx-sm-auto mx-md-0 mx-lg-0 mx-xl-0 p-3 text-white"
                            style="background-color: #36C5BA; border:none; border-radius: 13px; width: 250px">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div class="form-row sign-up">
                        <p class="mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto">Already have an account? <a href="{{ route('login') }}" style="color:#36C5BA; font-weight: bold ">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

        <script>
            function showPass(){
                var x = document.getElementById('password');
                if(x.type === 'password'){
                    x.type = 'text';
                }else{
                    x.type = 'password';
                }
            }

            function showPass2(){
                var x = document.getElementById('password-confirm');
                if(x.type === 'password'){
                    x.type = 'text';
                }else{
                    x.type = 'password';
                }
            }
        </script>

        <script>
            $(document).ready(function(){
                $("select#roles").change(function(){
                    var selectedRoles = $(this).children("option:selected").val();

                    if(selectedRoles == 'USERS')
                    {
                        $('#status').val('SUCCESS');
                        $('#jadimentor').hide();
                    }
                    if(selectedRoles == 'MENTOR')
                    {
                        $('#status').val('PENDING');
                        $('#jadimentor').show();
                    }
                });


            });
        </script>
  </body>
</html>
