@extends('layouts.page')
@section('title', 'Quản trị đăng nhập')

@section('content')

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}
                        <h1>Đăng nhập</h1>
                        <div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email" value="{{ old('email') }}" required autofocus placeholder="Tên đăng nhập hoặc email quản trị" />
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
                            <a class="reset_pass" href="#">Quên mật khẩu?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <!-- <p class="change_link">Mới?
                                <a href="#signup" class="to_register"> Đăng ký tài khoản </a>
                            </p> -->
                            <p class="change_link">Hủy?
                                <a href="{{url('/')}}" class="to_register"> Về trang chủ </a>
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

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                        <h1>Tạo tài khoản</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Tên đăng nhập" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Mật khẩu" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="index.html">Đăng ký</a>
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
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

@endsection
