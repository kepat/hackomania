<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Hackomania Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Animation Library for Notifications -->
    <link href="/css/animate.min.css" rel="stylesheet" type="text/css">

    <!-- Light Bootstrap Table Core CSS -->
    <link href="/css/light-bootstrap-dashboard.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="/css/custom.css" rel="stylesheet" type="text/css">

    <!-- Fonts and Icons -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <link href="/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="wrapper">
    @yield('content')
</div>

<!-- Loading -->
@include('elements.loading')

<!-- Modal -->
@include('elements.modal')

<!-- Core JS Files -->
<script src="/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Checkbox, Radio & Switch Plugins -->
<script src="/js/bootstrap-checkbox-radio-switch.js"></script>

<!-- Charts Plugin -->
<script src="/js/chartist.min.js"></script>

<!-- Notifications Plugin -->
<script src="/js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core -->
<script src="/js/light-bootstrap-dashboard.js"></script>

<!-- Custom CSS -->
<script src="/js/custom.js"></script>

@include('scripts.message')

@yield('script')

</body>

</html>