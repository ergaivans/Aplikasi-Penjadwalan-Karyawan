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
                            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Pencatatan Kriteria</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                <li><i class="icon_document_alt"></i>Pencatatan</li>
                                <li><i class="fa fa-file-text-o"></i>Pencatatan Kriteria</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Form Elements
                                </header>
                                <div class="panel-body">
                                    {!! Form::open(['url' => '/tambahkriteria', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Id Kriteria</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_kriteria',$id_kriteria->MAX_ID_NUMBER, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Kriteria</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_kriteria', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nilai Kriteria</label>
                                        <div class="col-sm-10">
                                            {!! Form::number('nilai', null, ['class' => 'form-control', 'min' => '0']) !!}
                                            {{-- {!! Form::text('nilai_kriteria', null, ['class' => 'form-control']) !!} --}}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    {!! Form::close() !!}



                                    {{-- <form class="form-horizontal " method="get">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id Karyawan</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Kriteria</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control">
                            </div>
                          </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nilai Kriteria </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
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
                                    Advanced Table
                                </header>

                                <table class="table table-striped table-advance table-hover" style='table-layout: fixed'>
                                    <tbody>
                                        <tr>
                                            <th><i class="icon_profile"></i> No</th>
                                            <th><i class="icon_profile"></i> ID Kriteria</th>
                                            <th><i class="icon_profile"></i> Nama Kriteria</th>
                                            <th><i class="icon_calendar"></i> Nilai Kriteria</th>
                                            <th><i class="icon_mail_alt"></i> Action </th>
                                        </tr>
                                         @php
                                $no = 1;
                            @endphp
                                @foreach ($kuy as $item)

                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$item->ID_KRITERIA}}</td>
                                        <td>{{$item->NAMA_KRITERIA}}</td>
                                        <td>{{$item->NILAI_KRITERIA}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                                <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
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
