@extends('template/sidebar_sales')
@section('content')

    <body>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_documents_alt"></i>Report Terjadwal</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_sales">Halaman Utama</a></li>
                            <li><a>Report Terjadwal</a></li>
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
                                        <h1>Tabel Jadwal Kegiatan</h1>
                                    </div>
                                    <div class="col-lg-4">
                                        <span class="profile-ava pull-right">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                            {{ Session::get('user')[1] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th><i class=""></i>Nama Sales</th>
                                        <th><i class=""></i>Kegiatan</th>
                                        <th><i class=""></i>Tanggal Kegiatan</th>
                                        <th><i class=""></i>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $item)
                                        <tr>
                                            <td>{{ $item->NAMA_KARYAWAN }}</td>
                                            <td>{{ $item->JADWAL }}</td>
                                            <td>{{ $item->TANGGAL }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-primary"
                                                        href="reportjadwal/{{ $item->ID_JADWAL }}">Report</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </section>
                        <!--Project Activity end-->
                    </div>
                </div><br><br>






                <!-- project team & activity end -->

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
        <!-- container section end -->
        <!-- javascripts -->
        <script src="resources/js/jquery.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <!-- nicescroll -->
        <script src="resources/js/jquery.scrollTo.min.js"></script>
        <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="resources/js/scripts.js"></script>

    </body>

@endsection
