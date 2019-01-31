@extends('layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Tags','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">


        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Modify") !!}</h3>
                <div class="box-tools pull-right">
                    {!! action_button(route('reactor.tags.index'),'fa-bars','List') !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('partials.contents.form')
            </div>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->

@endsection



