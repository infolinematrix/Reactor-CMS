<div class="dropdown">
    <button class="btn btn-primary btn-xs dropdown-toggle " type="button" data-toggle="dropdown">{!! __('Options') !!}
        <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right">

        <li>
            <a href="{!! route('reactor.article.edit',[$node->getKey(),$node->translate(locale())->getKey()]) !!}">
                <i class="fa fa-edit"></i>
                {!! __('Edit Article') !!}</a>
        </li>
        <li>
            {!! delete_form(
                route('reactor.nodes.destroy', $node->getKey()),
                'Delete') !!}
        </li>
    </ul>


</div>
