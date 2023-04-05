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
                            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Validasi Customer</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                <li><i class="icon_document_alt"></i>Monitoring</li>
                                <li><i class="fa fa-file-text-o"></i>Monitoring Customer</li>
                                <li><i class="fa fa-file-text-o"></i>Validasi Customer</li>
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
                                    {!! Form::open(['url' => '/updatemasukvalidasicus', 'class' => 'form-horizontal']) !!}
                                    {!! Form::hidden('id_dc', $valid->ID_DETAILCUST) !!}
                                    {!! Form::hidden('id_customer', $valid->ID_CUSTOMER) !!}
                                    {!! Form::hidden('rl_jml', 1) !!}
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
                                        <label class="col-sm-2 control-label">TOWER</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('tower', $valid->TOWER, ['class' => 'form-control', 'autofocus', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Lantai Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('lantai', $valid->LANTAI_UNIT, ['class' => 'form-control', 'autofocus', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nomor Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('ket_unit', $valid->KETERANGAN_UNIT, ['class' => 'form-control', 'autofocus', 'readonly']) !!}
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
                                            <select name="rl_unit" id="unit" class="form-control m-bot15">
                                                <optgroup label="FORTUNA">
                                                    <option value="studio">Studio
                                                    </option>
                                                    <option value="1-BR-A">1-BR-A
                                                    </option>
                                                    <option value="1-BR-B">1-BR-B
                                                    </option>
                                                    <option value="2-BR">2-BR</option>
                                                </optgroup>
                                                <optgroup label="BEATUS">
                                                    <option value="Studio">Studio</option>
                                                    <option value="STUDIO MAXXIS A">STUDIO MAXXIS A</option>
                                                    <option value="STUDIO MAXXIS B">STUDIO MAXXIS B</option>
                                                    <option value="2-BR-A">2-BR-A</option>
                                                    <option value="2-BR-B">2-BR-B</option>
                                                    <option value="3-BR">3-BR</option>
                                                </optgroup>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tower</label>
                                        <div class="col-sm-10">
                                            <select name="rl_tower" id="unit" class="form-control m-bot15">
                                                <option value="">Pilih Tower
                                                </option>
                                                <option value="Fortuna">Fortuna
                                                </option>
                                                <option value="Beatus">Beatus
                                                </option>
                                            </select>
                                            <!-- {!! Form::text('tower', null, ['class' => 'form-control', 'id' => 'inputTower']) !!} -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Realisasi Lantai Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('rl_lantai', $valid->REALISASI_LANTAI, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Realisasi No Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('rl_ket_unit', $valid->REALISASI_KET_UNIT, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Tanggal UTJ</label>
                                        <div class="col-lg-10">
                                            {!! Form::date('tanggal', $valid->TANGGAL_REALISASI, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Omset Kontrak</label>
                                        <div class="col-sm-10">
                                            {!! Form::number('rl_nom', $valid->REALISASI_NOMINAL, ['class' => 'form-control', 'id' => 'uangview_id', 'onkeyup' => 'sethelp()', 'autocomplete' => 'off', 'required']) !!}
                                        </div>
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <div id="uangHelp" class="form-text">Terbaca: (Rp-)</div>
                                        </div>
                                    </div>
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