@extends('backend.layout.base')
<?php $_withForm = true; ?>

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('backend.partials.content_header',['title' => 'Users','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Edit Role") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.permissions.index') !!}"
                       class="btn btn-flat btn-danger">{!! __('List') !!}</a>
                </div>
            </div>
            <!-- /.box-header -->

            @include('backend.partials.contents.form')


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection



