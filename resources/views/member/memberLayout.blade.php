<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1.2/empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Mar 2019 04:27:05 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">
    <title>NyumbaKumi | Member</title>
    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <style>
        option{
            color: #000000;
        }
    </style>
</head>

<body data-sa-theme="1">
<div id="app">
    <main class="main">

        <div class="page-loader">
            <div class="page-loader__spinner">
                <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>

        <header class="header">
            <div class="logo hidden-sm-down">
                <h1><a href=""> Member </a></h1>
            </div>

            <ul class="top-nav">
            </ul>

            <div class="clock hidden-md-down">
                <div class="time">
                    <span class="time__hours"></span>
                    <span class="time__min"></span>
                    <span class="time__sec"></span>
                </div>
            </div>
        </header>


        <section class="content">
            <div class="content__inner">
                {{--=========================================================================================================--}}
                <router-view></router-view>

                <vue-progress-bar></vue-progress-bar>
                {{--=========================================================================================================--}}
            </div>
        </section>
    </main>
</div>


<!-- Older IE warning message -->
<!--[if IE]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

    <div class="ie-warning__downloads">
        <a href="http://www.google.com/chrome">
            <img src="{{ asset('img/browsers/chrome.png') }}" alt="">
        </a>

        <a href="https://www.mozilla.org/en-US/firefox/new">
            <img src="{{ asset('img/browsers/firefox.png') }}" alt="">
        </a>

        <a href="http://www.opera.com">
            <img src="{{ asset('img/browsers/opera.png') }}" alt="">
        </a>

        <a href="https://support.apple.com/downloads/safari">
            <img src="{{ asset('img/browsers/safari.png') }}" alt="">
        </a>

        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
            <img src="{{ asset('img/browsers/edge.png') }}" alt="">
        </a>

        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
            <img src="{{ asset('img/browsers/ie.png') }}" alt="">
        </a>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript -->
<!-- Vendors -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>

</body>
</html>
