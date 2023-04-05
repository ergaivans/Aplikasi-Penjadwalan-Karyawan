@extends('template/sidebar_sales')
@section('content')

    <body>
        <!--main content start-->
        <section id="container" class="">
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i>Tambah Customer</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index_sales">Halaman Utama</a></li>
                                <li><a>Report</a></li>
                                <li><a>Report Tidak Terjadwal</a></li>
                                <li><a>Draft Report Sales</a></li>
                                <li><a>Tambah Customer</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Form Tambah Customer
                                </header>
                                <div class="panel-body">
                                    {!! Form::open(['url' => '/prosestambahcust', 'class' => 'form-horizontal']) !!}

                                    {!! Form::hidden('id_laporan', $laporan->ID_LAPORAN) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Customer</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_customer', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">No. Telepon</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('notlp', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Sumber</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('sumber', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Klasifikasi Prospek</label>
                                        <div class="col-sm-10">
                                            @foreach ($kriteria1 as $item)
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="krit[]" type="checkbox"
                                                            value="{{ $item->ID_KRITERIA }}">
                                                        {{ $item->NAMA_KRITERIA }}
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Klasifikasi Hot Prospek</label>
                                        <div class="col-sm-10">
                                            @foreach ($kriteria2 as $item)
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="krit[]" type="checkbox"
                                                            value="{{ $item->ID_KRITERIA }}">
                                                        {{ $item->NAMA_KRITERIA }}
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-lg-9">
                                        <button type="submit" class="btn btn-primary">Tambahkan Customer</button>
                                    </div>
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
        <!-- container section end -->
        <!-- javascripts -->
        <script src="/project_prospero/resources/js/jquery.js"></script>
        <script src="/project_prospero/resources/js/bootstrap.min.js"></script>
        <!-- nicescroll -->
        <script src="/project_prospero/resources/js/jquery.scrollTo.min.js"></script>
        <script src="/project_prospero/resources/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="/project_prospero/resources/js/scripts.js"></script>

    </body>

@endsection
