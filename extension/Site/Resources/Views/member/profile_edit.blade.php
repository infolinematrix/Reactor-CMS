@extends('Site::layout.default')

@section('scripts')
    @parent
    {!! Theme::js('js/jquery.livequery.js') !!}
    {!! Theme::js('dropzone/jquery.ezdz.min.js') !!}
    <script type="text/javascript">
        @if($profileImage)
        $('.image-up').ezdz({
            text: '<img src="{!! asset('uploads/'.$profileImage->path) !!}" class="img-fluid" alt=""/>',
        });
        @else
        $('.image-up').ezdz({
            text: 'Click to upload picture',
        });
        @endif
    </script>
@endsection

@section('styles')
    {!! Theme::css('dropzone/jquery.ezdz.css') !!}
    {!! Theme::css('dropzone/focus.css') !!}

    <style>
        .loc {
            width: 100%;
            float: left;
            margin-bottom: 10px;
        }
        .ezdz-dropzone {
            position: relative;
            border-radius: 3px;
            font: bold 14px arial;
            text-align: center;
            width: 100%;
            height: 100%;
            padding: 5px;
            border: 1px dashed lightgray;
            color: lightgray;
            overflow: hidden;
            max-height: 155px;
            min-height: 255px;
            line-height: 140px;
        }
    </style>
