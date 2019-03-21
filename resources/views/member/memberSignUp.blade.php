<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1.2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Mar 2019 04:27:05 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <title>Member Sign Up</title>
</head>

<body data-sa-theme="1">
<div class="login">

    <!-- Login -->
    <div class="login__block active" id="l-login">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            Member Sign Up

        </div>
        <form action="{{ route('postSignUp') }}" method="post">
            <div class="login__block__body">

                <div class="form-group">
                    <input type="text" name="name" required class="form-control text-center" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" required class="form-control text-center" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <input name="password" required minlength="6" type="password" class="form-control text-center" placeholder="Password">
                </div>
                <input name="usertype" type="hidden" value="user">
                {{ csrf_field() }}
                <button type="submit" class="btn login__block__btn">Sign Up</button>
                <a href="{{ route('memberSignIn') }}" class="btn login__block__btn">Have an Account</a>
            </div>
        </form>
    </div>

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
<script src="{{ asset("vendors/bower_components/jquery/dist/jquery.min.js") }}"></script>
<script src="{{ asset("vendors/bower_components/popper.js/dist/umd/popper.min.js") }}"></script>
<script src="{{ asset("vendors/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@if(\Illuminate\Support\Facades\Session::has('message'))
    <script>
        swal(
            "{{ \Illuminate\Support\Facades\Session::get("title") }}",
            "{{ \Illuminate\Support\Facades\Session::get("message") }}",
            "{{ \Illuminate\Support\Facades\Session::get("status") }}"
        );
    </script>
@endif
<!-- App functions and actions -->
<script src="{{ asset("js/app.min.js") }}"></script>
</body>

<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1.2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Mar 2019 04:27:05 GMT -->
</html>
