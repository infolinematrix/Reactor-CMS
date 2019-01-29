@extends('backend.layout.base')
<?php $_withForm = true; ?>

        <!-- Main content -->
@section('content')
        <!-- Content Header (Page header) -->
@include('backend.partials.content_header',['title' =>  __('Article'),'breadcrumb => []'])


<section class="content">

    <div class="row">
        <div class="col-md-9 border-right">

            {!! form_start($form) !!}

            <div class="nav-tabs-custom" style="cursor: move;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">

                    <li>
                        <a href="#seo" data-toggle="tab" aria-expanded="false"><i
                                    class="fa fa-magnet"></i> {!! uppercase(__('SEO')) !!}</a>
                    </li>

                    <li class="active">
                        <a href="#node" data-toggle="tab" aria-expanded="true"><i
                                    class="fa fa-code-fork"></i> {!! uppercase(__('Node')) !!}</a>
                    </li>

                    <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Edit')) !!}</li>
                </ul>

                <div class="tab-content no-padding">

                    <div class="tab-pane active" id="node">

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! form_row($form->title)  !!}
                                    {!! form_row($form->node_name)  !!}
                                    {!! form_row($form->content)  !!}


                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Image
                                        ({!! config('Article.image_size.width').' X '. config('Article.image_size.height') !!}
                                        )</label>
                                    {!! form_row($form->image)  !!}
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="tab-pane" id="seo">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! form_row($form->meta_title)  !!}
                                    {!! form_row($form->meta_keywords)  !!}
                                    {!! form_row($form->meta_description)  !!}
                                </div>
                            </div>

                        </div>
                    </div>
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

            @include('Article::partials.options_list',['_edit' => true])

        </div>
    </div>

</section>
<!-- /.content -->

@endsection