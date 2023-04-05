@extends('template/sidebar_sales')
@section('content')

    <body>

        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i>Draft Report Sales</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_sales">Halaman Utama</a></li>
                            <li><a>Report</a></li>
                            <li><a>Report Tidak Terjadwal</a></li>
                            <li><a>Draft Report Sales</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">


                    <div class="col-md-12 portlets">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-left">Form Report Terjadwal</div>
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
                                                <label class="control-label col-lg-2" for="title">ID Report
                                                    Terjadwal</label>
                                                <div class="col-lg-10">
                                                    {!! Form::text('id_laporan', $laporan->ID_LAPORAN, ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2" for="title">ID Sales</label>
                                                <div class="col-lg-10">
                                                    {!! Form::text('id_karyawan', Session::get('user')[0], ['class' => 'form-control', 'placeholder' => 'ID Karyawan', 'autofocus', 'readonly']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-lg-2" for="title">Nama Sales</label>
                                                <div class="col-lg-10">
                                                    {!! Form::text('nama_karyawan', Session::get('user')[1], ['class' => 'form-control', 'placeholder' => 'Nama Karyawan', 'readonly']) !!}
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
                                                    <label class="col-sm-2 control-label">Walk in</label>
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
                                            <div class="form-group">
                                                <label class="control-label  col-lg-2">Catatan</label>
                                                <div class="col-lg-10">
                                                    <h5>*Silahkan Cek lagi laporan anda, jika sudah sesuai silahkan tekan
                                                        tombol simpan</h5>
                                                    <h5>*Apabila anda mendapatkan database customer, silahkan tekan tombol
                                                        tambah customer dibawah untuk menambahkan customer</h5>
                                                    <h5>*Apabila sudah menambahkan database customer silahkan cek sekali
                                                        lagi laporan anda dan jika sudah silahkan klik tombol simpan</h5>
                                                </div>
                                            </div>
                                            <!-- Buttons -->
                                            <div class="form-group">
                                                <!-- Buttons -->
                                                <div class="col-lg-offset-2 col-lg-9">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <a href="tambahcustomer/{{ $laporan->ID_LAPORAN }}"
                                                        class="btn btn-warning" style="margin-left: 5px">
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
                    <div class="col-lg-12">
                        <!--Project Activity start-->
                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="row">
                                    <div class="col-lg-8 task-progress pull-left">
                                        <h1>
                                            Tabel Database Customer
                                        </h1>
                                        {{-- <a href="tambahcustomer/{{ $laporan->ID_LAPORAN }}" class="btn btn-warning ">
                                            Tambah Customer
                                        </a> --}}
                                    </div>

                                </div>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th>Nama Karyawan</th> -->
                                        <th>Nama Customer</th>
                                        <th>No. Telepon Customer</th>
                                        <th>Sumber</th>
                                        <th>Minat Unit</th>
                                        <th>Keterangan Unit</th>
                                        <th>Jenis Customer</th>
                                        <th>Revisi Jenis Customer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $data)

                                        <tr>
                                            <td>{{ $data->NAMA_CUSTOMER }}</td>
                                            <td>{{ $data->NOTLP_CUS }}</td>
                                            <td>{{ $data->SUMBER }}</td>
                                            <td>{{ $data->UNIT_MINAT }}</td>
                                            <td>{{ $data->KETERANGAN_UNIT }}</td>
                                            @if ($data->JENIS == 2)
                                                <td>
                                                    <a href="#" class="btn btn-primary">
                                                        Hot Prospek
                                                    </a>
                                                </td>
                                            @elseif ($data->JENIS == 1)
                                                <td>
                                                    <a href="#" class="btn btn-success">
                                                        Prospek
                                                    </a>
                                                </td>
                                            @elseif ($data->JENIS == 0)
                                                <td>
                                                    <a href="#" class="btn btn-danger">
                                                        Belum Terklasifikasinan
                                                    </a>
                                                </td>
                                            @endif
                                            <td>
                                                <a href="updatejeniscus2/{{ $data->ID_CUSTOMER }}"
                                                    class="btn btn-warning">
                                                    Update Customer
                                                </a>
                                                <a href="tinjaucus2/{{ $data->ID_CUSTOMER }}" class="btn btn-warning">
                                                    Tambah Minat Unit Customer
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
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