@endsection
@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{!! route('site.home') !!}">Home</a></li>
                <li><a href="{!! route('member') !!}">User</a></li>
                <li>Profile Edit</li>
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
                        <li class="nav-item">
                            <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab"
                               aria-controls="general" aria-expanded="true">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                               aria-controls="reviews">Reviews</a>
                        </li>
                    </ul>
                    <!--/nav-tabs -->
                    <div class="box clearfix">

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="book" role="tabpanel"
                                     aria-labelledby="book-tab">
                                    <div class="indent_title_in">
                                        <i class="pe-7s-user"></i>
                                        <h3>Professional statement</h3>
                                        <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                                    </div>

                                    {!! form_start($form) !!}
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
                                                        @if($location_meta)
                                                            <select class="form-control loc" required name="location[]" id="location">
                                                                <option value="">--Select--</option>
                                                                @foreach($locations as $location)
                                                                    <option value="{!! $location->getKey() !!}" @if($location_meta == $location->getKey()) selected @endif>{!! $location->getTitle() !!}</option>
                                                                @endforeach
                                                            </select>


                                                            <?php

                                                            $sub1 = $node->getMeta('location');
                                                            if($sub1){?>
                                                            @foreach($sub1 as $loc)

                                                                <?php
                                                                if($loc != $location_meta){
                                                                ?>
                                                                <?php
                                                                $locationtype = get_node_type('locations');
                                                                ?>
                                                                <select class="loc form-control" name="location[]"
                                                                        required>
                                                                    <?php
                                                                    $p1 = \ReactorCMS\Entities\Node::findOrFail($loc);

                                                                    $ll = $locationtype->nodes()->where('parent_id', $p1->parent_id)->translatedIn(locale())->get();

                                                                    ?>
                                                                    @foreach($ll as $l)
                                                                        <option value="{!! $l->getKey() !!}" {!! (($p1->getKey() == $l->getkey()) ? "Selected": '') !!}>{!! $l->getTitle() !!}</option>
                                                                    @endforeach

                                                                </select>
                                                                <?php }?>

                                                            @endforeach
                                                            <?php }?>

                                                        @else

                                                        <select class="form-control loc" required name="location[]" id="location">
                                                        <option value="">--Select--</option>
                                                        @foreach($locations as $location)
                                                            <option value="{!! $location->getKey() !!}">{!! $location->getTitle() !!}</option>
                                                        @endforeach
                                                    </select>
                                                            @endif
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
                                                    <option value="{!! $speciality->getKey() !!}" @if($category_meta == $speciality->getKey()) selected @endif>{!! $speciality->getTitle() !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Search Keywords</label>
                                           <select class="form-control" required name="keywords[]" id="keywords" multiple>
                                               @foreach($tags as $tag)
                                            <option value="{!! $tag->getKey() !!}" {!! ($tagsMeta != null ? (in_array($tag->getKey(), $tagsMeta) ? 'selected' : "" ) : '') !!}>{!! $tag->title !!} </option>
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

                                    <div class="row">
                                        <div class="col-lg-3 col-xs-3">
                                            <div class="form-group">
                                                <label>Featured</label>
                                                {!! form_row($form->featured) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="btn_1" type="submit" value="Update"/>

                                            </div>
                                        </div>
                                    </div>
                                {!! form_end($form,$renderRest = false)  !!}
                                    <!-- /wrapper indent -->
                                </div>
                                <!-- /tab_1 -->

                                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="general-tab">
                                    <div class="indent_title_in">
                                        <i class="pe-7s-user"></i>
                                        <h3>Education</h3>
                                        <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                                    </div>

                                    {!! form_start($educationform) !!}
                                    <div class="sr-only">
                                    {!! form_row($educationform->locale) !!}
                                    {!! form_row($educationform->type) !!}
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Institute</label>
                                                 {!! form_row($educationform->title) !!}

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Degree</label>
                                                    {!! form_row($educationform->description) !!}

                                                </div>
                                            </div>

                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">
                                            <div class="form-group">
                                            <input class="btn_1" type="submit" value="Update"/>

                                    </div>
                                    </div>
                                    </div>

                                    @if(count($educations) > 0)
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">
                                            <div class="form-group">
                                    <div class="">
                                        <h6>Curriculum</h6>
                                        <ul class="list_edu">

                                                @foreach($educations as $education)
                                            <li><strong>{!! $education->getTitle() !!}</strong> - {!! $education->description !!}
                                            <a href="{!! route('member.profile.delete.education',$education->getKey()) !!}"><i class="icon-trash"></i> </a>
                                            </li>
                                                @endforeach

                                        </ul>

                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    @endif
                                    {!! form_end($educationform,$renderRest = false)  !!}


                                </div>
                                <!-- /tab_2 -->

                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="reviews-container">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div id="review_summary">
                                                    <strong>4.7</strong>
                                                    <div class="rating">
                                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                                class="icon_star voted"></i><i
                                                                class="icon_star voted"></i><i class="icon_star"></i>
                                                    </div>
                                                    <small>Based on 4 reviews</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-lg-10 col-9">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
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
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
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
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
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
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
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
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: 0" aria-valuenow="0" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
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
                                                            class="icon_star voted"></i><i
                                                            class="icon_star voted"></i><i class="icon_star"></i>
                                                </div>
                                                <div class="rev-info">
                                                    Admin – April 03, 2016:
                                                </div>
                                                <div class="rev-text">
                                                    <p>
                                                        Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo
                                                        pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /review-box -->

                                        <div class="review-box clearfix">
                                            <figure class="rev-thumb"><img src="./img/avatar2.jpg" alt=""/>
                                            </figure>
                                            <div class="rev-content">
                                                <div class="rating">
                                                    <i class="icon-star voted"></i><i class="icon_star voted"></i><i
                                                            class="icon_star voted"></i><i
                                                            class="icon_star voted"></i><i class="icon_star"></i>
                                                </div>
                                                <div class="rev-info">
                                                    Ahsan – April 01, 2016
                                                </div>
                                                <div class="rev-text">
                                                    <p>
                                                        Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo
                                                        pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
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
                                                            class="icon_star voted"></i><i
                                                            class="icon_star voted"></i><i class="icon_star"></i>
                                                </div>
                                                <div class="rev-info">
                                                    Sara – March 31, 2016
                                                </div>
                                                <div class="rev-text">
                                                    <p>
                                                        Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo
                                                        pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End review-box -->

                                    </div>
                                    <!-- End review-container -->
                                </div>
                                <!-- /tab_3 -->

                            </div>
                            <!-- /tab-content -->



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