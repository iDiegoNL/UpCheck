<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpCheck</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/iofrm-theme6.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css') }}">
</head>
<body>
<div class="form-body">
    <div class="row">
        @yield('content')
    </div>
</div>
<script type="text/javascript" async defer src="{{ asset('auth/js/jquery.min.js') }}"></script>
<script type="text/javascript" async defer src="{{ asset('auth/js/popper.min.js') }}"></script>
<script type="text/javascript" async defer src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" async defer src="{{ asset('auth/js/main.js') }}"></script>
</body>
</html>
