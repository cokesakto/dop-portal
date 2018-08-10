<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/dataTables.material.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/material-design-lite/1.1.0/material.min.css') }}" >

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/datatable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/datatable/DataTables-1.10.12/js/dataTables.material.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/boostrap/3.3.7/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/datatable/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>

</head>

<body>
    <div id="app">
        
        @include('inc.navbardatatable')
        <div class="container">
           <!--  @include('inc.messages') -->
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
   <!--  <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
