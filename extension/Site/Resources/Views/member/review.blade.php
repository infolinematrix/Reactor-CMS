@extends('Site::layout.default')
@section('scripts')
    @parent
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
                <li>Reviews</li>
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
                               aria-controls="book">Reviews</a>
                        </li>
                    </ul>
                    <!--/nav-tabs -->

                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">

                            <div class="">
                                <div class="reviews-container">
                            @if(count($reviews) > 0)

                                @foreach($reviews as $review)
                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="{!! asset('assets/user.png') !!}" alt=""/>
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            @for($i=1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="icon_star voted"></i>
                                                @else
                                                    <i class="icon_star"></i>
                                                @endif
                                            @endfor

                                        </div>
                                        <div class="rev-info">
                                            {!! $review->name !!} – {!! date('M',strtotime($review->created_at)) !!} {!! date('d',strtotime($review->created_at)) !!}, {!! date('Y',strtotime($review->created_at)) !!}:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                {!! $review->body !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="list-1">
                                    <div class="indent_title_in">
                                        Sorry! You don't have any Reviews...
                                    </div>
                                </div>
                        @endif
                        </div>
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