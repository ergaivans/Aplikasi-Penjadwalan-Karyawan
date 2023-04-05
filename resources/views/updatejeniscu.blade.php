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
                            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Pencatatan Kriteria</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                <li><i class="icon_document_alt"></i>Customer</li>
                                <li><i class="fa fa-file-text-o"></i>Update Customer</li>
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
                                    {!! Form::open(['url' => '/masukinjeniscus', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Id Customer</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_customer', $edit->ID_CUSTOMER, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                    </div>
                                    {!! Form::hidden('id_laporan', $edit->ID_LAPORAN) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Customer</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_customer', $edit->NAMA_CUSTOMER, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">No TLP</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('notlp', $edit->NOTLP_CUS, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Sumber</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('sumber', $edit->SUMBER, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Klasifikasi Prospek</label>
                                        <div class="col-sm-10">
                                            @foreach ($kriteria1 as $item)
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="krit[]" type="checkbox"
                                                            value="{{ $item->ID_KRITERIA }}" @foreach ($detail_kriteria as $krit) @if ($krit->ID_KRITERIA == $item->ID_KRITERIA) checked @endif @endforeach>
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
                                                            value="{{ $item->ID_KRITERIA }}" @foreach ($detail_kriteria as $krit) @if ($krit->ID_KRITERIA == $item->ID_KRITERIA) checked @endif @endforeach>
                                                        {{ $item->NAMA_KRITERIA }}
                                                    </label>
                                                </div>
                                            @endforeach

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
