@extends('backend.layout.base')

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('backend.partials.content_header',['title' => 'Users','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("User Roles") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.roles.create') !!}" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


                <div class="pt10">

                    @include('backend.roles.list')

                </div>

                <!-- /.row -->
            </div>

            <div class="box-footer">
                @include('backend.partials.contents.pagination', ['paginator' => $roles])
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection



