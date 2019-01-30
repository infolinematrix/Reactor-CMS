<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo">
                    <a href="{!! route('site.home') !!}" title="Findoctor"><img src="{!! asset('assets/logo.png') !!}"
                                                                                data-retina="true" alt="" width="163"
                                                                                height="36"></a>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                @if(!Auth::user())
                    <ul id="top_access">

                        <li><a href="#"><i class="pe-7s-user"></i></a></li>
                        <li><a href="#"><i class="pe-7s-add-user"></i></a></li>

                    </ul>
                @endif
                <div class="main-menu">
                    <ul>


                        <li class="submenu">
                            <a href="#0" class="show-submenu">Language<i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="index.html">English</a></li>
                                <li><a href="./index-2.html">Turkish</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#0" class="show-submenu">Pages<i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">Browse (All)</a></li>
                                <li><a href="#">Browse (Category)</a></li>
                                <li><a href="#">Browse (Location)</a></li>
                                <li><a href="#">Browse (Location + Category)</a></li>
                            </ul>
                        </li>
                        <!--
                        <li class="submenu">
                            <a href="#0" class="show-submenu">Elements<i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="./icon-pack-1.html">Icon pack 1</a></li>
                                <li><a href="./icon-pack-2.html">Icon pack 2</a></li>
                                <li><a href="./icon-pack-3.html">Icon pack 3</a></li>
                                <li><a href="404.html">404 page</a></li>
                            </ul>
                        </li>
                        -->

                        @if(Auth::user())
                            <li class="submenu">
                                <a href="#0"
                                   class="show-submenu">{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}<i
                                            class="icon-down-open-mini"></i></a>
                                <ul>

                                    <li><a href="#">Add Profile</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /main-menu -->
            </nav>
        </div>
    </div>
    <!-- /container -->
</header>
<!-- /header -->