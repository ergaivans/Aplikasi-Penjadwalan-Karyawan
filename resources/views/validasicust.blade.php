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
                            <h3 class="page-header"><i class="icon_documents_alt"></i>Verifikasi UTJ</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                                <li><i class=""></i>Monitoring</li>
                                <li><i class=""></i>Monitoring Customer</li>
                                <li><i class=""></i>Verifikasi UTJ</li>
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
                                    {!! Form::open(['url' => '/masukvalidasicus', 'class' => 'form-horizontal']) !!}
                                    {!! Form::hidden('id_dc', $valid->ID_DETAILCUST) !!}
                                    {!! Form::hidden('id_customer', $valid->ID_CUSTOMER) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Customer</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_customer', $valid->NAMA_CUSTOMER, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Minat Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('minat', $valid->UNIT_MINAT, ['class' => 'form-control', 'autofocus', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jumlah Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('jumlah', $valid->JML_UNIT, ['class' => 'form-control', 'autofocus', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nominal Perencanaan</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nominal', $valid->NOMINAL, ['class' => 'form-control uang', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Realisasi Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('rl_unit', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Realisasi Jumlah Unit </label>
                                        <div class="col-sm-10">
                                            {!! Form::text('rl_jml', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Realisasi Nominal</label>
                                        <div class="col-sm-10">
                                            {!! Form::number('rl_nom', null, ['class' => 'form-control', 'id' => 'uangview_id', 'onkeyup' => 'sethelp()', 'autocomplete' => 'off']) !!}
                                        </div>
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <div id="uangHelp" class="form-text">Terbaca: (Rp-)</div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-sm-2 control-label">Realisasi Nominal</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('rl_nom', null, ['class' => 'form-control uang']) !!}
                                        </div>
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    {!! Form::close() !!}
                                </div>





                            </section>


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
            <script type="text/javascript" src="/project_prospero/resources/assets/ckeditor/ckeditor.js"></script>
            <!-- custom form component script for this page-->
            <script src="/project_prospero/resources/js/form-component.js"></script>
            <!-- custome script for all page -->
            <script src="/project_prospero/js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
            <script type="text/javascript">
                // $(document).ready(function($) {

                //     // Format mata uang.
                //     $('#uangview_id').mask('000,000,000,000,000,000,000,000.00', {
                //         reverse: false
                //     });

                // })

                function onlyNumberKey(evt) {
                    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                        return false;
                    } else {
                        return true;
                    }
                }

                function sethelp() {
                    uang = document.getElementById("uangview_id").value;
                    uang = uang.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    document.getElementById("uangHelp").innerHTML = "Terbaca: (Rp" + uang + ")";
                }
            </script>
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
