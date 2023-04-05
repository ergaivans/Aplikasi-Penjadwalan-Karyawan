@extends('template/sidebar')
@section('content')

    <body>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_documents_alt"></i>Monitoring Jadwal</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                            <li><i class=""></i>Monitoring</li>
                            <li><i class=""></i>Monitoring Jadwal</li>
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
                                        <h1>Tabel Jadwal</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <a class="btn btn-warning" href="exportjadwal">Export Excel</a>
                                <a class="btn btn-warning" href="exportpdfjadwal" style="margin-left: 5px">Export PDF</a>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif

                            <div class="panel-body">
                                <!-- nama dan kategori -->
                                <div class="col-lg-3" style="margin-top: 12px">
                                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search-bisa', 'onkeyup' => 'cari()', 'placeholder' => 'Nama Sales']) !!}</div>
                                <div class="col-lg-3">
                                    {!! Form::open(['id' => 'form_kategori_filter', 'class' => 'form-inline', 'style' => 'margin-top:12px']) !!}
                                    <select name="selector" class="form-control m-bot15" onchange="cari()" id="selector_id">
                                        <option value="default">--Pilih</option>
                                        @foreach ($kateg as $item)
                                            <option value="{{ $item->NAMA_KATJAD }}">
                                                {{ $item->NAMA_KATJAD }}</option>
                                        @endforeach
                                    </select>
                                    {!! Form::close() !!}
                                </div>

                                <!-- tanggal -->
                                {!! Form::open(['url' => '/monitorjadwal/filtermonitortanggaljadwal', 'id' => 'form_tanggal_filter', 'class' => 'form-inline', 'style' => 'margin-top:12px']) !!}
                                <div class="col-lg-3">
                                    {!! Form::date('tanggal_awal', null, ['class' => 'form-control', 'id' => 'id_awal', 'onchange' => 'chk_range()']) !!}</div>

                                <div class="col-lg-3">
                                    {!! Form::date('tanggal_akhir', null, ['class' => 'form-control', 'id' => 'id_akhir', 'onchange' => 'chk_range()']) !!}</div>
                                {!! Form::close() !!}
                                <script>
                                    function cari() {
                                        var nama = 0;
                                        var kategori = 2;

                                        // Declare variables
                                        var input, inputKat, valueKat, filter, table, tr, td, i, txtValueNama, txtValueKategori, cat, id_table,
                                            id_search;
                                        id_search = "search-bisa";
                                        id_table = "tabelcus";

                                        input = document.getElementById(id_search);
                                        filter = input.value.toUpperCase();

                                        inputKat = document.getElementById('selector_id');
                                        valueKat = inputKat.options[inputKat.selectedIndex].value;

                                        table = document.getElementById(id_table);
                                        tr = table.getElementsByTagName("tr");

                                        // Loop through all table rows, and hide those who don't match the search query
                                        if (valueKat == 'default') {
                                            for (i = 0; i < tr.length; i++) {
                                                tdNama = tr[i].getElementsByTagName("td")[nama];

                                                if (tdNama) {
                                                    txtValueNama = tdNama.textContent || tdNama.innerText;
                                                    if (txtValueNama.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }

                                        } else if (valueKat == "default" && filter == "") {
                                            for (i = 0; i < tr.length; i++) {
                                                tr[i].style.display = "";
                                            }
                                        } else {
                                            for (i = 0; i < tr.length; i++) {
                                                tdNama = tr[i].getElementsByTagName("td")[nama];
                                                tdKategori = tr[i].getElementsByTagName("td")[kategori];
                                                if (tdNama && tdKategori) {
                                                    txtValueNama = tdNama.textContent || tdNama.innerText;
                                                    txtValueKategori = tdKategori.textContent || tdKategori.innerText;
                                                    if (txtValueNama.toUpperCase().indexOf(filter) > -1 && txtValueKategori == valueKat) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
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
                                </script>
                            </div>

                            <table class="table table-striped table-advance table-hover" id="tabelcus">
                                <thead>
                                    <tr>
                                        <th>Nama Sales</th>
                                        <th>Tanggal Terjadwal</th>
                                        <th>Kegiatan Terjadwal</th>
                                        <th>Realisasi Kegiatan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($jadwal as $data)
                                        <tr>
                                            <td>{{ $data->NAMA_KARYAWAN }}</td>
                                            <td>{{ $data->TANGGAL }}</td>
                                            <td>{{ $data->JADWAL }}</td>
                                            @if ($data->REALISASI_JADWAL == null)

                                                <td><span class="badge bg-warning"> Belum Melakukan Report</span></td>
                                            @else
                                            <td><span class="badge bg-success"> {{ $data->REALISASI_JADWAL }}</span></td>

                                            @endif

                                            <td>
                                                @if ($data->REALISASI_JADWAL == null)
                                                <a href="notifmana/{{$data->ID_KARYAWAN}}/{{$data->ID_JADWAL}}"
                                                    class="btn btn-success">
                                                    Ingatkan
                                                </a>
                                                @endif

                                            </td>






                                            <!-- <td>
                                                                                        <a href="#" class="btn btn-success"> Detail </a>
                                                                                        <a href="#" class="btn btn-success"> Catatan </a>
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
