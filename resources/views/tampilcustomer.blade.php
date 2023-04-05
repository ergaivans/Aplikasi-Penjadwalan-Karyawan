@extends('template/sidebar_sales')
@section('content')

    <body>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_profile"></i>Penawaran Customer</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_sales">Halaman Utama</a></li>
                            <li><a>Daftar Customer</a></li>
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
                                        <h1>Tabel Database Customer</h1>
                                    </div>
                                </div>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>

                                        <th>Nama Customer</th>
                                        <th>No. Telpon Customer</th>
                                        <th>Sumber</th>
                                        <th>Unit Minat</th>
                                        <th>Keterangan Unit</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Jenis Customer</th>
                                        <th>Revisi Jenis Customer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan as $data)

                                        <tr>
                                            <td>{{ $data->NAMA_CUSTOMER }}</td>
                                            <td>{{ $data->NOTLP_CUS }}</td>
                                            <td>{{ $data->SUMBER }}</td>
                                            <td>{{ $data->UNIT_MINAT }}</td>
                                            <td>{{ $data->KETERANGAN_UNIT }}</td>
                                            <td>{{ $data->NOMINAL }}</td>
                                            @if ($data->JENIS == 2)
                                                <td>
                                                    <span class="badge bg-important"> Hot Prospek</span>

                                                </td>
                                            @elseif ($data->JENIS == 1)
                                                <td>
                                                    <span class="badge bg-success"> Prospek</span>
                                                </td>
                                            @elseif ($data->JENIS == 0)
                                                <td>
                                                    <span class="badge bg-warning"> Belum Terklasifikasinan</span>
                                                </td>
                                            @elseif ($data->JENIS == 3)
                                                <td>
                                                    <span class="badge bg-important"> Closing</span>
                                                </td>
                                            @endif
                                            <td>
                                                <a href="viewcustomer/updateunitminat/{{ $data->ID_DETAILCUST }} "
                                                    class="btn btn-danger">
                                                    Update Minat Unit
                                                </a>
                                            </td>
                                        </tr>
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
