@extends('template/sidebar_sales')
@section('content')

    <body>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_documents_alt"></i>Report Tidak Terjadwal </h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_sales">Halaman Utama</a></li>
                            <li><a>Report</a></li>
                            <li><a>Report Tidak Terjadwal</a></li>
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
                                        <label class="col-sm-2 control-label">ID Report</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_report', $ID_LAPORAN->MAX_ID_NUMBER, ['class' => 'form-control', 'placeholder' => 'ID_Report', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">ID Sales</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_karyawan', Session::get('user')[0], ['class' => 'form-control', 'placeholder' => 'ID Karyawan', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Sales</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_karyawan', Session::get('user')[1], ['class' => 'form-control', 'placeholder' => 'Nama Karyawan', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kegiatan</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('kegiatan', null, ['class' => 'form-control', 'placeholder' => 'Kegiatan', 'autofocus']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            {!! Form::date('tanggal', null, ['class' => 'form-control', 'placeholder' => 'Tanggal Kegiatan']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'placeholder' => 'Keterangan Kegiatan', 'autofocus']) !!}
                                        </div>
                                    </div>
                                    {!! Form::hidden('kehadiran', 0) !!}
                                    {{-- <div class="form-group">
                                        <label class="col-sm-2 control-label">Walk in</label>
                                        <div class="col-sm-10">
                                            <select name="kehadiran" class="form-control m-bot15">
                                                <option value="">Tidak Kantor</option>
                                                <option value="1">WI-1</option>
                                                <option value="2">WI-2</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- </form> --}}

                                    <!--
                                                                                            <div class="control-group after-add-more">
                                                                                                                                                                                                                                                                                                                                </div> -->
                                    <!-- <div class="form-group">
                                                                                            <label class="col-sm-2 control-label">Nama</label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text" name="nama[]" class="form-control">
                                                                                            </div>
                                                                                        </div> -->
                                    <!-- <div class="form-group">
                                                                                            <label class="col-sm-2 control-label">No. Telepon</label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text" name="notelp[]" class="form-control">
                                                                                            </div>
                                                                                        </div> -->
                                    <!-- <div class="form-group">
                                                                                            <label class="col-sm-2 control-label">Sumber Didapat</label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text" name="sumber[]" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <input type="hidden" value="0" name="jenis[]" class="form-control"> -->


                                    <!-- {{-- {!! Form::text('id_customer[]',$ID_CUSTOMER->MAX_ID_NUMBER,['class' => 'form-control', 'placeholder' => 'ID_Customer','readonly']) !!} --}}
                                                                                        <br>

                                                                                        <hr>
                                                                                    </div> -->
                                    <!-- <div class="copy hide">
                                                                                                    <div class="control-group">                                                                                                                                                                                                                                </div> -->

                                    <!-- <div class="form-group">
                                                                                                <label class="col-sm-2 control-label">Nama</label>
                                                                                                <div class="col-sm-10">
                                                                                                    <input type="text" name="nama[]" class="form-control">
                                                                                                </div>
                                                                                            </div> -->
                                    <!-- <div class="form-group">
                                                                                                <label class="col-sm-2 control-label">No. Telepon</label>
                                                                                                <div class="col-sm-10">
                                                                                                    <input type="text" name="notelp[]" class="form-control">
                                                                                                </div>
                                                                                            </div> -->
                                    <!-- <div class="form-group">
                                                                                                <label class="col-sm-2 control-label">Sumber Didapat</label>
                                                                                                <div class="col-sm-10">
                                                                                                    <input type="text" name="sumber[]" class="form-control">
                                                                                                </div>
                                                                                            </div> -->
                                    <!-- <input type="hidden" value="0" name="jenis[]" class="form-control">
                                                                                            <br>
                                                                                            <button class="btn btn-danger remove" type="button"><i
                                                                                                    class="glyphicon glyphicon-remove"></i> Remove</button>
                                                                                            <hr> -->
                                    <!-- </div>
                                                                                    </div> -->
                                    <!-- Buttons -->
                                    <div class="form-group">
                                        <!-- Buttons -->
                                        <div class="col-lg-offset-2 col-lg-9">
                                            <!-- <button class="btn btn-success add-more" type="button">
                                                                                                            <i class="glyphicon glyphicon-plus"></i>Tambah Form Input Customer
                                                                                                        </button> -->
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
        <!-- container section end -->
        <!-- javascripts -->
        <script src="resources/js/jquery.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <!-- nicescroll -->
        <script src="resources/js/jquery.scrollTo.min.js"></script>
        <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="resources/js/scripts.js"></script>
    </body>

@endsection
