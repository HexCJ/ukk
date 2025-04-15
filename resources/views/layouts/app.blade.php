<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bs5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/bs5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('assets/bs5/icons/bootstrap-icons.css') }}"> --}}
    <title>To Do List</title>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="mt-2 w-100">
                <div class="p-3 rounded border border-primary">
                    <div class="d-flex align-items-center">
                        <div class="fw-bold text-primary">
                            <p>
                                Halo👋, Selamat Datang di Aplikasi To Do List
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                @yield('content')
            </div>
        </div>
    </div>  
</body>
</html>