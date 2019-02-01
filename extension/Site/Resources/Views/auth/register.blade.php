@extends('Site::layout.default')

@section('content')
    <div id="hero_register">
        <div class="container margin_120_95">
            <div class="row">
                <div class="col-lg-5">
                    <h1>It's time to find you!</h1>
                    <p class="lead">Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad
                        has, has ei quis iudico, ad mei nonumes periculis.</p>
                    <div class="box_feat_2">
                        <i class="pe-7s-map-2"></i>
                        <h3>Let patients to Find you!</h3>
                        <p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit
                            temporibus dissentiet.</p>
                    </div>
                    <div class="box_feat_2">
                        <i class="pe-7s-date"></i>
                        <h3>Easly manage Bookings</h3>
                        <p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui
                            putant democritum, velit nusquam sententiae vis no.</p>
                    </div>
                    <div class="box_feat_2">
                        <i class="pe-7s-phone"></i>
                        <h3>Instantly via Mobile</h3>
                        <p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat
                            reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
                    </div>
                </div>
                <!-- /col -->
                <div class="col-lg-6 ml-auto">
                    {!! Form::open(['url' => route('register')]) !!}
                        <div class="box_form">
                            <div class="form-group">

                                <label class="radio-inline">
                                    <input type="radio" name="type" value="1" id="radio-one" class="form-radio"
                                           checked><label for="radio-one">I am Patient</label>
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="type" value="2" id="radio-one" class="form-radio"><label
                                            for="radio-one">I am Doctor</label>
                                </label>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" required placeholder="Your name"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" required placeholder="Your last name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" required placeholder="Your email address"/>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Your password"
                                               required onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" name="password_two" id="password_two"
                                               placeholder="Confirm password"
                                               onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"
                                        />
                                    </div>
                                </div>
                            </div>


                            <div id="pass-info" class="clearfix"></div>
                            <div class="checkbox-holder text-left">
                                <div class="checkbox_2">
                                    <input type="checkbox" value="accept_2" id="check_2" name="check_2" checked="" required/>
                                    <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                                </div>
                            </div>
                            <div class="form-group text-center add_top_30">
                                <input class="btn_1" type="submit" value="Submit"/>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- /box_form -->
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /hero_register -->
@endsection