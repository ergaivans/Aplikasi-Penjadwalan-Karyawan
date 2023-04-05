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
                                    {!! Form::open(['url' => '/masukintinjaucus', 'class' => 'form-horizontal']) !!}
                                    {!! Form::hidden('id_dc', $id_dc->MAX_ID_NUMBER) !!}
                                    {!! Form::hidden('jumlah', 1) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Id Customer</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_customer', $customer->ID_CUSTOMER, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Customer</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama_customer', $customer->NAMA_CUSTOMER, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tower</label>
                                        <div class="col-sm-10">
                                            <select name="tower" id="unit" class="form-control m-bot15">
                                                <option value="studio">Fortuna
                                                </option>
                                                <option value="1bra">Beatus
                                                </option>
                                            </select>
                                            <!-- {!! Form::text('tower', null, ['class' => 'form-control', 'id' => 'inputTower']) !!} -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Unit Minat</label>
                                        <div class="col-sm-10">
                                            <select name="tipe" id="unit" class="form-control m-bot15">
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
                                                    <option value="STUDIO MAXXIS A">STUDIO MAXXI A</option>
                                                    <option value="STUDIO MAXXIS B">STUDIO MAXXI B</option>
                                                    <option value="2-BR-A">2-BR-A</option>
                                                    <option value="2-BR-B">2-BR-B</option>
                                                    <option value="3-BR">3-BR</option>
                                                </optgroup>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Lantai Tower</label>
                                        <div class="col-sm-10">
                                            {!! Form::number('lantai', null, ['class' => 'form-control', 'min' => '0', 'max' => '32']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Keterangan Unit</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('ket_unit', null, ['class' => 'form-control', 'placeholder' => 'Keterangan Unit(No.Unit)', 'autofocus']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">NOMINAL</label>
                                        <div class="col-sm-10">
                                            {!! Form::number('nominal', null, ['class' => 'form-control', 'id' => 'uangview_id', 'onkeyup' => 'sethelp()', 'autocomplete' => 'off']) !!}
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
                        <div class="col-lg-12">
                            <!--Project Activity start-->
                            <section class="panel">
                                <div class="panel-body progress-panel">
                                    <div class="row">
                                        <div class="col-lg-8 task-progress pull-left">
                                            <h1>
                                                Database Customer
                                            </h1>



                                        </div>

                                    </div>
                                </div>
                                @if (Session::has('messages'))
                                    <span class="label label-success">{{ Session::get('messages') }}</span>
                                @endif
                                <table class="table table-striped table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th><i class="icon_profile"></i> No</th>
                                            <th><i class="icon_profile"></i> Unit</th>
                                            <th><i class="icon_profile"></i> Jumlah Unit</th>
                                            <th><i class="icon_calendar"></i> Nilai Kontrak </th>
                                            <th><i class="icon_mail_alt"></i> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kams as $item)

                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $item->UNIT_MINAT }}</td>
                                                <td>{{ $item->JML_UNIT }}</td>
                                                <td>{{ $item->NOMINAL }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-danger"
                                                            href="updateunitminat/{{ $item->ID_DETAILCUST }}">Update
                                                            Unit</a>
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
