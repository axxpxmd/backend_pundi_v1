<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title --> 
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- CSS -->
    @yield('style')
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">

</head>
<body class="light">
@include('layouts.preloader')
<div id="app">
    <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
        <section class="sidebar">
            <div class=" mt-3 mb-3 ml-3">
                <img src="{{ asset('images/logo.png')}}" class="mt-2 mb-2 ml-2" width="200" alt="Logo Top">
            </div>
            <div class="relative">
                <div class="user-panel p-3 light mb-2">
                    <div>
                        <div class="float-left image">
                            <img class="user_avatar" src="{{ asset('assets/img/dummy/u4.png')}}" alt="User Image">
                        </div>
                        <div class="float-left info">
                            <h6 class="font-weight-light mt-2 mb-1">{{ Auth::user()->username }}</h6>
                            <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            @include('layouts.navigation')
        </section>
    </aside>
    @include('layouts.topbar')
    <main>
    @yield('content')
    </main>
</div>
</body>
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/').'/') !!}
    </script>
    <script src="{{ asset('js/myScript.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/myScript.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-fancybox.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
    @yield('script')
</html>
