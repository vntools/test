@extends('layouts.page')
@section('title', 'Học sinh đăng nhập')

@section('content')

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h1>Đăng nhập</h1>
                        <div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email" value="{{ old('email') }}" required autofocus placeholder="Nhập vào email của bạn" />
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" required placeholder="Mật khẩu" />
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-default submit">
                                {{ __('Đăng nhập') }}
                            </button>
                            <a hfef="#"><button class="btn btn-success">
                                    Đăng nhập với facebook
                            </button></a>
                            <a class="reset_pass" href="#">Quên mật khẩu?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Mới?
                                <a href="#signup" class="to_register"> Đăng ký tài khoản </a> hoặc <a href="{{url('/')}}"> về trang chủ</a>
                            </p>
                            {{-- <p class="change_link">Hủy?
                                <a href="{{url('/')}}" class="to_register"> Về trang chủ </a>
                            </p> --}}
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Hi team!</h1>
                                <p>©1018 All Rights Reserved. The Hi team product. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    {{-- <form method="POST" action="">
                        <h1>Tạo tài khoản</h1>
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Họ và tên" required="" />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Nhập lại mật khẩu"
                                required="" />
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div>
                            <a class="btn btn-default submit" type="submit">Đăng ký</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Đã có tài khoản ?
                                <a href="#signin" class="to_register"> Đăng nhập </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Hi team!</h1>
                                <p>©1018 All Rights Reserved. The Hi team product. Privacy and Terms</p>
                            </div>
                        </div>
                    </form> --}}

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <h1>Tạo tài khoản</h1>
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Họ và tên">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Địa chỉ email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input id="password" type="password" class="form-control" name="password" required placeholder="Mật khẩu">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Nhập lại mật khẩu">
                        </div>
                        <div>
                            <select name="class" class="form-control">
                                <option value="10">Lớp 10</option>
                                <option value="11">Lớp 11</option>
                                <option value="12">Lớp 12</option>
                            </select>
                        </div><br/>

                            <button type="submit" class="btn btn-primary">
                                Đăng ký
                            </button>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Đã có tài khoản ?
                                <a href="#signin" class="to_register"> Đăng nhập </a> hoặc <a href="{{url('/')}}"> về trang chủ</a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Hi team!</h1>
                                <p>©1018 All Rights Reserved. The Hi team product. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

@endsection