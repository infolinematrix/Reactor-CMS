@extends('Site::layout.default')

@section('scripts')

    @parent
    {!! Theme::js('js/appointment.js') !!}
@endsection
@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{!! route('site.home') !!}">Home</a></li>
                <li><a href="#">
                        @foreach(getSpeciality($node->getKey()) as $speciality => $value)
                            <span>{!! $value !!}</span>
                        @endforeach
                    </a></li>
                <li>{!! $node->getTitle() !!}</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <nav id="secondary_nav">
                    <div class="container">
                        <ul class="clearfix">
                            <li><a href="#section_1" class="active">General info</a></li>
                            <li><a href="#section_2">Reviews</a></li>
                            <li><a href="#sidebar">Booking</a></li>
                        </ul>
                    </div>
                </nav>
                <div id="section_1">
                    <div class="box_general_3">
                        <div class="profile">
                            <div class="row">
                                <div class="col-lg-5 col-md-4">
                                    <figure>
                                        <img src="{!! theme_url('img/doctor_listing_1.jpg') !!}" alt=""
                                             class="img-fluid"/>
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    @foreach(getSpeciality($node->getKey()) as $speciality => $value)
                                        <small>{!! $value !!}</small>
                                    @endforeach
                                    <h1>{!! $node->getTitle() !!}</h1>

                                    <ul class="statistic">
                                        <li>{!! $viewed !!} Views</li>
                                    </ul>
                                    <ul class="contacts">
                                        <li>
                                            <h6>Address</h6>
                                            {!! $node->profile_address !!}, {!! $location !!} - {!! $node->profile_zipcode !!}
                                        </li>
                                        <li>
                                            <h6>Phone</h6> <a href="tel://{!! $node->profile_phone !!}">{!! $node->profile_phone !!}</a> - <a
                                                    href="tel://{!! $node->profile_landline !!}">{!! $node->profile_landline !!}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <hr/>

                        <!-- /profile -->
                        <div class="indent_title_in">
                            <i class="pe-7s-user"></i>
                            <h3>Professional statement</h3>
                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                        </div>
                        <div class="wrapper_indent">
                            <p>{!! $node->profile_about !!}</p>
                            <h6>Specializations</h6>

                            <div class="row">
                                @foreach($keywords as $tag)
                                    <div class="col-lg-6">
                                        <span class=" bullets">
                                        {!! $tag->title !!}
                                    </span>
                                    </div>
                                @endforeach
                            </div>

                            <!-- /row-->
                        </div>
                        <!-- /wrapper indent -->

                        <hr/>

                        @if(count($educations) > 0)
                        <div class="indent_title_in">
                            <i class="pe-7s-news-paper"></i>
                            <h3>Education</h3>
                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                        </div>
                        <div class="wrapper_indent">
                            <h6>Curriculum</h6>
                            <ul class="list_edu">
                                @foreach($educations as $education)
                                <li><strong>{!! $education->getTitle() !!}</strong> - {!! $education->description !!}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!--  End wrapper indent -->
                    </div>
                    <!-- /section_1 -->
                </div>
                <!-- /box_general -->

                <div id="section_2">
                    <div class="box_general_3">
                        <div class="reviews-container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="review_summary">
                                        <strong>4.7</strong>
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star"></i>
                                        </div>
                                        <small>Based on 4 reviews</small>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 90%"
                                                     aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>5 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 95%"
                                                     aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>4 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>3 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 20%"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>2 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0"
                                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>1 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->

                            <hr/>

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="./img/avatar1.jpg" alt=""/>
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Admin – April 03, 2016:
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                            hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="./img/avatar2.jpg" alt=""/>
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Ahsan – April 01, 2016
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                            hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="./img/avatar3.jpg" alt=""/>
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Sara – March 31, 2016
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                            hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->
                        </div>
                        <!-- End review-container -->
                    </div>
                </div>
                <!-- /section_2 -->
            </div>
            <!-- /col -->
            <aside class="col-xl-4 col-lg-4" id="sidebar">
                <div class="box_general_3 booking">
                    {!! Form::open(['url' => route('book.appointment'),'id' => 'bookAppointment']) !!}
                    {!! Form::hidden('node_id',$node->getKey(),['id' => 'node_id']) !!}
                        <div class="title">
                            <h3>Book a Visit</h3>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="booking_date" id="booking_date" data-lang="en"
                                           data-min-year="2017" data-max-year="2020"
                                           data-disabled-days="10/17/2017,11/18/2017"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="booking_time" id="booking_time" value="9:00 am"/>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <hr/>

                        <div class="form-group">
                            <input type="text" class="form-control" name="patient_name" id="patient_name" required
                                   placeholder="Patient name" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="patient_email" id="patient_email" required
                                   placeholder="Your email address" autocomplete="off"/>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="patient_contact" id="patient_contact" required
                                           placeholder="Contact No" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="patient_zipcode" id="patient_zipcode" required
                                           placeholder="ZipCode" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <button type="submit" id="btnbook" class="btn_1 full-width">Book Now</button>
                        <br>
                        <span id="bookmsz"></span>
                    {!! Form::close() !!}
                </div>
                <!-- /box_general -->
            </aside>
            <!-- /asdide -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection