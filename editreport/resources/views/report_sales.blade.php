@extends('template/sidebar_sales')
@section('content')

<body>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> Halaman Utama</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Beranda</a></li>
                        {{-- <li><i class="fa fa-laptop"></i>Dashboard</li> --}}
                    </ol>
                </div>
            </div>

            <div class="col-lg-12">
                <!--Project Activity start-->
                <section class="panel">
                    <div class="panel-body progress-panel">
                        <div class="row">
                            <div class="col-lg-8 task-progress pull-left">
                                <h1>Rincian Kerja Setiap Hari</h1>
                            </div>
                            <div class="col-lg-4">
                                <span class="profile-ava pull-right">
                                    <img alt="" class="simple" src="img/avatar1_small.jpg">
                                    {{ Session::get('user')[1] }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('messages'))
            <span class="label label-success">{{Session::get('messages')}}</span>
            @endif
            <table class="table table-hover personal-task">
                <thead>
                    <tr>
                                <th><i class="icon_profile"></i> Nama Sales</th>
                                <th><i class="icon_profile"></i> Kegiatan</th>
                                <th><i class="icon_calendar"></i>Tanggal Kegiatan</th>
                                <th><i class="icon_mail_alt"></i> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $item )
                    <tr>
                                    <td>{{ $item->NAMA_KARYAWAN }}</td>
                                    <td>{{ $item->JADWAL }}</td>
                                    <td>{{ $item->TANGGAL }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="reportjadwal/{{$item->ID_JADWAL}}">Report</a>
                                        </div>
                                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                </section>
                <!--Project Activity end-->
            </div>
        </div><br><br>






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




    <!-- jquery ui -->
    <script src="resources/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom checkbox & radio-->
    <script type="resources/text/javascript" src="js/ga.js"></script>
    <!--custom switch-->
    <script src="resources/js/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="resources/js/jquery.tagsinput.js"></script>

    <!-- colorpicker -->

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
    <script src="resources/js/scripts.js"></script>
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

