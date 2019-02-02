@extends('Site::layout.home')

@section('content')
    <div id="results">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>{!! ($nodes ? count($nodes) : 0) !!} results found</strong></h4>
                </div>
                <div class="col-md-6">
                    <div class="search_bar_list">
                        <select id="select2_search" class="form-control">
                            <option value="" selected>Speciality..</option>
                            @foreach($tags as $tag)
                                <option value="{!! $tag->id !!}">{!! $tag->title !!}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Search"/>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /results -->

    <div class="filters_listing">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <h4 class="align-middle mt-3">Gastroenterologist</h4>
                </li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /filters -->

    <div class="container margin_60_35">
        <div class="row">

            <div class="col-lg-8">

                @foreach($nodes as $node)
                <div class="strip_list wow fadeIn">
                    <a href="#0" class="wish_bt"></a>
                    <figure>
                        <a href="./detail-page.html"><img src="{!! theme_url('img/doctor_listing_1.jpg') !!}"
                                                          alt=""/></a>
                    </figure>
                    <small>Pediatrician</small>
                    <h3>{!! $node->getTitle() !!}</h3>
                    <p>{!! str_limit($node->profile_about,150) !!}</p>
                    <ul>
                        <li>West Bengal</li>
                        <li>Siliguri</li>

                        <li><a href="{!! route('profile',$node->getName()) !!}">View Profile</a></li>
                    </ul>
                </div>
                <!-- /strip_list -->
                @endforeach

            </div>
            <!-- /col -->
            <aside class="col-lg-4" id="sidebar">
                <div class="box_list wow fadeIn">
                    <a href="#0" class="wish_bt"></a>
                    <figure>
                        <a href="./detail-page.html"><img src="{!! theme_url('img/doctor_listing_1.jpg') !!}"
                                                          class="img-fluid" alt=""/>
                            <div class="preview"><span>Read more</span></div>
                        </a>
                    </figure>
                    <div class="wrapper">
                        <small>Psicologist</small>
                        <h3>Dr. Sickman</h3>

                        <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti
                            cuodo....</p>
                        <span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
                        <a href="./badges.html" data-toggle="tooltip" data-placement="top"
                           data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_1.svg"
                                                                                       width="15" height="15"
                                                                                       alt=""/></a>
                    </div>
                    <ul>
                        <li><a href="#0" onclick="onHtmlClick('Doctors', 0)"><i class="icon_pin_alt"></i>View on map</a>
                        </li>
                        <li>
                            <a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361"
                               target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
                        <li><a href="./detail-page.html">Book now</a></li>
                    </ul>
                </div>
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection