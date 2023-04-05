@extends('template/sidebar_man')
@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i>Tambah Karyawan</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                        <li><i class=""></i>Perizinan</li>
                        <li><i class=""></i>Pencatatan Karyawan</li>
                        <li><i class=""></i>Tambah Karyawan</li>
                    </ol>
                </div>
            </div>

            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Form Tambah Karyawan
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                {!! Form::open(['url' => '/prosestambahman', 'class' => 'form-validate form-horizontal', 'id' => 'register_form']) !!}
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">ID Karyawan</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('id_karyawan', $id_karyawan->MAX_ID_NUMBER, ['class' => 'form-control', 'readonly']) !!}
                                        {{-- <input class=" form-control" id="fullname" name="fullname" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Nama Karyawan</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('nama_karyawan', null, ['class' => 'form-control', 'required']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">No. Telepon</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('no_tlp', null, ['class' => 'form-control', 'required']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Tempat, Tanggal Lahir</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('ttl', null, ['class' => 'form-control', 'required']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Alamat</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('alamat', null, ['class' => 'form-control', 'required']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Jabatan</label>
                                    <div class="col-lg-10">

                                        {!! Form::text('jabatan', null, ['class' => 'form-control', 'required']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Email</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Username</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('id_user', null, ['class' => 'form-control', 'required']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Password</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('password', null, ['class' => 'form-control', 'required']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    {{-- <label for="address" class="control-label col-lg-2">Status<span --}}
                                    {{-- class="required">*</span></label> --}}
                                    {{-- <div class="col-lg-10"> --}}
                                    {!! Form::hidden('status', 1) !!}
                                    {{-- {!! Form::text('status', null, ['class' => 'form-control']) !!} --}}
                                    {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <a href="pencatatan_man" class="btn btn-danger" style="margin-left: 1%">batal</a>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                </div>

        </section>
        </div>
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
