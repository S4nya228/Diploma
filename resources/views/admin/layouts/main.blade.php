<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Кабінет адміністратора</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="shortcut icon" href="{{asset("storage/images/icon1.svg")}}">

    @vite([
    "resources/js/plugins/select2/css/select2.min.css",
    "resources/js/plugins/fontawesome-free/css/all.min.css",
    "resources/js/dist/css/adminlte.min.css",
    "resources/js/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
    "resources/js/plugins/daterangepicker/daterangepicker.css",
    "resources/sass/app.scss"
    ])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    <nav class="main-header navbar navbar-dark">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>



    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <div class="sidebar">
            @include("admin.includes.sidebar")
        </div>

    </aside>


    @yield("content")

    <footer class="main-footer">
    </footer>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>
</div>

@vite([
    "resources/js/plugins/jquery/jquery.min.js",
    "resources/js/plugins/jquery-ui/jquery-ui.min.js",
    "resources/js/plugins/bootstrap/js/bootstrap.bundle.min.js",
    "resources/js/plugins/moment/moment.min.js",
    "resources/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
    "resources/js/dist/js/adminlte.js",
    "resources/js/plugins/select2/js/select2.full.min.js",
    ])
@livewireScripts
</body>
</html>
