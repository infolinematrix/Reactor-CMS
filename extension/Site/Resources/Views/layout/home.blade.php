@extends('Site::layout.base')

@section('body')
    <!-- TopNav -->
    @include('Site::partials.topbar')

    @yield('content')

@endsection