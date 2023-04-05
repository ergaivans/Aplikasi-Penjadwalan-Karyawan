@extends('template/sidebar')
@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Pencatatan Karyawan</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-table"></i>Pencatatan</li>
                        <li><i class="fa fa-th-list"></i>Pencatatan Karyawan</li>
                    </ol>
                </div>
            </div>

            <div class="panel-body">
                <a href="tambahkaryawan" class="btn btn-primary">
                    Tambah Karyawan
                </a>
                <a href="validasiakses" class="btn  btn-danger">
                    Permintaan Persetujuan
                </a>
            </div>



            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Advanced Table
                        </header>

                        <table class="table table-striped table-advance table-hover" style='table-layout: fixed'>
                            <tbody>
                                <tr>
                                    <th><i class="icon_profile"></i> No</th>
                                    <th><i class="icon_profile"></i> Nama Karyawan</th>
                                    <th><i class="icon_calendar"></i> No Tlp</th>
                                    <th><i class="icon_mail_alt"></i> Tempat Tanggal Lahir </th>
                                    <th><i class="icon_pin_alt"></i> Alamat </th>
                                    <th><i class="icon_mobile"></i> Jabatan </th>
                                    <th><i class="icon_cogs"></i> Email </th>
                                    <th><i class="icon_cogs"></i> ID_User </th>
                                    <th><i class="icon_cogs"></i> Password </th>
                                    <th><i class="icon_cogs"></i> Action </th>
                                </tr>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($daftar as $item)

                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->NAMA_KARYAWAN }}</td>
                                        <td>{{ $item->NO_TLP }}</td>
                                        <td>{{ $item->TTL }}</td>
                                        <td>{{ $item->ALAMAT }}</td>
                                        <td>{{ $item->JABATAN }}</td>
                                        <td>{{ $item->EMAIL }}</td>
                                        <td>{{ $item->ID_USER }}</td>
                                        <td>{{ $item->PASSWORD }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-success"
                                                    href="editkaryawanbisa/{{ $item->ID_KARYAWAN }}"><i
                                                        class="icon_check_alt2"></i></a>
                                            </div>
                                        </td>
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
