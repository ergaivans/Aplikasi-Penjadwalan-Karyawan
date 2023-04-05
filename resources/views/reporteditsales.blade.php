@extends('template/sidebar_sales')
@section('content')

    <body>

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

                <div class="row">


                    <div class="col-md-12 portlets">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-left">Tinjau Report</div>
                                <div class="widget-icons pull-right">
                                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div class="padd">
                                    {!! Form::open(['url' => '/proseseditreportharian', 'class' => 'form-horizontal']) !!}
                                    <div class="form quick-post">
                                        <!-- Edit profile form (not working)-->
                                        <form class="form-horizontal">
                                            <!-- Title -->
                                            <div class="form-group">
                                                <label class="control-label col-lg-2" for="title">ID_Report Harian</label>
                                                <div class="col-lg-10">
                                                    {!! Form::text('id_laporan', $laporan->ID_LAPORAN, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2" for="title">ID Karyawan</label>
                                                <div class="col-lg-10">
                                                    {!! Form::text('id_karyawan', Session::get('user')[0], ['class' => 'form-control', 'placeholder' => 'ID Karyawan', 'autofocus', 'readonly']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-lg-2" for="title">Nama Karyawan</label>
                                                <div class="col-lg-10">
                                                    {!! Form::text('nama_karyawan', Session::get('user')[1], ['class' => 'form-control', 'placeholder' => 'Nama Karyawan', 'autofocus', 'readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2" for="title">Kegiatan</label>
                                                <div class="col-lg-10">
                                                    {!! Form::text('kegiatan', $laporan->KEGIATAN, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <!-- Date Picker -->
                                            <div class="form-group">
                                                <label class="control-label  col-lg-2">Tanggal</label>
                                                <div class="col-lg-10">
                                                    {!! Form::date('tanggal', $laporan->TANGGAL_LAPORAN, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                @if ($laporan->WI == '0')
                                                    <label class="col-sm-2 control-label">Walk In</label>
                                                    <div class="col-sm-10">
                                                        {!! Form::text('jenis', 'Tidak Kantor', ['class' => 'form-control', 'readonly']) !!}
                                                        {{-- <input type="text" class="form-control"> --}}
                                                    </div>
                                                @else
                                                    <label class="col-sm-2 control-label">Walk In</label>
                                                    <div class="col-sm-10">
                                                        {!! Form::text('jenis', $laporan->WI, ['class' => 'form-control']) !!}
                                                        {{-- <input type="text" class="form-control"> --}}
                                                    </div>
                                                @endif

                                            </div>
                                            <!-- Ckeditor -->
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Keterangan</label>
                                                <div class="col-sm-10">
                                                    {{-- <text class="form-control ckeditor" name="editor1"rows="0"></textarea> --}}
                                                    {!! Form::textarea('keterangan', $laporan->KETERANGAN, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <br>

                                            <!-- Buttons -->
                                            <div class="form-group">
                                                <!-- Buttons -->
                                                <div class="col-lg-offset-2 col-lg-9">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <a href="tambahcustomer/{{ $laporan->ID_LAPORAN }}"
                                                        class="btn btn-warning">
                                                        Tambah Customer
                                                    </a>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </form>
                                    </div>


                                </div>
                                <div class="widget-foot">
                                    <!-- Footer goes here -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- project team & activity end -->

            </section>




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
