@extends('template/csstok')
@section('content')

<body class="login-img3-body">

    <div class="container">

        {!! Form::open(['url' => '/proseslogin', 'class' => 'login-form']) !!}
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus']) !!}
                {{-- <input type="text" class="form-control" placeholder="Username" autofocus> --}}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                {{-- <input type="password" class="form-control" placeholder="Password"> --}}
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>

            <small>Belum Terdaftar ? <a href="register" > Daftar Sekarang !</a></small>
        </div>
        {!! Form::close() !!}


    </div>


</body>

@endsection


