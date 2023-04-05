@extends('template/sidebar')
@section('content')

    <body>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_documents_alt"></i> Database Customer </h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="viewcustomer">Beranda/Customer</a></li>
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
                                        <h1>Database Customer</h1>
                                    </div>
                                </div>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th>Id laporan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Tanggal Laporan</th>
                                        <th>Kegiatan</th>
                                        <th>Keterangan</th>
                                        <th>Dokumentasi</th>
                                        <th>Walk in</th>
                                        <th>Customer didapat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $data)
                                        <tr>
                                            <td>{{ $data->ID_LAPORAN }}</td>
                                            <td>{{ $data->NAMA_KARYAWAN }}</td>
                                            <td>{{ $data->TANGGAL_LAPORAN }}</td>
                                            <td>{{ $data->KEGIATAN }}</td>
                                            <td>{{ $data->KETERANGAN }}</td>
                                            <td>
                                                <img src="{{ asset('resources/img/upload/' . $data->DOKUMENTASI) }}"
                                                    width="70px" height="70px" alt="Image">
                                            </td>
                                            <td>{{ $data->WI }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                            <td>
                                                <a href="editreport/{{ $data->ID_LAPORAN }}" class="btn btn-warning">
                                                    Edit
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
