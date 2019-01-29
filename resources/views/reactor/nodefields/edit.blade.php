<<<<<<< HEAD

=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
@extends('layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Node Fields'),'breadcrumb => []'])

    <section class="content">
<<<<<<< HEAD


        <!-- SELECT2 EXAMPLE -->
=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {!! $nodetype->label!!} :: {!! $pageTitle !!} ({!! $nodefield->name !!})
                </h3>
<<<<<<< HEAD

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.nodetypes.fields', $nodetype->getKey()) !!}"
                       class="btn btn-flat btn-danger">{!! __('List') !!}</a>
                </div>
            </div>


            {{ Form::model($nodefield,
                            ['method' => 'PUT',
                             'url' => route('reactor.nodefields.update', $nodefield->getKey())]
                        ) }}

            @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-8 border-right">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! form_row($form->label)  !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! form_row($form->visible)  !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! form_row($form->position)  !!}
                                </div>
                            </div>
                        </div>

                        {!! form_row($form->rules)  !!}

                        {!! form_row($form->default_value)  !!}

                        {!! form_row($form->options)  !!}

                        {!! form_row($form->description)  !!}

=======
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
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
                    </div>

                    <div class="col-md-4">

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-action btn-black">
<<<<<<< HEAD
                    <i class="fa fa-save"></i>Save
                </button>
            </div>

            {{ Form::close() }}
=======
                    <i class="fa fa-save"></i>Save</button>
            </div>


>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
        </div>
        <!-- /.box -->


<<<<<<< HEAD
=======


>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    </section>
    <!-- /.content -->

@endsection