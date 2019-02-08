@extends('Site::layout.default')

@section('content')
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="login-2">
                <h1>Reset your Password!</h1>
                {!! Form::open(['url' => route('reset.password')]) !!}
                <input type="hidden" name="email" id="email" value="{!! $email !!}">
                <div class="box_form clearfix">
                    <div class="box_login">
                        Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad has, has ei quis iudico, ad mei nonumes periculis.
                    </div>
                    <div class="box_login last">
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Your password"
                                   required onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"
                            />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_two" id="password_two"
                                   placeholder="Confirm password"
                                   onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"
                            />
                        </div>
                        <div class="form-group">
                            <input class="btn_1" type="submit" value="Submit"/>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <p class="text-center link_bright">Already have an Account ? <a
                            href="{!! route('login') !!}"><strong>Login!</strong></a></p>
            </div>
            <!-- /login -->
        </div>
    </div>
@endsection