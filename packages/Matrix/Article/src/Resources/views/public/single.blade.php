@extends('layout.inner')
@section('pageTitle', $pageTitle)

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')

    <div class="row">
        <div class="blog-page">
            <div class="col-md-9">

                <div class="blog-post  wow fadeInUp">

                    <?php $img = Images($article->getKey(), 1); ?>
                    <a href="{!! route('article.single',$article->getName()) !!}">
                        <img class="img-responsive"
                             src="{!! asset('public/uploads/'.($img ? $img->path : 'no-image.png')) !!}"
                             alt="{!! $article->getTitle() !!}"></a>

                    <h1>{!! $article->getTitle() !!}</h1>
                    <span class="date-time">{!! date('d-M-Y', strtotime($article->updated_at)) !!}</span>
                    <p>{!! $article->content !!}</p>
                </div>

            </div>
            <div class="col-md-3 col-xs-12 sidebar">
                <div class="sidebar-widget product-tag wow fadeInUp animated"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <h3 class="section-title">Other Articles</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="tag-list">
                            @foreach($nodes as $node)
                                <a class="item {!! ($node->getName() == $article->getName() ? '' : 'active') !!}active"
                                   title="{!! $node->getTitle() !!}"
                                   href="{!! route('article.single',$node->getName()) !!}">{!! $node->getTitle() !!}</a>
                            @endforeach
                        </div><!-- /.tag-list -->
                    </div><!-- /.sidebar-widget-body -->
                </div>
            </div>
        </div>

    </div>

@endsection
