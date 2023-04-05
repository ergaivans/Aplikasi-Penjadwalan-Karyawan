@extends('template/sidebar_man')
@section('content')

    <body>
        <!--main content start-->
        <section id="container" class="">
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Pencatatan Target</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index_mana">Halaman Utama</a></li>
                                <li><i class=""></i>Perizinan</li>
                                <li><i class=""></i>Pencatatan Target</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Tabel Pencatatan Target
                                            </header>

                                            <table class="table table-striped table-advance table-hover"
                                                style='table-layout: fixed'>
                                                <tbody>
                                                    <tr>
                                                        <th><i class=""></i>No</th>
                                                        <th><i class=""></i>Tanggal Target</th>
                                                        <th><i class=""></i>Jumlah Target</th>
                                                        <th><i class=""></i>Status</th>
                                                        <th><i class=""></i>Aksi</th>
                                                    </tr>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($kuy as $item)

                                                        <tr>
                                                            <td>{{ $no }}</td>
                                                            <td>{{ $item->TANGGAL_TARGET }}</td>
                                                            <td>{{ $item->TARGET }}</td>
                                                            @if ($item->STATUS == 1)
                                                                <td>Aktif</td>
                                                                <td>
                                                                    <a class="btn btn-success"
                                                                        href="viewedittargetman/{{ $item->TG }}"><i
                                                                            class="icon_pencil-edit"></i>
                                                                        Ubah</a>
                                                                    {{-- <a class="btn btn-success"
                                                                        href="viewedittargetman/{{ $item->TG }}"><i></i>Edit
                                                                        Target</a> --}}
                                                                    <a class="btn btn-danger"
                                                                        href="hapustargetman/{{ $item->TG }}"
                                                                        style="margin-left: 5px"><i></i>Non-Aktif</a>
                                                                </td>
                                                            @elseif ($item->STATUS == 0)
                                                                <td>Menunggu Persetujuan</td>
                                                                <td>

                                                                    <a class="btn btn-success" style="padding-right: 29px"
                                                                        href="ubahstatustarget/{{ $item->TG }}">Aktivasi</a>
                                                                    <a class="btn btn-danger"
                                                                        href="hapustargetman/{{ $item->TG }}">Non-Aktif</a>

                                                                </td>
                                                            @elseif ($item->STATUS == 2)
                                                                <td>Non-Aktif</td>
                                                                <td><a class="btn btn-success" style="padding-right: 29px"
                                                                        href="ubahstatustarget/{{ $item->TG }}">Aktivasi</a>
                                                                </td>
                                                            @endif

                                                            <!-- <td>
                                                                                                                                                                                                                                                        <div class="btn-group">
                                                                                                                                                                                                                                                            <a class="btn btn-success" href="ubahstatustarget/{{ $item->TANGGAL_TARGET }}"><i class="icon_check_alt2"></i></a>
                                                                                                                                                                                                                                                            <a class="btn btn-danger" href="hapustarget/{{ $item->TANGGAL_TARGET }}"><i class="icon_close_alt2"></i></a>
                                                                                                                                                                                                                                                        </div>
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
                                </div>


                        </div>
                </section>
                </div>
                </div>
                <!-- Basic Forms & Horizontal Forms-->



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
