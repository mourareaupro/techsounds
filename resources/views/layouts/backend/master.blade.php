<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', ''))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.css') }}">
    <!-- iCheck assests -->
    <link href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}" rel="stylesheet">
    <!-- Date Time Picker assests -->
    <link href="{{ asset('vendor/adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <!-- File Uploader-->
<!--<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/imageuploadify/imageuploadify.min.css') }}" rel="stylesheet">-->
    <!-- Pace -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/pace/pace.min.css') }}" rel="stylesheet">
    <!-- Blue Skin -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">

    <!-- override -->
    <link rel="stylesheet" href="{{ asset('css/override.css') }}">
    <!-- override -->

    <!-- DataTables -->
    @if(config('adminlte.plugins.datatables'))
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
        @endif

    @section('body_class', 'skin-' . config('adminlte.skin', 'black') . ' sidebar-mini ' . (config('adminlte.layout') ? [
        'boxed' => 'layout-boxed',
        'fixed' => 'fixed',
        'top-nav' => 'layout-top-nav'
    ][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

@yield('body')

<body class="hold-transition @yield('body_class')">

<div class="wrapper" style="height: auto;">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">{!! config('adminlte.logo_mini', '') !!}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">{!! config('adminlte.logo', '') !!}</span>
        </a>

        <!-- Header Navbar -->
        @include('layouts.backend.partials.nav')
    </header><!-- /.header -->

    <!-- sidebar: style can be found in sidebar.less -->
    @include('layouts.backend.partials.main-sidebar')
    <!-- /.main-sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header"> <!-- Content Header (Page header) -->
            @yield('content_header')
        </section>
        <section class="content"><!-- Main content -->
            @yield('content')
        </section><!-- /.content -->
    </div> <!-- /.content-wrapper -->

</div> <!-- ./wrapper -->

<!--<script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>--><!-- La version jQuery en local -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('vendor/adminlte/dist/js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('vendor/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Hide/Dispaly Condition -->
<script src="{{ asset('vendor/adminlte/dist/js/conditionize.jquery.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('vendor/adminlte/plugins/select2/select2.full.min.js') }}"></script>
<!-- Progress Bar -->
<script src="{{ asset('vendor/adminlte/dist/js/jq.progress-bar.js') }}"></script>
<!-- Validator -->
<script src="{{ asset('vendor/adminlte/plugins/bootstrapValidator/bootstrapValidator.min.js') }}"></script>
<!-- FileInput -->
<!--<script src="{{ asset('vendor/adminlte/plugins/imageuploadify/imageuploadify.min.js') }}"></script>-->
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('vendor/adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- Knob -->
<script src="{{ asset('vendor/adminlte/plugins/knob/jquery.knob.js') }}"></script>
<!-- Knob -->
<script src="{{ asset('vendor/adminlte/plugins/chartjs/Chart.min.js') }}"></script>
<!-- Pace / Dynamic loading bar -->
<script src="{{ asset('vendor/adminlte/plugins/pace/pace.min.js') }}"></script>
<!-- Date Time Picker assests -->
<script type="text/javascript" src="{{ asset('vendor/adminlte/plugins/datetimepicker/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/adminlte/plugins/datetimepicker/bootstrap-datetimepicker.fr.js') }}"></script>
<script type="text/javascript">
    $(function () {
        //For Date & Time Picker
        $('.form_datetime').datetimepicker({
            language:  'fr',
            format: 'dd/mm/yyyy',
            weekStart: 1,
            todayBtn:  0,
            autoclose: 1,
            forceParse: 0,
            disabledHours : 1 ,
            pickTime: false
            //startView: 2,
            //showMeridian: 1
        });
        //For Drag&Drop Inputffile
        //$('input[type="file"]').imageuploadify();
        //For Tooltips
        $('[data-toggle="popover"]').popover({ trigger: "hover" });
        "use strict";
        //Initialize Select2 Elements
        $(".select2").select2();
        //Make box draggable
        $(".connectedSortable").sortable({
            placeholder: "sort-highlight",
            connectWith: ".connectedSortable",
            handle: ".box-header, .nav-tabs",
            forcePlaceholderSize: true,
            zIndex: 999999
        });
        $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");
        // Make Message hidden when updated
        setTimeout(function() {
            $(".alert-success").fadeOut(300);
        }, 6000);
    });
</script>


@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
@endif

@yield('adminlte_js')
@yield('scripts')
</body>
</html>
