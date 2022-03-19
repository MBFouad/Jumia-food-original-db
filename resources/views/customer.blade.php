<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/datatable.min.css')}}">
    <style>
        .filter {
            margin-bottom: 50px;
            margin-top: 20px;
        }
    </style>
    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/js/datatable.min.js')}}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- App scripts -->
</head>
<body class="antialiased">
<div class="container">
    <div class="row">
        <h1>Phone numbers</h1>
    </div>
    @include('filter')
    @include('grid')
</div>
@yield('scripts')

</body>
</html>
