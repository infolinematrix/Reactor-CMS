@extends('backend.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('backend.partials.content_header',['title' => __('Node Fields'),'breadcrumb => []'])

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {!! $nodetype->label!!} :: {!! $pageTitle !!} ({!! $nodefield->name !!})
                </h3>
                <div class="box-tools pull-right">
                    {!! action_button(route('reactor.nodetypes.fields', $nodetype->getKey()),'fa-bars','List') !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 border-right">

                        {!! form_start($form) !!}

                        {!! form_row($form->label)  !!}

                        <div class="row">
                            <div class="col-md-3">
                                {!! form_row($form->indexed)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->visible)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->position)  !!}
                            </div>
                        </div>


                        {!! form_end($form) !!}
                    </div>

                    <div class="col-md-4">

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-action btn-black">
                    <i class="fa fa-save"></i>Save</button>
            </div>


        </div>
        <!-- /.box -->




    </section>
    <!-- /.content -->

@endsection