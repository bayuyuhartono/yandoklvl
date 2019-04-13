<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Layanan Akademik Dokumen Universitas Tarumanagara</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('adminbsb/logo.png')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" type="text/css" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css')}}">
    
    <!-- Bootstrap Core Css -->
    <link href="{{url('adminbsb/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('adminbsb/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('adminbsb/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{url('adminbsb/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('adminbsb/css/style.css')}}" rel="stylesheet">

    <link href="{{url('adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('adminbsb/css/themes/all-themes.css')}}" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{('adminbsb/plugins/sweetalert/sweetalert.css" rel="stylesheet')}}" />

    @section('css')
    @show
</head>

<body class="theme-red">

    @include('layouts.header')


    @include('layouts.sidebar')
  
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Jquery Core Js -->
    <script src="{{url('adminbsb/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('adminbsb/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{url('adminbsb/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('adminbsb/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{url('adminbsb/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{url('adminbsb/js/admin.js')}}"></script>
    <script src="{{url('adminbsb/js/pages/forms/form-validation.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{url('adminbsb/js/demo.js')}}"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="{{url('adminbsb/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{url('adminbsb/js/pages/ui/dialogs.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url('adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Jquery Validation Plugin js -->
    <script src="{{url('adminbsb/plugins/jquery-validation/jquery.validate.js')}}"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="{{url('adminbsb/plugins/jquery-steps/jquery.steps.js')}}"></script>
    
    <!-- Input Mask Plugin Js -->
    <script src="{{url('adminbsb/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>

    <script src="{{url('adminbsb/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{url('adminbsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('adminbsb/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>

    <script src="{{url('adminbsb/js/pages/tables/jquery-datatable.js')}}"></script>

    @include('sweet::alert')

    @section('js')
 
    @show
</body>

</html>
