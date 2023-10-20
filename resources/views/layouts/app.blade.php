<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel News | Dashboard</title>

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css') }}/adminlte.min.css">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('components.sidebar')

        @include('components.navbar')

        <div class="content-wrapper">

            @yield('header')

            @yield('content')

        </div>


        @include('components.footer')

    </div>


    <script src="{{ asset('plugins') }}/jquery/jquery.min.js"></script>
    <script src="{{ asset('plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js') }}/adminlte.js"></script>
    <script src="{{ asset('js') }}/pages/dashboard3.js"></script>
    <script>
        let timer;

        function startTimer() {
            timer = setTimeout(logout, 15 * 60 * 1000); // 15 menit
        }

        function resetTimer() {
            clearTimeout(timer);
            startTimer();
        }

        function logout() {
            document.getElementById('logout-form').submit();
        }

        document.addEventListener('DOMContentLoaded', function() {
            startTimer();
        });

        // Reset timer setiap kali ada aktivitas
        document.addEventListener('mousemove', function() {
            resetTimer();
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
</body>

</html>
