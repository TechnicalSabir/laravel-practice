<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @yield('header-css')
    <title>Document</title>
</head>
<body>
    @include('layouts.navbar')
    <main class="my-3">
        @section('content')
        @show
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @php
    if(session('status')){
        $status = session('status');
        $alert_type = $status['alert_type'];
        $message = $status['message'];
        echo "<script> toastr[`$alert_type`](`$message`); </script>";
    }   
    @endphp 
    @yield('footer-script')
</body>
</html>