<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('head_meta')
        <meta name="description" content="">
        <meta name="keywords" content="" />
        <meta name="author" content="" />
    @show
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
{{--    <link rel="icon" href="{{ cdn('favicon.ico') }}" type="image/x-icon"/>--}}
{{--    <link rel="shortcut icon" type="image/x-icon" href="{{ cdn('favicon.ico')  }}" />--}}
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>@section('head_title'){!! !empty($page['title']) ? $page['title'] : 'LMS' !!} | {{ config('app.name') }}@show</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <!-- Dashboard Core -->
    <link href="{{ asset('Themes/tabler/css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('Themes/tabler/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('Themes/tabler/css/dashboard.css') }}" rel="stylesheet" />
    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('Themes/tabler/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
    <link href="{{ asset('Themes/tabler/plugins/iconfonts/plugin.css') }}" rel="stylesheet" />
    <link href="{{ asset('Themes/tabler/plugins/prismjs/plugin.css') }}" rel="stylesheet" />
    <link href="{{ asset('Themes/tabler/css/bootstrap-table.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Themes/icons/fonts/remixicon.css') }}" rel="stylesheet" />
    @yield('head_css')
    @yield('head_js')
</head>
<body  @section('body_class') class="" @show>
<div class="page" id="tabler-page">
    @section('body')
        @include('layouts.themes.tabler.blocks.navbar')
        <div class="page-main">
            @section('body_header')


            @section('body_content')
                    <div class="container ">

                        @yield('body_content_main')
                    </div>
            @show
        </div>
        @section('footer')
        @section('footer_top')
            &nbsp;
        @show
        @include('layouts.themes.tabler.blocks.footer')
        @show
        @show
</div>


<!-- Dashboard Core -->
{{--<script src="{{ asset('Themes/tabler/js/vendors/jquery-3.2.1.min.js') }}"></script>--}}



<!--custom-script.js - Add your own theme custom JS-->
@yield('body_js')
<script src="{{ asset('Themes/tabler/js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Themes/tabler/plugins/prismjs/js/prism.pack.js') }}"></script>
<script src="{{ asset('Themes/tabler/js/dashboard.js') }}"></script>
<script src="{{ asset('Themes/tabler/js/tabler.min.js') }}"></script>
<!-- c3.js Charts Plugin -->
<script src="{{ asset('Themes/tabler/plugins/charts-c3/js/d3.v3.min.js') }}"></script>
<script src="{{ asset('Themes/tabler/plugins/charts-c3/js/c3.min.js') }}"></script>
<!-- Input Mask Plugin -->
<script src="{{ asset('Themes/tabler/plugins/input-mask/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('Themes/tabler/js/core.js') }}"></script>
</body>
</html>
