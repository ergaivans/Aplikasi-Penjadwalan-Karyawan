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
                                    {!! Form::open(['url' => '/upmasukunit', 'class' => 'form-horizontal']) !!}
                                    {!! Form::hidden('id_dc', $valid->ID_DETAILCUST) !!}
                                    {!! Form::hidden('id_customer', $valid->ID_CUSTOMER) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Customer</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_customer', $valid->NAMA_CUSTOMER, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Minat Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('minat', $valid->UNIT_MINAT, ['class' => 'form-control', 'autofocus']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jumlah Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('jumlah', $valid->JML_UNIT, ['class' => 'form-control', 'autofocus']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nominal Perencanaan</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nominal', $valid->NOMINAL, ['class' => 'form-control']) !!}
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
        <!-- container section end -->
        <!-- javascripts -->
        <script src="/project_prospero/resources/js/jquery.js"></script>
        <script src="/project_prospero/resources/js/bootstrap.min.js"></script>
        <!-- nicescroll -->
        <script src="/project_prospero/resources/js/jquery.scrollTo.min.js"></script>
        <script src="/project_prospero/resources/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="/project_prospero/resources/js/scripts.js"></script>
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


    </body>

@endsection
