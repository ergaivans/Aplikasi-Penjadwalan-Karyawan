@extends('template/sidebar')
@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i>Pencatatan Karyawan</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                        <li><i class=""></i>Pencatatan</li>
                        <li><i class=""></i>Pencatatan Karyawan</li>
                    </ol>
                </div>
            </div>

            <div class="panel-body">
                <a href="tambahkaryawan" class="btn btn-primary">
                    Tambah Karyawan
                </a>
                <a href="validasiakses" class="btn  btn-danger" style="margin-left: 5px">
                    Permintaan Persetujuan
                </a>
                <a class="btn btn-warning" href="exportkaryawan" style="margin-left: 5px">Export Excel</a>
                <!-- <a class="btn btn-warning" href="#">Export PDF</a> -->
            </div>



            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tabel Pencatatan Karyawan
                        </header>

                        <table class="table table-striped table-advance table-hover" style='table-layout: fixed'>
                            <tbody>
                                <tr>
                                    <th><i class=""></i>No</th>
                                    <th><i class=""></i>Nama Karyawan</th>
                                    <th><i class=""></i>No. Telepon</th>
                                    <th><i class=""></i>Alamat</th>
                                    <th><i class=""></i>Jabatan</th>
                                    <th><i class=""></i>Penanggung Jawab</th>

                                    <!-- <th><i class="icon_cogs"></i> ID_User </th> -->
                                    <!-- <th><i class="icon_cogs"></i> Password </th> -->
                                    <th><i class=""></i>Aksi</th>
                                    <!-- <th><i class="icon_cogs"></i> Validasi </th> -->
                                </tr>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($daftar as $item)

                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->NAMA_KARYAWAN }}</td>
                                        <td>{{ $item->NO_TLP }}</td>
                                        <td>{{ $item->ALAMAT }}</td>
                                        <td>{{ $item->JABATAN }}</td>

                                        @if ($item->Manager == null && $item->JABATAN == 'Kepala Divisi')
                                            <td> Manajemen </td>
                                        @elseif ($item->Manager == null && $item->JABATAN == 'Manajemen')
                                            <td> Pihak Tertinggi </td>
                                        @elseif ($item->Manager == null && $item->JABATAN == 'Sales')
                                            <td> Kepala Divisi </td>
                                        @else
                                            <td> {{ $item->Manager }} </td>

                                        @endif

                                        {{-- <td>
                                            <div class="btn-group">
                                                <a class="btn btn-success"
                                                    href="editkaryawanbisa/{{ $item->ID_KARYAWAN }}"><i
                                                        class="icon_check_alt2"></i></a>
                                            </div>
                                        </td> --}}
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-success"
                                                    href="editkaryawanbisa/{{ $item->ID_KARYAWAN }}"><i
                                                        class="icon_pencil-edit"></i>
                                                    Ubah</a>
                                            </div>
                                        </td>
                                        <!-- <td>
                                                                                                                                                                                                                                                <div class="btn-group">
                                                                                                                                                                                                                                                    <a class="btn btn-success"
                                                                                                                                                                                                                                                        href="validasi_user/{{ $item->ID_KARYAWAN }}"><i
                                                                                                                                                                                                                                                            class="" style="margin-right: 4px"></i>validasi</a>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </td> -->
                                    </tr>

                                    @php
                                        $no++;
                                    @endphp


                                @endforeach


                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
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
