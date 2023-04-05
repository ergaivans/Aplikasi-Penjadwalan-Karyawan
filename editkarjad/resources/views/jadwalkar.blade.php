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
                            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Pencatatan Jadwal</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                <li><i class="icon_document_alt"></i>Pencatatan</li>
                                <li><i class="fa fa-file-text-o"></i>Pencatatan jadwal</li>
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
                                    {!! Form::open(['url' => '/tambahjadwal', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">ID Tanggal</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_jadwal', $id_jadwal->MAX_ID_NUMBER, ['class' => 'form-control', 'readonly']) !!}
                                            {{-- <input type="text" class="form-control"> --}}
                                        </div>
                                    </div>
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
                                            {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jadwal</label>
                                        <div class="col-sm-10">
                                            <select name="jenis" class="form-control m-bot15">
                                                <option value="Kantor">Kantor</option>
                                                <option value="Kanvasing">Kanvasing</option>
                                                <option value="Flyering">Flyering</option>
                                                <option value="Pameran">Pameran</option>
                                                <option value="Open">Open Table</option>
                                                <option value="Off">Libur</option>
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
                                    <button type="submit" class="btn btn-primary">Submit</button>

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
                          <select class="form-control m-bot15">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>

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
                                    Advanced Table

                                </header>

                                <nav class="nav navbar-nav " role="navigation">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-5"> {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search-bisa', 'onkeyup' => 'cari()', 'placeholder' => 'Nama Karyawan kntr']) !!}</div>
                                            <div class="col-lg-5">
                                                {!! Form::open(['url' => '/sembaranglah', 'id' => 'form_kategori_filter', 'class' => 'form-inline', 'style' => 'margin-top:12px; margin-left:10px']) !!}
                                                <select name="selector" class="form-control m-bot15"
                                                    onchange="ganti_jenis()" id="selector_id">
                                                    <option>--Pilih</option>
                                                    <option value="Kantor">Kantor</option>
                                                    <option value="Kanvasing">Kanvasing</option>
                                                    <option value="Flyering">Flyering</option>
                                                    <option value="Pameran">Pameran</option>
                                                    <option value="Open">Open</option>
                                                    <option value="Off">Off</option>
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

                                    <!-- Brand and toggle get grouped for better mobile display -->

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                </nav>
                                {!! Form::close() !!}


                                <table class="table table-striped table-advance table-hover" style='table-layout: fixed' id="tabelku">
                                    <tbody>
                                        <tr>
                                            <th><i class="icon_profile"></i> No</th>
                                            <th><i class="icon_profile"></i> Nama Sales</th>
                                            <th><i class="icon_profile"></i> Kegiatan</th>
                                            <th><i class="icon_calendar"></i>Tanggal Kegiatan</th>
                                            <th><i class="icon_mail_alt"></i> Action </th>
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
                                                    <div class="btn-group">
                                                        <a class="btn btn-success" href="#"><i
                                                                class="icon_check_alt2"></i></a>
                                                        <a class="btn btn-danger" href="#"><i
                                                                class="icon_close_alt2"></i></a>
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
                    {{-- <div class="col-lg-6">
                    <!--Project Activity start-->
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="row">
                                <div class="col-lg-8 task-progress pull-left">
                                    <h1>Trancking Pekerjaan Sales</h1>
                                </div>
                                <div class="col-lg-4">
                                    <span class="profile-ava pull-right">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        {{ Session::get('user')[1] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover personal-task">
                            <tbody>
                                <tr>
                                    <td>Today</td>
                                    <td>
                                        web design
                                    </td>
                                    <td>
                                        <span class="badge bg-important">Upload</span>
                                    </td>
                                    <td>
                                        <span class="profile-ava">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Yesterday</td>
                                    <td>
                                        Project Design Task
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Task</span>
                                    </td>
                                    <td>
                                        <div id="work-progress2"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>21-10-14</td>
                                    <td>
                                        Generate Invoice
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Task</span>
                                    </td>
                                    <td>
                                        <div id="work-progress3"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>22-10-14</td>
                                    <td>
                                        Project Testing
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">To-Do</span>
                                    </td>
                                    <td>
                                        <span class="profile-ava">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>24-10-14</td>
                                    <td>
                                        Project Release Date
                                    </td>
                                    <td>
                                        <span class="badge bg-info">Milestone</span>
                                    </td>
                                    <td>
                                        <div id="work-progress4"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>28-10-14</td>
                                    <td>
                                        Project Release Date
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">To-Do</span>
                                    </td>
                                    <td>
                                        <div id="work-progress5"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last week</td>
                                    <td>
                                        Project Release Date
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">To-Do</span>
                                    </td>
                                    <td>
                                        <div id="work-progress1"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>last month</td>
                                    <td>
                                        Project Release Date
                                    </td>
                                    <td>
                                        <span class="badge bg-success">To-Do</span>
                                    </td>
                                    <td>
                                        <span class="profile-ava">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                    <!--Project Activity end-->
                </div> --}}

                    {{-- <div class="col-md-6 portlets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-left">Quick Post</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="padd">

                                <div class="form quick-post">
                                    <!-- Edit profile form (not working)-->
                                    <form class="form-horizontal">
                                        <!-- Title -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Title</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="title">
                                            </div>
                                        </div>
                                        <!-- Content -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="content">Content</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" id="content"></textarea>
                                            </div>
                                        </div>
                                        <!-- Cateogry -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Category</label>
                                            <div class="col-lg-10">
                                                <select class="form-control">
                                                    <option value="">- Choose Cateogry -</option>
                                                    <option value="1">General</option>
                                                    <option value="2">News</option>
                                                    <option value="3">Media</option>
                                                    <option value="4">Funny</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Tags -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="tags">Tags</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="tags">
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="form-group">
                                            <!-- Buttons -->
                                            <div class="col-lg-offset-2 col-lg-9">
                                                <button type="submit" class="btn btn-primary">Publish</button>
                                                <button type="submit" class="btn btn-danger">Save Draft</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                            <div class="widget-foot">
                                <!-- Footer goes here -->
                            </div>
                        </div>
                    </div>

                </div> --}}

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
