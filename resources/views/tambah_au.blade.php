@extends('template/sidebar')
@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_star_alt"></i> Penilaian</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                        <li><i class=""></i>Penilaian</li>
                        <li><i class=""></i>Agent Under</li>
                        <li><i class=""></i>Tambah Agent Under</li>
                    </ol>
                </div>
            </div>

            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Form Tambah Agent Under
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                {!! Form::open(['url' => '/prosestambahau', 'class' => 'form-validate form-horizontal', 'id' => 'register_form']) !!}
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">ID Agent Under</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('id_au', $id_au->MAX_ID_NUMBER, ['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sales in House</label>
                                    <div class="col-sm-10">
                                        <select name="id_karyawan" class="form-control m-bot15">
                                            @foreach ($kuy as $data)
                                                <option value="{{ $data->ID_KARYAWAN }}"> {{ $data->NAMA_KARYAWAN }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Nama Agent Under</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('nama_au', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">No. Telepon</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('telp_au', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status_au" class="form-control m-bot15" required>
                                            <option selected disabled>-Pilih</option>
                                            <option value="0">Lead Agent</option>
                                            <option value="1">Traditional Agent</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Bendera</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('bendera', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    {!! Form::hidden('status', 1) !!}
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Tambah</button>
                                <a href="./agent-under" class="btn btn-danger" style="margin-left: 1%">batal</a>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </section>
                </div>
            </div>
        </section>
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

@endsection
