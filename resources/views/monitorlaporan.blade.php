@extends('template/sidebar')
@section('content')

    <body>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_documents_alt"></i>Monitoring Laporan</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                            <li><i class=""></i>Monitoring</li>
                            <li><i class=""></i>Monitoring Laporan</li>
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
                                        <h1>Tabel Laporan</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <a class="btn btn-warning" href="exportlaporan">Export User Data</a>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif
                            <div class="panel-body">

                                <div class="col-lg-6" style="margin-top: 9px">
                                    <label class=" " style="font-weight: bold">Filter Sales</label>
                                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search-bisa', 'onkeyup' => 'cari()', 'placeholder' => 'Nama Sales']) !!}
                                </div>
                                {!! Form::close() !!}
                                {!! Form::open(['url' => '/monitoringlaporan/tanggalfilterlaporan', 'id' => 'form_tanggal_filter', 'class' => 'form-inline', 'style' => 'margin-top:34px']) !!}
                                <div class="col-lg-3">
                                    {!! Form::date('tanggal_awal', null, ['class' => 'form-control', 'id' => 'id_awal', 'onchange' => 'chk_range()']) !!}</div>

                                <div class="col-lg-3">
                                    {!! Form::date('tanggal_akhir', null, ['class' => 'form-control', 'id' => 'id_akhir', 'onchange' => 'chk_range()']) !!}</div>
                                {!! Form::close() !!}
                            </div>
                            <script>
                                var jenis = 1;

                                function cari() {
                                    // Declare variables
                                    var input, filter, table, tr, td, i, txtValue, cat, id_table, id_search;
                                    id_search = "search-bisa";
                                    id_table = "tabellaporan";
                                    input = document.getElementById(id_search);
                                    filter = input.value.toUpperCase();
                                    table = document.getElementById(id_table);
                                    tr = table.getElementsByTagName("tr");

                                    // Loop through all table rows, and hide those who don't match the search query
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[jenis];
                                        if (td) {
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].style.display = "";
                                            } else {
                                                tr[i].style.display = "none";
                                            }
                                        }
                                    }
                                }

                                function chk_range() {
                                    awal = new Date(document.getElementById('id_awal').value);
                                    akhir = new Date(document.getElementById('id_akhir').value);

                                    oneday = 1000 * 60 * 60 * 24;
                                    if (document.getElementById('id_akhir').value != "" && document.getElementById('id_awal').value != "") {
                                        different = (akhir - awal) / oneday;
                                        if (different <= 0) {
                                            // document.getElementsByClassName('formDate')[1].value = document.getElementsByClassName('formDate')[0]
                                            //     .value;
                                            document.getElementById('id_akhir').value = "";
                                            document.getElementById('id_awal').value = "";
                                            alert('Tanggal tidak boleh sama atau kurang dari tanggal awal');
                                        } else {

                                            document.getElementById('form_tanggal_filter').submit();
                                        }
                                    }
                                }

                                function ganti_jenis() {
                                    document.getElementById("form_kategori_filter").submit();
                                }

                                function ganti_jenis(value) {
                                    if (value == 3) {
                                        location.href = "sembarang";
                                    } else {
                                        document.getElementById("form_kategori_filter").submit();
                                    }


                                }
                            </script>
                            <table class="table table-striped table-advance table-hover" id="tabellaporan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sales</th>
                                        <th>Tanggal Laporan</th>
                                        <th>Kegiatan</th>
                                        <th>Keterangan</th>
                                        <th>Dokumentasi</th>
                                        <th>Walk in</th>
                                        <th>Database Customer</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($laporan as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->NAMA_KARYAWAN }}</td>
                                            <td>{{ $data->TANGGAL_LAPORAN }}</td>
                                            <td>{{ $data->KEGIATAN }}</td>
                                            <td>{{ $data->KETERANGAN }}</td>
                                            <td>
                                                <img src="{{ asset('storage/app/public/uploads/' . $data->name) }}"
                                                    height="120px" width="120px" alt="image">
                                            </td>
                                            <td>{{ $data->WI }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                            <td>
                                                {{-- <a href="editreport/{{ $data->ID_LAPORAN }}" class="btn btn-warning">
                                                    Edit
                                                </a> --}}
                                                <a class="btn btn-success" href="editreport/{{ $data->ID_LAPORAN }}"><i
                                                        class="icon_pencil-edit"></i>
                                                    Ubah</a>
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
