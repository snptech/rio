<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>


    <link rel="stylesheet" href="{{ asset('assets/mdbootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mdbootstrap4/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mdbootstrap4/mdb-plugins-gathered.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />
    <style>

label.error {
    color: red;
    font-size: 1rem;
    display: block;
    margin-top: 5px;
}

input.error, textarea.error {
    border: 1px dashed red;
    font-weight: 300;
    color: red;
}
        </style>
</head>
<body>
    <div class="container-scroller">
        @include("header.top")
        <div class="container-fluid page-body-wrapper">
            @include("header.navigation")

            <!-- Main Container -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                    <div class="copyright">
                        Copyright 2021. all rights are reserved.<b>Version 1.0</b>
                    </div>
                </div>
            </div>
    </div>
</div>
@stack('models')
<!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/mdbootstrap4/jquery.min.js')  }}"></script>
  <script src="{{ asset('assets/mdbootstrap4/popper.min.js')  }}"></script>
  <script src="{{ asset('assets/mdbootstrap4/bootstrap.min.js')  }}"></script>
  <script src="{{ asset('assets/js/feather.min.js')  }}"></script>
  <script>
    feather.replace()
</script>
  @stack('scripts')

</body>
</html>
