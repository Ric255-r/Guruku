<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Styles  --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    {{-- Sidebar  --}}
    @include('includes.amentor.sidebar')

    <div id="right-panel" class="right-panel">
        {{-- header/navbar  --}}
        @include('includes.navbar')
        <div class="content">
            {{-- Content  --}}
            @yield('content')
        </div>
        <div class="clearfix"></div>
    </div>

    {{-- Script  --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')

</body>
</html>
