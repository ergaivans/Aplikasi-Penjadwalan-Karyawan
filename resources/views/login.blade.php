@extends('template/csstok')
@section('content')
    @include('sweetalert::alert')

    <body class="login-img3-body">

        <div class="container">

            {!! Form::open(['url' => '/proseslogin', 'class' => 'login-form']) !!}
            <div class="login-wrap">
                <p class="login-img"><img src="resources/img/logoxx.png" width="140px" height="80px"></p>

                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
                    {{-- <input type="text" class="form-control" placeholder="Username" autofocus> --}}
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                    {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>


                <p style="text-align: center; margin-top: 8px"><small style="color: floralwhite">Belum Terdaftar ? <a
                            href="register"> Daftar
                            Sekarang
                            !</a></small></p>
            </div>
            {!! Form::close() !!}


        </div>


    </body>

@endsection
