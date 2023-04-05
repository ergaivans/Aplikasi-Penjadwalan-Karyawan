<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <link rel="icon" href="resources/img/logo-prospero.png" type="image/gif" sizes="16x16">
    <title>Tamansari Prospero</title>

    <!-- Bootstrap CSS -->
    <link href="/project_prospero/resources/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="/project_prospero/resources/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="/project_prospero/resources/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <link href="/project_prospero/resources/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="/project_prospero/resources/css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <!-- easy pie chart-->
    <link href="/project_prospero/resources/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet"
        type="text/css" media="screen" />
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

<body>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_documents_alt"></i> Monitoring Jadwal </h3>
                    <ol class="breadcrumb">
                        </li>
                        {{-- <li><i class="fa fa-laptop"></i>Dashboard</li> --}}
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!--Project Activity start-->
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="row">
                                <div class="col-lg-8 task-progress pull-left">
                                    <h1>Monitoring Jadwal</h1>
                                </div>
                            </div>
                        </div>
                        @if (Session::has('messages'))
                            <span class="label label-success">{{ Session::get('messages') }}</span>
                        @endif



                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Tanggal Terjadwal</th>
                                    <th>Kegiatan Terjadwal</th>
                                    <th>Realisasi Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data8 as $data)
                                    <tr>
                                        <td>{{ $data->NAMA_KARYAWAN }}</td>
                                        <td>{{ $data->TANGGAL }}</td>
                                        <td>{{ $data->JADWAL }}</td>
                                        <td>{{ $data->REALISASI_JADWAL }}</td>
                                    </tr>

                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                            </tbody>

                        </table>


                    </section>
                </div>
        </section>
        <div class="text-right">
            <div class="credits">
                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            All the links in the footer should remain intact.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            You can delete the links only if you purchased the pro version.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Licensing information: https://bootstrapmade.com/license/
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
            </div>
        </div>
    </section>
    <!--main content end-->
    </section>
    <!-- container section start -->

    <!-- javascripts -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="resources/js/jquery.scrollTo.min.js"></script>
    <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="resources/js/scripts.js"></script>

</body>
