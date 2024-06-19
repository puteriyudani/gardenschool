<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('judul')

    <!-- Favicons -->
    <link href="{{ asset('assets') }}/img/favicon.ico" rel="icon">
    <link href="{{ asset('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('auth/css/styles.min.css') }}" />
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/jquery-3.3.1.slim.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    @yield('content')

    <script src="{{ asset('auth/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('auth/js/app.min.js') }}"></script>
    <script src="{{ asset('auth/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('auth/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('auth/js/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</body>

</html>
