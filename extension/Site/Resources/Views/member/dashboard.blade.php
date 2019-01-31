@extends('Site::layout.default')

@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">User</a></li>
                <li>Dashboard</li>
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
                               aria-controls="book">Appointments</a>
                        </li>
                    </ul>
                    <!--/nav-tabs -->

                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">

                            <div class="list-1">
                                <div class="indent_title_in">
                                    <i class="pe-7s-user"></i>
                                    <h3>Mr. Subha S Das</h3>
                                    <p>14th April, 2018 - 17:10</p>
                                </div>
                                <div class="wrapper_indent">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing
                                        elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque,
                                        aliquet vel, dapibus id, mattis vel, nisi. Nullam mollis</p>
                                    <a class="btn_1" href="./detail-page.html">Confirm</a>
                                    <a class="btn_2" href="./detail-page.html">Reject</a>
                                </div>
                                <!-- /wrapper indent -->
                            </div>

                            <div class="list-1">
                                <div class="indent_title_in">
                                    <i class="pe-7s-user"></i>
                                    <h3>Mr. Subha S Das</h3>
                                    <p>14th April, 2018 - 17:10</p>
                                </div>
                                <div class="wrapper_indent">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing
                                        elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque,
                                        aliquet vel, dapibus id, mattis vel, nisi. Nullam mollis</p>
                                    <a class="btn_1" href="./detail-page.html">Confirm</a>
                                    <a class="btn_2" href="./detail-page.html">Reject</a>
                                </div>
                                <!-- /wrapper indent -->
                            </div>
                            <!-- /wrapper indent -->

                        </div>
                        <!-- /tab_1 -->

                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /tabs_styled -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection