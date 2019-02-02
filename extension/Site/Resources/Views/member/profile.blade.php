@extends('Site::layout.default')

@section('scripts')
    @parent
    {!! Theme::js('js/jquery.livequery.js') !!}
@endsection

@section('styles')
    <style>
        .loc {
            width: 100%;
            float: left;
            margin-bottom: 10px;
        }

    </style>
@endsection
@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{!! route('site.home') !!}">Home</a></li>
                <li><a href="{!! route('member') !!}">User</a></li>
                <li>Profile</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->
    <div class="container margin_60">
        <div class="row">

            <aside class="col-xl-3 col-lg-4" id="sidebar">
                @include('Site::member.navigation')
            </aside>
            <!-- /asdide -->

            <div class="col-xl-9 col-lg-8">

                <div class="tabs_styled_2">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="book-tab" data-toggle="tab" href="#book" role="tab"
                               aria-controls="book">Basic Information</a>
                        </li>

                    </ul>
                    <!--/nav-tabs -->
                    <div class="box clearfix">
                        {!! form_start($form) !!}
                        {!! form_row($form->locale) !!}
                        {!! form_row($form->type) !!}
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="book" role="tabpanel"
                                     aria-labelledby="book-tab">
                                    <div class="indent_title_in">
                                        <i class="pe-7s-user"></i>
                                        <h3>Professional statement</h3>
                                        <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                                    </div>

                                    <div>
                                        <div class="row">
                                            <div class="col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    {!! form_row($form->profile_firstname) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    {!! form_row($form->profile_lastname) !!}
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    {!! form_row($form->profile_email) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Contact No</label>
                                                   {!! form_row($form->profile_phone) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    {!! form_row($form->profile_address) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div id="show_sub_locations">
                                                    <select class="form-control loc" required name="location[]" id="location">
                                                        <option value="">--Select--</option>
                                                        @foreach($locations as $location)
                                                            <option value="{!! $location->getKey() !!}">{!! $location->getTitle() !!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Zip Code</label>
                                                 {!! form_row($form->profile_zipcode) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label>For Appointment Call @</label>
                                                    {!! form_row($form->profile_landline) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="indent_title_in mt-5">
                                        <i class="pe-7s-user"></i>
                                        <h3>Speciality</h3>
                                        <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                                    </div>

                                    <div class="last">
                                        <div class="form-group">
                                            <select class="form-control" required name="speciality" id="speciality">
                                                <option value="">--Select--</option>
                                                @foreach($specialities as $speciality)
                                                    <option value="{!! $speciality->getKey() !!}">{!! $speciality->getTitle() !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Search Keywords</label>
                                            <select class="form-control" required name="keywords[]" id="keywords" multiple>
                                                @foreach($tags as $tag)
                                                    <option value="{!! $tag->getKey() !!}">{!! $tag->title !!} </option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>


                                    <div class="indent_title_in mt-5">
                                        <i class="pe-7s-user"></i>
                                        <h3>About yourself</h3>
                                        <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                                    </div>

                                    <div class="last">
                                        <div class="form-group">
                                          {!! form_row($form->profile_about) !!}
                                        </div>
                                    </div>
                                    <!-- /wrapper indent -->
                                </div>
                                <!-- /tab_1 -->


                            </div>
                            <!-- /tab-content -->

                            <div class="tab-footer-action">
                                <div class="form-group">
                                    <input class="btn_1" type="submit" value="Save"/>
                                </div>
                            </div>
                        {!! form_end($form,$renderRest = false)  !!}
                    </div>
                </div>
                <!-- /tabs_styled -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection