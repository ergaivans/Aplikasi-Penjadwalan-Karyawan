@extends('template/sidebar')
@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_star_alt"></i> Penilaian</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                        <li><i class=""></i>Penilaian</li>
                        <li><i class=""></i>Agent Under</li>
                    </ol>
                </div>
            </div>

            <div class="panel-body">
                <a href="tambah-agent-under" class="btn btn-primary">
                    Tambah Agent Under
                </a>
            </div>

            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tabel Agent Under
                        </header>

                        <table class="table table-striped table-advance table-hover" style='table-layout: fixed'>
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Sales in House</th>
                                    <th>Nama Agent</th>
                                    <th>No. Telp</th>
                                    <th>Status</th>
                                    <th>Bendera</th>
                                    <th>Aksi</th>
                                </tr>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($babi as $item)

                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->NAMA_KARYAWAN }}</td>
                                        <td>{{ $item->NAMA_AU }}</td>
                                        <td>{{ $item->TELP_AU }}</td>
                                        @if ($item->STATUS_AU == '0')
                                            <td>Lead Agent</td>

                                        @elseif ($item->STATUS_AU == '1')
                                            <td>Traditional Agent</td>
                                        @endif
                                        <td>{{ $item->BENDERA }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-success" href="ubah_au/{{ $item->ID_AU }}"><i
                                                        class="icon_pencil-edit" style="margin-right: 4px"></i>
                                                    Ubah</a>
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
