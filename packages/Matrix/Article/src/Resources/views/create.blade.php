@extends('backend.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
@include('backend.partials.content_header',['title' => __('Article'),'breadcrumb => []'])


    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {!! __($pageTitle) !!}

                </h3>



                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.article.index') !!}" class="btn btn-flat btn-danger">List</a>
                </div>
            </div>
            <!-- /.box-header -->

            {!! form_start($form) !!}

            <div class="box-body">

                <div class="row">
                    <div class="col-md-8 border-right">
                        <div class="row">
                            <div class="col-md-6">
                                {!! form_row($form->locale)  !!}
                            </div>
                            <div class="hidden col-md-6">
                                {!! form_row($form->type)  !!}
                            </div>
                        </div>

                        {!! form_row($form->title)  !!}
                        {!! form_row($form->node_name)  !!}

                        {!! form_row($form->content) !!}


                        <div class="row">
                            <div class="col-md-12">
                                <label>Image
                                    ({!! config('Article.image_size.width').' X '. config('Article.image_size.height') !!}
                                    )</label>
                                {!! form_row($form->image)  !!}
                            </div>

                        </div>


                    </div>

                    <div class="col-md-4">

                    </div>
                </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-action btn-black">
                    <i class="fa fa-save"></i>Save
                </button>
            </div>

            {!! form_end($form,false) !!}

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection