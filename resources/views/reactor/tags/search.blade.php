@extends('backend.layout.base')

@section('content')

    <!-- Content Header (Page header) -->
    @include('backend.partials.content_header',['title' => 'Tags','breadcrumb' => (!empty($node) ? $node : null) ])


    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Search Result") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.tags.index') !!}" class="btn btn-flat btn-danger">{!! __('List') !!}</a>
                </div>
            </div>

        @include('backend.partials.contents.search', ['key' => 'tags'])
        <!-- /.box-header -->

            <div class="box-body">

            @include('backend.tags.list', ['locale' => null])
            <!-- /.row -->
            </div>

        </div>
        <!-- /.box -->

    </section>

@endsection

