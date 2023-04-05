@extends('template/sidebar')
@section('content')

    <body>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_documents_alt"></i>Monitoring Customer</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                            <li><i class=""></i>Monitoring</li>
                            <li><i class=""></i>Monitoring Customer</li>
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
                            <div class="panel-body">
                                <a class="btn btn-warning" href="exportcustomer">Export User Data</a>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif

                            <div class="panel-body">

                                <div class="col-lg-6" style="margin-top: 9px">
                                    <label class=" " style="font-weight: bold">Filter Sales</label>
                                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search-bisa', 'onkeyup' => 'cari()', 'placeholder' => 'Nama Sales']) !!}
                                </div>
                                <div class="col-lg-6" style="margin-top: 22px">
                                    {!! Form::open(['url' => '/filterhot', 'id' => 'form_kategori_filter', 'class' => 'form-inline', 'style' => 'margin-top:12px']) !!}
                                    <select name="selector" class="form-control m-bot15" onchange="ganti_jenis(this.value)"
                                        id="selector_id">
                                        <option style="display: none">--Pilih Klasifikasi</option>
                                        <option value="0">Belum Terklasifikasikan</option>
                                        <option value="3">Prospek</option>
                                        <option value="2">Hot Prospek</option>
                                        <option value="1">Prospek</option>


                                    </select>
                                    {!! Form::close() !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <script>
                                var jenis = 0;

                                function cari() {
                                    // Declare variables
                                    var input, filter, table, tr, td, i, txtValue, cat, id_table, id_search;
                                    id_search = "search-bisa";
                                    id_table = "tabelcus";
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

                                function ganti_jenis(value) {
                                    if (value == 3) {
                                        location.href = "sembarang";
                                    } else {
                                        document.getElementById("form_kategori_filter").submit();
                                    }


                                }
                            </script>
                            <table class="table table-striped table-advance table-hover" id="tabelcus">
                                <thead>
                                    <tr>
                                        <th>Nama Sales</th>
                                        <th>Jabatan</th>
                                        <th>Nama Customer</th>
                                        <th>Sumber</th>
                                        <th>No. Tlp Customer</th>
                                        <th>Tipe Unit Minat</th>
                                        <th>Keterangan Unit Minat</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Jenis Customer</th>
                                        <th>Verifikasi UTJ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $data)
                                        <tr>
                                            <td>{{ $data->NAMA_KARYAWAN }}</td>
                                            <td>{{ $data->JABATAN }}</td>
                                            <td>{{ $data->NAMA_CUSTOMER }}</td>
                                            <td>{{ $data->SUMBER }}</td>
                                            <td>{{ $data->NOTLP_CUS }}</td>
                                            <td>{{ $data->UNIT_MINAT }}</td>
                                            <td>{{ $data->KETERANGAN_UNIT }}</td>
                                            <td>{{ $data->NOMINAL }}</td>
                                            @if ($data->JENIS == 3)
                                                <td>
                                                    <span class="badge bg-important">Closing</span>
                                                </td>
                                            @elseif ($data->JENIS == 2)
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
                                            @endif


                                            <td>
                                                @if ($data->REALISASI_UNIT)
                                                    <a href="validasicus/{{ $data->ID_DETAILCUST }}"
                                                        class="btn btn-success">
                                                        UTJ Sudah Terverivikasi
                                                    </a>
                                                @else
                                                    @if ($data->UNIT_MINAT)
                                                        <a href="validasicus/{{ $data->ID_DETAILCUST }}"
                                                            class="btn btn-warning">
                                                            Verifikasi UTJ
                                                        </a>
                                                    @else

                                                        <a href="#" class="btn btn-danger">
                                                            Tidak Ada Unit
                                                        </a>
                                                    @endif
                                                @endif


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

@endsection
