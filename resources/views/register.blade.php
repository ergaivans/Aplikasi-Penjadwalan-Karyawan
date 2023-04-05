@extends('template/csstok')
@section('content')
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

    <body class="login-img3-body">
        <div class="container" style="margin-bottom: 64px">
            {!! Form::open(['url' => '/prosesregister', 'class' => 'login-form']) !!}
            <div class="login-wrap">
                <p class="login-img"><img src="resources/img/logoxx.png" width="140px" height="80px"></p>
                {{-- <h3 class="page-header text-center" style="color: white">Daftar Sekarang</h3> --}}
                <div class="input-group">
                    <span class="input-group-addon"><i class=" icon_id-2_alt"></i></span>
                    {!! Form::text('id_karyawan', $id_karyawan->MAX_ID_NUMBER, ['class' => 'form-control', 'placeholder' => 'ID Karyawan', 'autofocus', 'readonly']) !!}
                    {{-- <input type="text" class="form-control" placeholder="ID_Karyawan" autofocus> --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class=" icon_profile"></i></span>
                    {!! Form::text('id_user', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus', 'required']) !!}
                    {{-- <input type="text" class="form-control" placeholder="Username"> --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
                    {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_id-2"></i></span>
                    {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama', 'required']) !!}
                    {{-- <input type="text" class="form-control" placeholder="Nama"> --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_gift_alt"></i></span>
                    {!! Form::text('ttl', null, ['class' => 'form-control', 'placeholder' => 'Tempat, Tanggal Lahir', 'required']) !!}
                    {{-- <input type="text" class="form-control" placeholder="No.Telp" > --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_house_alt"></i></span>
                    {!! Form::text('alamat', null, ['class' => 'form-control', 'placeholder' => 'Alamat', 'required']) !!}
                    {{-- <input type="text" class="form-control" placeholder="Alamat" > --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                    {!! Form::text('bendera', null, ['class' => 'form-control', 'placeholder' => 'Bendera', 'required']) !!}
                    {{-- <input type="text" class="form-control" placeholder="Alamat" > --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_mail"></i></span>
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
                    {{-- <input type="text" class="form-control" placeholder="Email" > --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_phone"></i></span>
                    {!! Form::text('notelp', null, ['class' => 'form-control', 'placeholder' => 'No. Telepon', 'required']) !!}
                    {{-- <input type="text" class="form-control" placeholder="No.Telp" > --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    {!! Form::hidden('jabatan', 'Agent', ['class' => 'form-control', 'placeholder' => 'Jabatan']) !!}
                    {{-- <input type="text" class="form-control" placeholder="Jabatan" > --}}
                </div>
                {!! Form::hidden('status', 0) !!}
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Daftar</button>
            <p style="text-align: center; margin-top: 8px"><small style="color: floralwhite">Belum Terdaftar ? <a href="./">
                        Login Sekarang
                        !</a></small></p>

            {!! Form::close() !!}

        </div>

        </div>
    </body>

@endsection
