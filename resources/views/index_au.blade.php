@extends('template/sidebar_au')
@section('content')
    @include('sweetalert::alert')

    <body>
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_house"></i>Halaman Utama</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_au">Halaman Utama</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 14px">
                    @foreach ($jadpem as $babi)
                        <div class="col-sm-4">
                            <div class="card" style="height: 200px; margin-top: 26px">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"
                                        style=" position: absolute;top: 8px;left:16px;font-size: 18px;">
                                        {{ $babi->NAMA_PAMERAN }}</li>
                                    <li class="list-group-item"
                                        style=" position: absolute; bottom:0;right: 0;font-size: 14px; word-spacing: 5px;font-weight: bold; color: #66c2ff">
                                        {{ $babi->TANGGAL_AWAL }} - {{ $babi->TANGGAL_AKHIR }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="
                                                row">
                    <div class="col-lg-12">
                        <!--Project Activity start-->
                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="row">
                                    <div class="col-lg-8 task-progress pull-left">
                                        <h1>Jadwal Saya</h1>
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
                                        <th><i class=""></i>Nama Agent</th>
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
                    < <div class="col-lg-12">
                        <!--Project Activity start-->
                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="row">
                                    <div class="col-lg-8 task-progress pull-left">
                                        <h1>Rincian Kerja Saya</h1>
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
                                        <th>Tanggal</th>
                                        <th>Kegiatan</th>
                                        <th>Keterangan</th>
                                        <th>Walk in</th>
                                        <th>Dokumentasi</th>
                                        <th>Upload Dokumentasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $data)
                                        <tr>

                                            <td>{{ $data->TANGGAL_LAPORAN }}</td>
                                            <td>
                                                {{ $data->KEGIATAN }}
                                            </td>
                                            <td>
                                                {{ $data->KETERANGAN }}
                                            </td>
                                            <td>{{ $data->WI }}</td>
                                            <td>
                                                <img src="{{ asset('storage/app/public/uploads/' . $data->name) }}"
                                                    height="120px" width="120px" alt="image">
                                            </td>

                                            <td>
                                                <a href="uploadfoto/{{ $data->Winter }}" class="btn btn-primary"
                                                    style="margin-right: 8px">Upload
                                                    Dokumentasi</a>
                                            </td>
                                            <td>
                                                <a href="editreportharian/{{ $data->Winter }}" class="btn btn-warning"
                                                    style="margin-right: 8px">Ubah Data</a>

                                            </td>

                                            {{-- <td>
                                        <span class="profile-ava">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        </span>
                                    </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                        <!--Project Activity end-->
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
