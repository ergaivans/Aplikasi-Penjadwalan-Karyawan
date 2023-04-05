@extends('template/sidebar_sales')
@section('content')

<body>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_documents_alt"></i> Report Harian </h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Beranda/Report/Report Harian</a></li>
                        {{-- <li><i class="fa fa-laptop"></i>Dashboard</li> --}}
                    </ol>
                </div>
            </div>

            <div class="row">


                <div class="col-md-12 portlets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-left">Form Report Harian</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="padd">
                                {{-- <form class="form-horizontal"> --}}
                                    {!! Form::open(['url' => '/proses_reportharian_sales', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Id Report</label>
                                      <div class="col-sm-10">
                                        {!! Form::text('id_report',$ID_LAPORAN->MAX_ID_NUMBER,['class' => 'form-control', 'placeholder' => 'ID_Report','readonly']) !!}
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Id Karyawan</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_karyawan',Session::get('user')[0],['class' => 'form-control', 'placeholder' => 'ID Karyawan','readonly']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Karyawan</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_karyawan',Session::get('user')[1],['class' => 'form-control', 'placeholder' => 'Nama Karyawan', 'readonly']) !!}
                                      </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Kegiatan</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('kegiatan', null, ['class' => 'form-control', 'placeholder' => 'Kegiatan','autofocus']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            {!! Form::date('tanggal',$jadwal->TANGGAL, ['class' => 'form-control', 'placeholder' => 'Tanggal Kegiatan']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            {!! Form::textarea('keterangan', null, ['class' => 'form-control' ,'placeholder' => 'Keterangan Kegiatan', 'autofocus']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">dokumentasi</label>
                                        <div class="col-sm-10">
                                            {!! Form::file('dokumentasi', null, ['class' => 'form-control', 'placeholder' => 'dokumentasi', 'autofocus']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">prospek</label>
                                        {{-- <div class="col-sm-10">
                                         {!! Form::text('jumlahcustomer', belumtaugimana, ['class' => 'form-control', 'placeholder' => 'Jumlah Customer', 'autofocus']) !!}
                                        </div> --}}
                                      </div>
                                  {{-- </form> --}}


                                        <div class="control-group after-add-more">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">ID Customer</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="id_customer[]" class="form-control"  value="{{ $ID_CUSTOMER->MAX_ID_NUMBER }}" readonly>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama[]" class="form-control">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">No. Telepon</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="notelp[]" class="form-control">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="alamat[]" class="form-control">
                                                </div>
                                              </div>


                                            {{-- {!! Form::text('id_customer[]',$ID_CUSTOMER->MAX_ID_NUMBER,['class' => 'form-control', 'placeholder' => 'ID_Customer','readonly']) !!} --}}
                                            <br>

                                            <hr>
                                          </div>
                                          <div class="copy hide">
                                            <div class="control-group">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">ID Customer</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="id_customer[]" class="form-control"  value="{{ $ID_CUSTOMER->MAX_ID_NUMBER }}" >
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-sm-2 control-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="nama[]" class="form-control">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-sm-2 control-label">No. Telepon</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="notelp[]" class="form-control">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-sm-2 control-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="alamat[]" class="form-control">
                                                    </div>
                                                  </div>
                                              <br>
                                              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                              <hr>
                                            </div>
                                          </div>
                                        <!-- Buttons -->
                                        <div class="form-group">
                                            <!-- Buttons -->
                                            <div class="col-lg-offset-2 col-lg-9">
                                                <button class="btn btn-success add-more" type="button">
                                                    <i class="glyphicon glyphicon-plus"></i>Tambah Form Input Customer
                                                  </button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                {{-- <button type="submit" class="btn btn-danger">Save Draft</button>
                                                <button type="reset" class="btn btn-default">Reset</button> --}}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    {{-- </form> --}}

                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <!-- statics end -->




            <!-- project team & activity start -->
            <div class="row">
                {{-- <div class="col-md-4 portlets">
                <!-- Widget -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-left">Message</div>
                        <div class="widget-icons pull-right">
                            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                        <!-- Widget content -->
                        <div class="padd sscroll">

                            <ul class="chats">

                                <!-- Chat by us. Use the class "by-me". -->
                                <li class="by-me">
                                    <!-- Use the class "pull-left" in avatar -->
                                    <div class="avatar pull-left">
                                        <img src="img/user.jpg" alt="" />
                                    </div>

                                    <div class="chat-content">
                                        <!-- In meta area, first include "name" and then "time" -->
                                        <div class="chat-meta">John Smith <span class="pull-right">3
                                                hours ago</span></div>
                                        Vivamus diam elit diam, consectetur dapibus adipiscing elit.
                                        <div class="clearfix"></div>
                                    </div>
                                </li>

                                <!-- Chat by other. Use the class "by-other". -->
                                <li class="by-other">
                                    <!-- Use the class "pull-right" in avatar -->
                                    <div class="avatar pull-right">
                                        <img src="img/user22.png" alt="" />
                                    </div>

                                    <div class="chat-content">
                                        <!-- In the chat meta, first include "time" then "name" -->
                                        <div class="chat-meta">3 hours ago <span
                                                class="pull-right">Jenifer Smith</span></div>
                                        Vivamus diam elit diam, consectetur fconsectetur dapibus adipiscing
                                        elit.
                                        <div class="clearfix"></div>
                                    </div>
                                </li>

                                <li class="by-me">
                                    <div class="avatar pull-left">
                                        <img src="img/user.jpg" alt="" />
                                    </div>

                                    <div class="chat-content">
                                        <div class="chat-meta">John Smith <span class="pull-right">4
                                                hours ago</span></div>
                                        Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus
                                        consectetur dapibus adipiscing elit.
                                        <div class="clearfix"></div>
                                    </div>
                                </li>

                                <li class="by-other">
                                    <!-- Use the class "pull-right" in avatar -->
                                    <div class="avatar pull-right">
                                        <img src="img/user22.png" alt="" />
                                    </div>

                                    <div class="chat-content">
                                        <!-- In the chat meta, first include "time" then "name" -->
                                        <div class="chat-meta">3 hours ago <span
                                                class="pull-right">Jenifer Smith</span></div>
                                        Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus
                                        consectetur dapibus adipiscing elit.
                                        <div class="clearfix"></div>
                                    </div>
                                </li>

                            </ul>

                        </div>
                        <!-- Widget footer -->
                        <div class="widget-foot">

                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        placeholder="Type your message here...">
                                </div>
                                <button type="submit" class="btn btn-info">Send</button>
                            </form>


                        </div>
                    </div>


                </div>
            </div> --}}

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
                                    <th>Tanggal</th>
                                    <th>Kegiatan</th>
                                    <th>Keterangan</th>
                                     <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $data)
                                <tr>
                                    <td>{{$data->TANGGAL_LAPORAN}}</td>
                                    <td>
                                        {{$data->KEGIATAN}}
                                    </td>
                                    <td>
                                        {{$data->KETERANGAN}}
                                    </td>
                                    <td>
                                        <th><a href="editreportharian/{{$data->ID_LAPORAN}}" class="btn btn-warning" style="margin-right: 8px">Edit</a><a href="hapusreportharian/{{$data->ID_LAPORAN}}" class="btn btn-danger" style="margin-right: 8px">Hapus</a></th>
                                    </td>

                                    {{-- <td>
                                        <span class="profile-ava">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        </span>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                    <!--Project Activity end-->
                </div>
                {{-- @stop --}}
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
        <script type="text/javascript">
            $(document).ready(function() {
              $(".add-more").click(function(){
                  var html = $(".copy").html();
                  $(".after-add-more").after(html);
              });


              // saat tombol remove dklik control group akan dihapus
              $("body").on("click",".remove",function(){
                  $(this).parents(".control-group").remove();
              });
            });
        </script>


</body>

@endsection

