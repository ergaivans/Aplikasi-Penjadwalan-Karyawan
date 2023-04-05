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
                            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Pencatatan Target Sales</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                                <li><i class=""></i>Pencatatan</li>
                                <li><i class=""></i>Pencatatan Target Sales</li>
                            </ol>
                        </div>
                    </div>
                    {{-- <div class="panel-body">
                        <a href="tambahkarjad" class="btn btn-primary">
                            Tambah Kategori Jadwal
                        </a>
                    </div> --}}

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Form Pencatatan Target Sales
                                </header>
                                <div class="panel-body">
                                    {!! Form::open(['url' => '/tambahtargetsales', 'class' => 'form-horizontal']) !!}
                                    {!! Form::hidden('id_jadwal', $id_jadwal->MAX_ID_NUMBER) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal Target</label>
                                        <div class="col-sm-10">
                                            {!! Form::date('tanggal', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jumlah Target</label>
                                        <div class="col-sm-10">
                                            {!! Form::number('target', null, ['class' => 'form-control', 'min' => '0', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- Basic Forms & Horizontal Forms-->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">

                                <header class="panel-heading">
                                    Tabel Pencatatan Target Sales
                                </header>

                                <table class="table table-striped table-advance table-hover" style='table-layout: fixed'
                                    id="tabelku">
                                    <tbody>
                                        <tr>
                                            <th><i class="icon_profile"></i> No</th>
                                            <th><i class="icon_profile"></i> Tanggal</th>
                                            <th><i class="icon_calendar"></i> Target</th>
                                            {{-- <th><i class="icon_mail_alt"></i> Action </th> --}}
                                        </tr>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kams as $item)

                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $item->TANGGAL }}</td>
                                                <td>{{ $item->TARGET }}</td>
                                                {{-- <td>
                                                    <div class="">
                                                        <a class="btn btn-success"
                                                            href="editjadwal/{{ $item->ID_TASEL }}"><i
                                                                class="icon_check_alt2"></i></a>
                                                        <a class="btn btn-danger"
                                                            href="hapusjadwal/{{ $item->ID_TASEL }}"><i
                                                                class="icon_close_alt2"></i></a>
                                                    </div>
                                                </td> --}}
                                            </tr>

                                            @php
                                                $no++;
                                            @endphp


                                        @endforeach


                                    </tbody>
                                </table>
                                <ul class="pagination justify-content-center" style="margin-left: 12px">
                                    {{ $kams->links() }}
                                </ul>
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
