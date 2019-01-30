@extends('Site::layout.base')

@section('body')
    <div class="container-main">

        @include('Site::partials.navigation')

        <div class="container">
            @yield('content')
        </div>

        @include('Site::partials.footer')

    </div>
@endsection