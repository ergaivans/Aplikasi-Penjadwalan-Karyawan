@extends('template/csstok')
@section('content')
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<body class="login-img3-body">
    <div class="container">
        {!! Form::open(['url' => '/prosesregister', 'class' => 'login-form']) !!}
        <div class="login-wrap">
            <p class="login-img"><i class="iconify" data-icon="foundation:clipboard-pencil"></i></p>
            <h3 class="page-header text-center">Daftar Sekarang</h3>
            <div class="input-group">
                <span class="input-group-addon"><i class=" icon_id-2_alt"></i></span>
                {!! Form::text('id_karyawan', $id_karyawan->MAX_ID_NUMBER, ['class' => 'form-control', 'placeholder' => 'ID Karyawan', 'autofocus', 'readonly']) !!}
                {{-- <input type="text" class="form-control" placeholder="ID_Karyawan" autofocus> --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class=" icon_profile"></i></span>
                {!! Form::text('id_user', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus']) !!}
                {{-- <input type="text" class="form-control" placeholder="Username"> --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                {{-- <input type="password" class="form-control" placeholder="Password"> --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_id-2"></i></span>
                {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
                {{-- <input type="text" class="form-control" placeholder="Nama"> --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_gift_alt"></i></span>
                {!! Form::text('ttl', null, ['class' => 'form-control', 'placeholder' => 'Tempat Tanggal Lahir']) !!}
                {{-- <input type="text" class="form-control" placeholder="No.Telp" > --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_house_alt"></i></span>
                {!! Form::text('alamat', null, ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}
                {{-- <input type="text" class="form-control" placeholder="Alamat" > --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_mail"></i></span>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                {{-- <input type="text" class="form-control" placeholder="Email" > --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_phone"></i></span>
                {!! Form::text('notelp', null, ['class' => 'form-control', 'placeholder' => 'No.Telp']) !!}
                {{-- <input type="text" class="form-control" placeholder="No.Telp" > --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                {!! Form::text('jabatan', null, ['class' => 'form-control', 'placeholder' => 'Jabatan']) !!}
                {{-- <input type="text" class="form-control" placeholder="Jabatan" > --}}
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Daftar</button>
            {!! Form::close() !!}
            <small class="mt-4">Sudah daftar ? <a href="./" style="color: blue"> Login Sekarang !</a></small>
        </div>

    </div>
</body>

@endsection


