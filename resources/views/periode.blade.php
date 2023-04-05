@extends('template/sidebar')
@section('content')

    <body>
        <section id="container" class="">
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="icon-calendar-l"></i> Periode Penilaian</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                                <li><i class=""></i>Penilaian</li>
                                <li><i class=""></i>Periode Penilaian</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <nav class="nav navbar-nav " role="navigation">
                            <li>
                                <div>
                                    {!! Form::open(['url' => '/periode-penilaian/filter-periode', 'id' => 'filter-periode', 'class' => 'form-inline', 'style' => 'margin-top:12px']) !!}
                                    <div class="col-lg-6">
                                        <label class=" " style="font-weight: bold">Tanggal Awal</label>
                                        {!! Form::date('tanggal_awal', null, ['class' => 'form-control', 'id' => 'id_awal', 'onchange' => 'chk_range()']) !!}
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="" style="font-weight: bold">Tanggal
                                            Akhir</label>
                                        {!! Form::date('tanggal_akhir', null, ['class' => 'form-control', 'id' => 'id_akhir', 'onchange' => 'chk_range()']) !!}
                                    </div>
                                    <input type="hidden" name="var_target" id="id_target" value="">
                                    {!! Form::close() !!}
                                </div>
                            </li>
                        </nav>
                        {!! Form::close() !!}

                        <script>
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
                                        bulan = (akhir.getMonth() - awal.getMonth()) * 100;
                                        if (bulan == 0) {
                                            bulan = 100;
                                        }
                                        document.getElementById('id_target').value = bulan;
                                        document.getElementById('filter-periode').submit();
                                    }
                                }
                            }
                        </script>
                    </div>
                    <br>

                    {{-- <div class="form-group">
                        <label class="control-label">
                            *Catatan: Pilih tanggal awal dan tanggal akhir terlebih dahulu untuk rekap Excel.
                        </label>
                    </div> --}}

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel Periode Penilaian
                                </header>
                                <table class="table table-striped table-advance table-hover" style='table-layout: fixed'>
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Sales in House</th>
                                            <th>Closing</th>
                                            <th>Closing Agent Under</th>
                                            <th>Walk in-1</th>
                                            <th>Database Konsumen</th>
                                            <th>Total Nilai</th>
                                            <th>Gap</th>
                                            <th>Target</th>
                                            <th>Kategori</th>
                                        </tr>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kuy as $item)
                                            @foreach ($target_data as $target)
                                                @if ($target->ID_KATEGORI == 'KP_001') @php $a = $target->TARGET_KATEGORI @endphp @endif
                                                @if ($target->ID_KATEGORI == 'KP_002') @php $b = $target->TARGET_KATEGORI @endphp @endif
                                                @if ($target->ID_KATEGORI == 'KP_003') @php $c = $target->TARGET_KATEGORI @endphp @endif
                                                @if ($target->ID_KATEGORI == 'KP_004') @php $d = $target->TARGET_KATEGORI @endphp @endif
                                            @endforeach
                                            @php
                                                $closings = ((($item->CLOSING / $a) * 100) / 100) * 50;
                                                $closingau = ((($item->CLOSING_AGENT_UNDER_TOTAL / $b) * 100) / 100) * 25;
                                                $walkin = ((($item->TOTAL_WI / $c) * 100) / 100) * 15;
                                                $database = ((($item->PELANGGAN / $d) * 100) / 100) * 10;
                                                $total = round($closings) + round($closingau) + round($walkin) + round($database);
                                                $nilai = round(($total / $targetpertahun) * 100);
                                                $gap = round(100 - ($total / $targetpertahun) * 100);
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $item->NAMA_KARYAWAN }}</td>
                                                <td>{{ $item->CLOSING }}</td>
                                                <td>{{ $item->CLOSING_AGENT_UNDER_TOTAL }}</td>
                                                <td>{{ $item->TOTAL_WI }}</td>
                                                <td>{{ $item->PELANGGAN }}</td>
                                                <td>{{ $total }}</td>
                                                <td>{{ $gap }}%</td>
                                                <td>{{ $targetpertahun }}</td>
                                                <td>@php
                                                    foreach ($skala as $skalaNilai) {
                                                        if ($gap >= $skalaNilai->SKALA_BAWAH && $gap <= $skalaNilai->SKALA_ATAS) {
                                                            echo $skalaNilai->KET_SKALA;
                                                        }
                                                    }
                                                    if ($gap > 100) {
                                                        echo 'Excellent';
                                                    }
                                                @endphp</td>
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
                    <div class="col-lg-12">
                        {{-- <a class="btn btn-success" style="margin-left: 10px" href="exportpenilaian">
                            Export Excel
                        </a> --}}
                        @if (isset($var_tgl_awal))
                            <a class="btn btn-danger" style="margin-left: 2px" href="./">
                                kembali
                            </a>
                            {{-- <button class="btn btn-success" style="margin-left: 10px" onclick="exksportExcel()"
                                href="exportpenilaian">
                                Export Excel
                            </button> --}}
                            {{-- <button class="btn btn-warning" id='btnSimpan'>
                                Simpan
                            </button> --}}
                            <label style="margin-left: 1%; text-decoration: none; color: black;">
                                Data Tanggal: <b>{{ $var_tgl_awal }}</b> s.d. <b>{{ $var_tgl_akhir }}</b>
                            </label>
                            {!! Form::open(['url' => '/eksportExcel', 'class' => 'form-validate form-horizontal', 'id' => 'tgl_form']) !!}
                            <input type="hidden" name="var_tgl_awal" value="{{ $var_tgl_awal }}">
                            <input type="hidden" name="var_tgl_akhir" value="{{ $var_tgl_akhir }}">
                            {!! Form::close() !!}
                        @endif
                    </div>
                </section>
            </section>
        </section>

        <!-- javascripts -->
        <script src="/project_prospero/resources/js/jquery.js"></script>
        <script src="resources/js/jquery-ui-1.10.4.min.js"></script>
        <script src="resources/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="resources/js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="resources/js/jquery.scrollTo.min.js"></script>
        <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="resources/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="resources/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="resources/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="resources/js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <<script src="resources/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
            <script src="resources/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
            <!--script for this page only-->
            <script src="resources/js/calendar-custom.js"></script>
            <script src="resources/js/jquery.rateit.min.js"></script>
            <!-- custom select -->
            <script src="resources/js/jquery.customSelect.min.js"></script>
            <script src="resources/assets/chart-master/Chart.js"></script>
            <!-- jquery ui -->
            <script src="resources/js/jquery-ui-1.9.2.custom.min.js"></script>
            <!--custome script for all page-->
            <script src="resources/js/scripts.js"></script>
            <!-- custom script for this page-->
            <script src="resources/js/sparkline-chart.js"></script>
            <script src="resources/js/easy-pie-chart.js"></script>
            <script src="resources/js/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="resources/js/jquery-jvectormap-world-mill-en.js"></script>
            <script src="resources/js/xcharts.min.js"></script>
            <script src="resources/js/jquery.autosize.min.js"></script>
            <script src="resources/js/jquery.placeholder.min.js"></script>
            <script src="resources/js/gdp-data.js"></script>
            <script src="resources/js/morris.min.js"></script>
            <script src="resources/js/sparklines.js"></script>
            <script src="resources/js/charts.js"></script>
            <script src="resources/js/jquery.slimscroll.min.js"></script>

            <!--custom checkbox & radio-->
            <script type="text/javascript" src="resources/js/ga.js"></script>
            <!--custom switch-->
            <script src="resources/js/bootstrap-switch.js"></script>
            <!--custom tagsinput-->
            <script src="resources/js/jquery.tagsinput.js"></script>

            <!-- bootstrap-wysiwyg -->
            <script src="resources/js/jquery.hotkeys.js"></script>
            <script src="resources/js/bootstrap-wysiwyg.js"></script>
            <script src="resources/js/bootstrap-wysiwyg-custom.js"></script>
            <script src="resources/js/moment.js"></script>
            <script src="resources/js/bootstrap-colorpicker.js"></script>
            <script src="resources/js/daterangepicker.js"></script>
            <script src="resources/js/bootstrap-datepicker.js"></script>
            <!-- ck editor -->
            <script type="text/javascript" src="resources/assets/ckeditor/ckeditor.js"></script>
            <!-- custom form component script for this page-->
            <script src="resources/js/form-component.js"></script>
            <!-- custome script for all page -->
            <script src="js/scripts.js"></script>

            <script>
                function eksportExcel() {
                    document.getElementById('tgl_form').submit();
                }
            </script>
    </body>



@endsection
