@extends('template/sidebar_sales')
@section('content')

    <body>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i>History Report</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_sales">Halaman Utama</a></li>
                            <li><a>History Report</a></li>
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
                                        <h1>Tabel History Report</h1>
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
                            <div class="panel-body">

                                <div class="col-lg-6" style="margin-top: 9px">
                                    <label class=" " style="font-weight: bold">Filter Report</label>
                                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search-bisa', 'onkeyup' => 'cari()']) !!}
                                </div>
                                {!! Form::close() !!}
                                {!! Form::open(['url' => '/view_historyreport_sales/tanggalfilterlaporan', 'id' => 'form_tanggal_filter', 'class' => 'form-inline', 'style' => 'margin-top:34px']) !!}
                                <div class="col-lg-3">
                                    {!! Form::date('tanggal_awal', null, ['class' => 'form-control', 'id' => 'id_awal', 'onchange' => 'chk_range()']) !!}</div>

                                <div class="col-lg-3" style="margin-left: 5%">
                                    {!! Form::date('tanggal_akhir', null, ['class' => 'form-control', 'id' => 'id_akhir', 'onchange' => 'chk_range()']) !!}</div>
                                {!! Form::close() !!}
                            </div>
                            <script>
                                var jenis = 2;

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
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($laporan as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
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
                                                    style="margin-right: 8px">Upload Dokumentasi</a>
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

                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>

                        </section>
                        <!--Project Activity end-->
                    </div>
                </div>

                </div>

                <!-- statics end -->




                <!-- project team & activity start -->







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
