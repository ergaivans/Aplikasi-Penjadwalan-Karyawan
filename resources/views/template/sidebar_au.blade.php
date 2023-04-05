<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <link rel="icon" href="resources/img/logo-prospero.png" type="image/gif" sizes="16x16">
    <title>Prospero Marketing Apps</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <!-- <link href="/project_prospero/resources/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- bootstrap theme -->
    <link href="/project_prospero/resources/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="/project_prospero/resources/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="/project_prospero/resources/css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <!-- easy pie chart-->
    <link href="resources/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
        media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="/project_prospero/resources/css/owl.carousel.css" type="text/css">
    <link href="/project_prospero/resources/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="/project_prospero/resources/css/fullcalendar.css">
    <link href="/project_prospero/resources/css/widgets.css" rel="stylesheet">
    <link href="/project_prospero/resources/css/style.css" rel="stylesheet">
    <link href="/project_prospero/resources/css/style-responsive.css" rel="stylesheet" />
    <link href="/project_prospero/resources/css/xcharts.min.css" rel=" stylesheet">
    <link href="/project_prospero/resources/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
      ======================================================= -->
</head>

<body class="body1">
    <!-- container section start -->
    <section id="container" class="">


        <header class=" header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                        class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Prospero <span class="lite">Marketing Apps</span></a>
            <!--logo end-->


            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">

                    <!-- task notificatoin start -->

                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            {{-- <span class="profile-ava">
                                <img alt="" src="resources/img/avatar1_small.jpg">
                            </span> --}}
                            <span class="username">{{ Session::get('user')[1] }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="logout"><i class="icon_key_alt"></i> Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li>
                        <a class="" href="/project_prospero/index_au">
                            <i class="icon_house_alt"></i>
                            <span>Halaman Utama</span>
                        </a>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class=" icon_document_alt"></i>
                            <span>Report</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="/project_prospero/view_reportharian_sales">Report Tidak
                                    Terjadwal</a>
                            </li>
                            <li><a class="" href="/project_prospero/view_historyreport_sales">History
                                    Report</a>
                            </li>
                        </ul>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class=" icon_document_alt"></i>
                            <span>Customer</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">

                            <li><a class="" href="/project_prospero/daftarcustomer"> Daftar
                                    Customer</a>
                            </li>
                            <li><a class="" href="/project_prospero/viewcustomer">
                                    Penawaran Customer</a>
                            </li>
                        </ul>

                    </li>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        @yield('content')
</body>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</html>
