<!DOCTYPE html>
<html lang="{{ get_full_locale_for(App::getLocale(), true) }}" class="no-js">
<head>
    <title>@yield('pageTitle') &mdash; Reactor</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel='shortcut icon' type='image/x-icon' href='/reactor.png'/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Html::style('assets/plugins/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!}
    {!! Html::style('assets/plugins/iCheck/all.css') !!}
    {!! Html::style('assets/plugins/select2/select2.css') !!}
    {!! Html::style('assets/plugins/dropzone/jquery.ezdz.css') !!}

    {!! Html::style('assets/backend/css/ionicons.min.css') !!}
    {!! Html::style('assets/backend/css/AdminLTE.min.css') !!}
    {!! Html::style('assets/backend/css/skins/_all-skins.min.css') !!}
    {!! Html::style('assets/backend/css/tags.css') !!}

    {!! Html::style('assets/backend/css/backend-custom.css') !!}

    @yield('styles')

</head>
<body data-baseurl='{!! Url('/') !!}' class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

    <!-- Header -->
@include('backend.partials.header')

<!-- Left side column. contains the logo and sidebar -->
@include('backend.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @yield('content')

    <!-- /.content -->
    </div>

    @include('backend.partials.footer')

</div>

@include('backend.partials.modals.delete')

{!! Html::script('assets/plugins/jQuery/jquery-3.1.1.min.js') !!}

{!! Html::script('assets/plugins/bootstrap/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/select2/select2.full.min.js') !!}
{!! Html::script('assets/plugins/iCheck/icheck.min.js') !!}
{!! Html::script('assets/plugins/fastclick/fastclick.js') !!}

{!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/plugins/dropzone/jquery.ezdz.min1.js') !!}


{!! Html::script('assets/backend/js/app.min.js') !!}

{!! Html::script('assets/backend/js/backend.js') !!}
{!! Html::script('assets/backend/js/app2.js') !!}
{!! Html::script('assets/backend/js/parent_search.js') !!}
{!! Html::script('assets/backend/js/nodesforms.js') !!}
{!! Html::script('assets/backend/js/forms.js') !!}
{!! Html::script('assets/backend/js/tags.js') !!}

{!! Html::script('assets/backend/js/custom.js') !!}

@yield('scripts')

</body>
</html>