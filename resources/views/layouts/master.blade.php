 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Courriers</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assetss/css/bootstrap.min.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('assetss/css/datatables.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin-3.css') }}">
   
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <!-- Main wrapper -->
    <div id="main-wrapper">
        <!-- Nav header -->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('images/logo-white-3.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('images/logo-text-white.png') }}" alt="">
                <img class="brand-title" src="{{ asset('images/logo-text-white.png') }}" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!-- Header -->
        @include('partials.header')
        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- Flash messages -->
        @include('flash-toastr::message')
        <!-- Content body -->
        @yield('content')
        <!-- Footer -->
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>
    <!-- Chart sparkline plugin files -->
    <script src="{{ asset('vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/sparkline-init.js') }}"></script>
    <!-- Chart Morris plugin files -->
    <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/morris/morris.min.js') }}"></script>
    <!-- Init file -->
    <script src="{{ asset('js/plugins-init/widgets-script-init.js') }}"></script>
    <!-- Demo scripts -->
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
    <!-- SVG animation scripts -->
    <script src="{{ asset('vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('vendor/svganimation/svg.animation.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>

    <!-- jQuery (must be loaded before Select2) -->
    <script src="{{ asset('assetss/js/jquery-3.6.0.min.js') }}"></script>
     <!-- Select2 CSS (local fallback) -->
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Select2 JS (local fallback) -->
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>

<!-- Votre script personnalisé -->
<script>
    $(document).ready(function() {
        // Initialisez Select2 sur les éléments nécessaires
        $('.select2').select2();
    });
</script>
<script>
    $(document).ready(function() {
        // Initialisez Bootstrap Select sur les éléments nécessaires
        $('.selectpicker').selectpicker();
    });
</script>
    <!-- DataTables -->
    <script src="{{ asset('assetss/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assetss/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assetss/js/vfs_fonts.js') }}"></script>
</body>
</html>
