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

                            @if(count($appointments) > 0)
                                @foreach($appointments as $appointment)
                            <div class="list-1">
                                <div class="indent_title_in">
                                    <i class="pe-7s-user"></i>
                                    <h3>{!! $appointment->patient_name !!}</h3>
                                    <p>{!! date('d',strtotime($appointment->booking_date)).' '.
                                            date('M',strtotime($appointment->booking_date)).', '.
                                            date('Y',strtotime($appointment->booking_date)) !!} - {!! $appointment->booking_time !!}


                                    </p>
                                </div>
                                <div class="wrapper_indent">
                                   <p>
                                    <ul class="contacts">
                                        <li>
                                            <h6>Email</h6>
                                            {!! $appointment->patient_email !!}
                                        </li>
                                        <li>
                                            <h6>Phone</h6>  {!! preg_replace('/\d{3}/', '$0-', str_replace('.', null, trim($appointment->patient_contact))) !!}</li>
                                    </ul>
                                   </p>
                                    @if($appointment->confirmed == 'no')
                                    <a class="btn_1" href="{!! route('member.profile.booking.confirm',$appointment->id) !!}">Confirm</a>
                                    <a class="btn_2" href="{!! route('member.profile.booking.cancel',$appointment->id) !!}">Reject</a>
                                    @else
                                        <button class="btn_1" disabled>Confirmed</button>

                                    @endif
                                </div>
                                <!-- /wrapper indent -->
                            </div>
                                @endforeach
                            @else
                                <div class="list-1">
                                    <div class="indent_title_in">
                                       Sorry! You don't have any Appointments...
                                        </div>
                                    </div>
                                @endif


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