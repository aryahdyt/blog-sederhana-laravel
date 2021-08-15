<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') &mdash; Blog</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('template.partial.header')

            @include('template.partial.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section ">
                    <div class="section-header">
                        <h1 class="text-capitalize mx-2">@yield('title')</h1>
                        <div>@yield('btn-tambah')</div>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="{{ url('/') }}">Dashboard</a></div>
                            @yield('page')
                        </div>
                    </div>
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>




            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval
                        Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('script')

</body>

</html>