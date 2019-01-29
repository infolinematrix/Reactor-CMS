@extends('layout.inner')
@section('pageTitle', $pageTitle)

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')

    <div class="row">
        <div class="blog-page">
            <div class="col-md-9">

                <div class="blog-post  wow fadeInUp">
                    <a href="blog-details.html"><img class="img-responsive"
                                                     src="assets/images/blog-post/blog_big_01.jpg" alt=""></a>
                    <h1><a href="blog-details.html">Nemo enim ipsam voluptatem quia voluptas sit aspernatur</a></h1>
                    <span class="date-time">14/06/2016 10.00AM</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
                    <a href="blog.html#" class="btn btn-upper btn-primary read-more">read more</a>
                </div>

            </div>
            <div class="col-md-3 col-xs-12 sidebar">
                <div class="sidebar-widget product-tag wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <h3 class="section-title">Product tags</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="tag-list">
                            <a class="item" title="Phone" href="category.html">Phone</a>
                            <a class="item active" title="Vest" href="category.html">Vest</a>
                            <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                            <a class="item" title="Furniture" href="category.html">Furniture</a>
                            <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                            <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                            <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                            <a class="item" title="Toys" href="category.html">Toys</a>
                            <a class="item" title="Rose" href="category.html">Rose</a>
                        </div><!-- /.tag-list -->
                    </div><!-- /.sidebar-widget-body -->
                </div>
            </div>
        </div>

    </div>

@endsection
