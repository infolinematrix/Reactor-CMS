@extends('Site::layout.default')

@section('content')
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="login-2">
                <h1>Please login to Findoctor!</h1>
                {!! Form::open(['url' => route('login')]) !!}
                <div class="box_form clearfix">
                    <div class="box_login">
                        <a href="#0" class="social_bt facebook">Login with Facebook</a>
                        <a href="#0" class="social_bt google">Login with Google</a>

                    </div>
                    <div class="box_login last">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email"  required placeholder="Your email address"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" required class="form-control" placeholder="Your password"/>
                            <a href="#0" class="forgot">
                                <small>Forgot password?</small>
                            </a>
                        </div>
                        <div class="form-group">
                            <input class="btn_1" type="submit" value="Login"/>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <p class="text-center link_bright">Do not have an account yet? <a
                            href="{!! route('register') !!}"><strong>Register now!</strong></a></p>
            </div>
            <!-- /login -->
        </div>
    </div>
@endsection