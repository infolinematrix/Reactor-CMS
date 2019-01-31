<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">
            {!! __('OPTIONS') !!}
        </h3>

    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <ul class="list-group">
            @if($node->canHaveMoreTranslations())
                <li class="list-group-item">
                    <i class="fa fa-globe"></i>
                    <a href="{{ route('reactor.location.translation.create', $node->getKey()) }}">
                        {{ __('Add Translation') }}</a>
                </li>
            @endif

            @if(isset($_edit) && $_edit === true && (count($node->translations) > 1))
                <li class="list-group-item">
                    {!! delete_form(
                        route('reactor.location.translation.destroy', $source->getKey()),
                        trans('Delete Translation'), '', false, 'icon-trash') !!}
                </li>
            @endif


            @if($node->canHaveChildren())
                <li class="list-group-item">
                    <i class="fa fa-plus"></i>
                    <a href="{{ route('reactor.location.create', $node->getKey()) }}">
                        {{ __('Add Child') }}</a>
                </li>
            @endif

            @if( ! $node->isLocked())
                <li class="list-group-item divider"></li>
                <li class="list-group-item">
                    <i class="fa fa-folder-open"></i>
                    <a href="{{ route('reactor.nodes.move', $node->getKey()) }}">
                        {{ __('Movie') }}</a>
                </li>
            @endif


            <li class="list-group-item">{!! node_option_form(
                $node->isPublished() ? route('reactor.nodes.unpublish', $node->getKey()) : route('reactor.nodes.publish', $node->getKey()),
                $node->isPublished() ? 'fa fa-check' : 'fa fa-remove text-danger',
                $node->isPublished() ? 'nodes.unpublish' : 'nodes.publish') !!}
            </li>

            <li class="list-group-item">
                {!! delete_form(
                    route('reactor.nodes.destroy', $node->getKey()),
                    __('Delete (with Child)')) !!}
            </li>

        </ul>

    </div>
</div>