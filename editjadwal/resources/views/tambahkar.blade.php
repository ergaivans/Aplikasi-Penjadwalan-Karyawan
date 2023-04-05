@extends('template/sidebar')
@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Penambahan Karyawan</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-table"></i>Pencatatan</li>
                        <li><i class="fa fa-th-list"></i>Pencatatan Karyawan</li>
                        <li><i class="fa fa-th-list"></i>Penambahan Karyawan</li>
                    </ol>
                </div>
            </div>




            <!-- page start-->
            {{-- <div class="row">
                    <div class="col-sm-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Basic Table
                            </header>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <div class="col-sm-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Striped Table
                            </header>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <section class="panel">
                            <header class="panel-heading no-border">
                                Border Table
                            </header>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="2">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@TwBootstrap</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <div class="col-sm-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Hover Table
                            </header>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sumon</td>
                                        <td>Mosa</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Condensed table
                            </header>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Ajay Patel</td>
                                        <td>LA</td>
                                        <td>@ajaypatel_aj</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <div class="col-sm-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Contextual classes
                            </header>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Column heading</th>
                                        <th>Column heading</th>
                                        <th>Column heading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <td>1</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                    </tr>
                                    <tr class="success">
                                        <td>2</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>3</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>4</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Responsive tables
                            </header>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Table heading</th>
                                            <th>Table heading</th>
                                            <th>Table heading</th>
                                            <th>Table heading</th>
                                            <th>Table heading</th>
                                            <th>Table heading</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </section>
                    </div>
                </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Advanced Form validations
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                {!! Form::open(['url' => '/prosestambah', 'class' => 'form-validate form-horizontal', 'id' => 'register_form']) !!}
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">ID_Karyawan <span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">
                                        {!! Form::text('id_karyawan', $id_karyawan->MAX_ID_NUMBER, ['class' => 'form-control', 'readonly']) !!}
                                        {{-- <input class=" form-control" id="fullname" name="fullname" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Nama Karyawan <span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">
                                        {!! Form::text('nama_karyawan', null, ['class' => 'form-control']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Nomor Tlp <span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">
                                        {!! Form::text('no_tlp', null, ['class' => 'form-control']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Tempat Tanggal Lahir <span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">
                                        {!! Form::text('ttl', null, ['class' => 'form-control']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Alamat <span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">
                                        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Jabatan <span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">

                                        {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Email <span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">ID User <span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">
                                        {!! Form::text('id_user', null, ['class' => 'form-control']) !!}
                                        {{-- <input class=" form-control" id="address" name="address" type="text" /> --}}
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Password<span
                                            class="required">*</span></label>
                                    <div class="col-lg-10">
                                        {!! Form::text('password', null, ['class' => 'form-control']) !!}
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
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="pencatatan" class="btn btn-default">Cancel</a>


                                </div>
                            </div>
                            {!! Form::close() !!}

                            {{-- <form class="form-validate form-horizontal " id="register_form" method="get" action="">
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Full name <span
                                                class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="fullname" name="fullname" type="text" />
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="address" class="control-label col-lg-2">Address <span
                                                class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="address" name="address" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Username <span
                                                class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="username" name="username" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-2">Password <span
                                                class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="password" name="password" type="password" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span
                                                class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="confirm_password" name="confirm_password"
                                                type="password" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Email <span
                                                class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="email" name="email" type="email" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="agree" class="control-label col-lg-2 col-sm-3">Agree to Our Policy <span
                                                class="required">*</span></label>
                                        <div class="col-lg-10 col-sm-9">
                                            <input type="checkbox" style="width: 20px" class="checkbox form-control"
                                                id="agree" name="agree" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form> --}}
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
