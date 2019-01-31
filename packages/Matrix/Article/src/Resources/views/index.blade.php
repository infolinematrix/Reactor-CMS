@extends('backend.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
@include('backend.partials.content_header',['title' => __('Article'),'breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __('All') !!}</h3>
                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.article.create') !!}" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                @if(count($nodes) > 0 )
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>{!! __('#ID') !!}</th>
                            <th>{!! __('Title') !!}</th>
                            <th width="30%">{!! __('Slug') !!}</th>
                            <th>{!! __('Type') !!}</th>
                            <th>{!! __('Updated') !!}</th>
                            <th>{!! __('Locale') !!}</th>
                            <th class="text-right">{!! __('Action') !!}</th>
                        </tr>

                        @foreach($nodes as $node)
                            <tr>
                                <td>#{!! $node->getKey() !!}</td>
                                <td>
                                    {!! link_to_route('reactor.article.edit', str_limit($node->title,25), [$node->getKey(),$node->translate(locale())->getKey()]) !!}
                                </td>
                                <td>{!! str_limit($node->node_name,25) !!}</td>
                                <td>{!! $node->getNodeType()->label !!}</td>
                                <td>{!! $node->created_at->formatLocalized('%b %e, %Y') !!}</td>
                                <td>{!! locale() !!}</td>
                                <td class="text-right">
                                    @include('Article::partials.options',['node' => $node])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            @else
                {!! no_results_row(__('No Nodes found ...')) !!}
            @endif
            <!-- /.row -->
            </div>

            <div class="box-footer">
                @if(!is_null($nodes) && count($nodes) > 0)
                    @include('backend.partials.contents.pagination', ['paginator' => $nodes])
                @endif
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection