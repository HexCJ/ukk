<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bs5/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/bs5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('assets/bs5/icons/bootstrap-icons.css') }}"> --}}
    <title>To Do List</title>
</head>
<body>
    <!-- SweetAlert2 Notification -->
    @include('sweetalert::alert')
</body>
</html>