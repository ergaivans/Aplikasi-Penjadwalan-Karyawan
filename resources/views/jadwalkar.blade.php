@extends('template/sidebar')
@section('content')

    <body>
        <!--main content start-->
        <section id="container" class="">
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-table"></i>Penjadwalan Sales</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                                <li><i class=""></i>Pencatatan</li>
                                <li><i class=""></i>Penjadwalan Sales</li>
                            </ol>
                        </div>
                    </div>
                    <div class="panel-body">
                        <a href="tambahkarjad" class="btn btn-primary">
                            Tambah Kategori Jadwal
                        </a>


                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Form Penjadwalan Sales
                                </header>
                                <div class="panel-body">
                                    {!! Form::open(['url' => '/tambahjadwal', 'class' => 'form-horizontal']) !!}
                                    {!! Form::hidden('id_jadwal', $id_jadwal->MAX_ID_NUMBER) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Sales</label>
                                        <div class="col-sm-10">
                                            <select name="id_karyawan" class="form-control m-bot15">
                                                @foreach ($kuy as $data)
                                                    <option value="{{ $data->ID_KARYAWAN }}"> {{ $data->NAMA_KARYAWAN }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" class="form-control"> --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Tanggal Penjadwalan</label>
                                        <div class="col-lg-10">
                                            <div class="input-group date" id='tanggalLila'>
                                                <input name="tanggal" type="text" class="form-control" autocomplete="off">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jadwal</label>
                                        <div class="col-sm-10">
                                            <select name="jenis" class="form-control m-bot15">
                                                @foreach ($kateg as $item)
                                                    <option value="{{ $item->NAMA_KATJAD }}">
                                                        {{ $item->NAMA_KATJAD }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>

                                    {!! Form::close() !!}
                                    {{-- <form class="form-horizontal " method="get">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Karyawan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="inputSuccess">Kategori</label>
                        <div class="col-lg-10">
                          <!-- <select class="form-control m-bot15">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select> -->

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Jadwal</label>
                        <div class="col-sm-10">
                            <input id="dp1" type="text" value="28-10-2013" size="16" class="form-control">
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>

                    </form> --}}
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- Basic Forms & Horizontal Forms-->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">

                                <header class="panel-heading">
                                    Tabel Penjadwalan Sales
                                </header>

                                <div class="panel-body">
                                    <!-- nama dan kategori -->
                                    <div class="col-lg-3" style="margin-top: 12px">
                                        {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search-bisa', 'onkeyup' => 'cari()', 'placeholder' => 'Nama Sales   ']) !!}</div>
                                    <div class="col-lg-3">
                                        {!! Form::open(['id' => 'form_kategori_filter', 'class' => 'form-inline', 'style' => 'margin-top:12px']) !!}
                                        <select name="selector" class="form-control m-bot15" onchange="cari()"
                                            id="selector_id">
                                            <option value="default">--Pilih</option>
                                            @foreach ($kateg as $item)
                                                <option value="{{ $item->NAMA_KATJAD }}">
                                                    {{ $item->NAMA_KATJAD }}</option>
                                            @endforeach
                                        </select>
                                        {!! Form::close() !!}
                                    </div>

                                    <!-- tanggal -->
                                    {!! Form::open(['url' => '/penjadwalanbisa/tanggalfilter', 'id' => 'form_tanggal_filter', 'class' => 'form-inline', 'style' => 'margin-top:12px']) !!}
                                    <div class="col-lg-3">
                                        {!! Form::date('tanggal_awal', null, ['class' => 'form-control', 'id' => 'id_awal', 'onchange' => 'chk_range()']) !!}</div>

                                    <div class="col-lg-3">
                                        {!! Form::date('tanggal_akhir', null, ['class' => 'form-control', 'id' => 'id_akhir', 'onchange' => 'chk_range()']) !!}</div>
                                    {!! Form::close() !!}
                                    <script>
                                        function cari() {
                                            var nama = 1;
                                            var kategori = 2;

                                            // Declare variables
                                            var input, inputKat, valueKat, filter, table, tr, td, i, txtValueNama, txtValueKategori, cat, id_table,
                                                id_search;
                                            id_search = "search-bisa";
                                            id_table = "tabelku";

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


                                <table class="table table-striped table-advance table-hover" style='table-layout: fixed'
                                    id="tabelku">
                                    <tbody>
                                        <tr>
                                            <th><i class=""></i>No</th>
                                            <th><i class=""></i>Nama Sales</th>
                                            <th><i class=""></i>Kegiatan</th>
                                            <th><i class=""></i>Tanggal Kegiatan</th>
                                            <th><i class=""></i>Aksi</th>
                                        </tr>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kams as $item)

                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $item->NAMA_KARYAWAN }}</td>
                                                <td>{{ $item->JADWAL }}</td>
                                                <td>{{ $item->TANGGAL }}</td>
                                                <td>
                                                    {{-- <div class="">
                                                        <a class="btn btn-success"
                                                            href="editjadwal/{{ $item->ID_JADWAL }}"><i
                                                                class="icon_check_alt2"></i></a>
                                                        <a class="btn btn-danger"
                                                            href="hapusjadwal/{{ $item->ID_JADWAL }}"><i
                                                                class="icon_close_alt2"></i></a>
                                                    </div> --}}
                                                    <div class="btn-group">
                                                        <a class="btn btn-success"
                                                            href="editjadwal/{{ $item->ID_JADWAL }}"><i
                                                                class="icon_pencil-edit"></i>
                                                            Ubah</a>
                                                    </div>
                                                    <div class="btn-group" style="margin-left: 5px">
                                                        <a class="btn btn-danger"
                                                            href="hapusjadwal/{{ $item->ID_JADWAL }}"><i
                                                                class="icon_trash_alt"></i>
                                                            hapus</a>
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
        <!--main content end-->
        </section>
        <!-- container section start -->

        <!-- javascripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css"
            rel="stylesheet" />
        <script src="/project_prospero/resources/js/jquery.js"></script>
        <script src="/project_prospero/resources/js/jquery-ui-1.10.4.min.js"></script>
        <script src="/project_prospero/resources/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="/project_prospero/resources/js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="/project_prospero/resources/js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="/project_prospero/resources/js/jquery.scrollTo.min.js"></script>
        <script src="/project_prospero/resources/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="/project_prospero/resources/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="/project_prospero/resources/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="/project_prospero/resources/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="/project_prospero/resources/js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <<script src="/project_prospero/resources/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
            <script src="/project_prospero/resources/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
            <!--script for this page only-->
            <script src="/project_prospero/resources/js/calendar-custom.js"></script>
            <script src="/project_prospero/resources/js/jquery.rateit.min.js"></script>
            <!-- custom select -->
            <script src="/project_prospero/resources/js/jquery.customSelect.min.js"></script>
            <script src="/project_prospero/resources/assets/chart-master/Chart.js"></script>
            <!-- jquery ui -->
            <script src="/project_prospero/resources/js/jquery-ui-1.9.2.custom.min.js"></script>
            <!--custome script for all page-->
            <script src="/project_prospero/resources/js/scripts.js"></script>
            <!-- custom script for this page-->
            <script src="/project_prospero/resources/js/sparkline-chart.js"></script>
            <script src="/project_prospero/resources/js/easy-pie-chart.js"></script>
            <script src="/project_prospero/resources/js/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="/project_prospero/resources/js/jquery-jvectormap-world-mill-en.js"></script>
            <script src="/project_prospero/resources/js/xcharts.min.js"></script>
            <script src="/project_prospero/resources/js/jquery.autosize.min.js"></script>
            <script src="/project_prospero/resources/js/jquery.placeholder.min.js"></script>
            <script src="/project_prospero/resources/js/gdp-data.js"></script>
            <script src="/project_prospero/resources/js/morris.min.js"></script>
            <script src="/project_prospero/resources/js/sparklines.js"></script>
            <script src="/project_prospero/resources/js/charts.js"></script>
            <script src="/project_prospero/resources/js/jquery.slimscroll.min.js"></script>

            <!--custom checkbox & radio-->
            <script type="text/javascript" src="/project_prospero/resources/js/ga.js"></script>
            <!--custom switch-->
            <script src="/project_prospero/resources/js/bootstrap-switch.js"></script>
            <!--custom tagsinput-->
            <script src="/project_prospero/resources/js/jquery.tagsinput.js"></script>

            <!-- bootstrap-wysiwyg -->
            <script src="/project_prospero/resources/js/jquery.hotkeys.js"></script>
            <script src="/project_prospero/resources/js/bootstrap-wysiwyg.js"></script>
            <script src="/project_prospero/resources/js/bootstrap-wysiwyg-custom.js"></script>
            <script src="/project_prospero/resources/js/moment.js"></script>
            <script src="/project_prospero/resources/js/bootstrap-colorpicker.js"></script>
            <script src="/project_prospero/resources/js/daterangepicker.js"></script>
            <script src="/project_prospero/resources/js/bootstrap-datepicker.js"></script>
            <!-- ck editor -->
            <script type="text/javascript" src="resources/assets/ckeditor/ckeditor.js"></script>
            <!-- custom form component script for this page-->
            <script src="resources/js/form-component.js"></script>



            <script>
                $('#tanggalLila').datepicker({
                    format: 'yyyy-mm-d',
                    multidate: true
                });

                //knob
                $(function() {
                    $(".knob").knob({
                        'draw': function() {
                            $(this.i).val(this.cv + '%')
                        }
                    })
                });

                //carousel
                $(document).ready(function() {
                    $("#owl-slider").owlCarousel({
                        navigation: true,
                        slideSpeed: 300,
                        paginationSpeed: 400,
                        singleItem: true

                    });

                });

                //custom select box

                $(function() {
                    $('select.styled').customSelect();
                });

                /* ---------- Map ---------- */
                $(function() {
                    $('#map').vectorMap({
                        map: 'world_mill_en',
                        series: {
                            regions: [{
                                values: gdpData,
                                scale: ['#000', '#000'],
                                normalizeFunction: 'polynomial'
                            }]
                        },
                        backgroundColor: '#eef3f7',
                        onLabelShow: function(e, el, code) {
                            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                        }
                    });
                });
            </script>

    </body>

@endsection
