@extends('reactor.layout.base')
<?php $_withForm = true; ?>

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Locations'),'breadcrumb => []'])


    <section class="content">


        <div class="row">
            <div class="col-md-9 border-right">

                {!! form_start($form) !!}

                <div class="nav-tabs-custom" style="cursor: move;">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">
                        <li class="pull-left header">
                            <a href="tab1#">
                                <i class="fa fa-inbox"></i> {!! uppercase(__('Edit')) !!}
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content no-padding">

                        <div class="tab-pane active" id="node">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! form_row($form->title)  !!}
                                    </div>
                                </div>

                                <div class="hidden">
                                    <div class="col-md-12">
                                        {!! form_row($form->node_name)  !!}
                                    </div>
                                </div>


                                <hr>
                                {!! form_row($form->meta_title)  !!}
                                {!! form_row($form->meta_keywords)  !!}
                                {!! form_row($form->meta_description)  !!}


                                <div class="row">
                                    <div class="col-md-4">
                                        {!! form_row($form->popular)  !!}
                                    </div>
                                </div>


                            </div>

                        </div>

                        <!-- Morris chart - Sales -->

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-action btn-black">
                            <i class="fa fa-save"></i>Save
                        </button>
                    </div>

                </div>

                {!! form_end($form) !!}

            </div>

            <div class="col-md-3">

                @include('Locations::partials.options_list',['_edit' => true])

            </div>

        </div>

    </section>
    <!-- /.content -->

@endsection