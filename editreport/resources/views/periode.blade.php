@extends('template/sidebar')
@section('content')

    <body>
        <section id="container" class="">
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="icon_star_alt"></i> Penilaian</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                                <li><i class=""></i>Penilaian</li>
                                <li><i class=""></i>Periode Penilaian</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{-- <section class="panel">
                                <header class="panel-heading">
                                    Form Periode Penilaian
                                </header>
                                <div class="panel-body">
                                    {!! Form::open(['url' => '/tambahkriteria', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">ID Periode</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_kriteria', $id_kriteria->MAX_ID_NUMBER, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Periode per-Tahun</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_kriteria', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jadwal</label>
                                        <div class="col-sm-10">
                                            <select name="" class="form-control m-bot15">
                                                <option selected disabled>-Pilih</option>
                                                <option value="Kanvasing">Januari - Maret</option>
                                                <option value="Flyering">April - Juni</option>
                                                <option value="Pameran">Juli - September</option>
                                                <option value="Open">Oktober - Desember</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary" style="margin-left: 17%">Simpan</button>
                                    {!! Form::close() !!}
                                </div>
                            </section> --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel Periode Penilaian
                                </header>
                                <nav class="nav navbar-nav " role="navigation">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-5" style="margin-top: 13px; margin-left: 20px">
                                                {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search-bisa', 'onkeyup' => 'cari()', 'placeholder' => 'Tahun']) !!}
                                            </div>
                                            <div class="col-lg-5">
                                                {!! Form::open(['url' => '/sembaranglah', 'id' => 'form_kategori_filter', 'class' => 'form-inline', 'style' => 'margin-top:12px; margin-left:10px']) !!}
                                                <select name="selector" class="form-control m-bot15"
                                                    onchange="ganti_jenis()" id="selector_id">
                                                    <option>--Pilih Bulan</option>
                                                    <option value="">Januari - Maret</option>
                                                    <option value="">April - Juni</option>
                                                    <option value="">Juli - September</option>
                                                    <option value="">Oktober - Desember</option>
                                                </select>
                                            </div>
                                            <script>
                                                var jenis = 1;

                                                function cari() {
                                                    // Declare variables
                                                    var input, filter, table, tr, td, i, txtValue, cat, id_table, id_search;
                                                    id_search = "search-bisa";
                                                    id_table = "tabelku";
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

                                                function ganti_jenis() {
                                                    document.getElementById("form_kategori_filter").submit();
                                                }
                                            </script>
                                        </div>
                                    </li>
                                </nav>
                                {!! Form::close() !!}

                                <table class="table table-striped table-advance table-hover" style='table-layout: fixed'>
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Karyawan</th>
                                            <th>Nama Karyawan</th>
                                            <th>Closing</th>
                                            <th>Walk in-1</th>
                                            <th>Walk in-2</th>
                                            <th>Jml. Cust.</th>
                                            <th>Agent Under</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kuy as $item)

                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $item->ID_KARYAWAN }}</td>
                                                <td>{{ $item->NAMA_KARYAWAN }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success">Rekap</button>
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
                </section>
            </section>
        </section>

        <!-- javascripts -->
        <script src="resources/js/jquery.js"></script>
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
