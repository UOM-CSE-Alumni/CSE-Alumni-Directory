<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    {{--<link rel="stylesheet" href="bootstrap/3.3.7/bootstrap.min.css">--}}
    {{--<link href="font-awesome/3.2.1/bootstrap-combined.no-icons.min.css" rel="stylesheet">--}}
    <link href="font-awesome/4.7.0/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    @yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>
    @yield('content')


    <!-- jQuery -->
    <script src="jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="bootstrap/3.3.7/bootstrap.min.js"></script>

    <!-- Custom JS -->
    @yield('scripts')
</body>
</html>