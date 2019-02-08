<div class="dropdown">
    <button class="btn btn-primary btn-xs dropdown-toggle " type="button" data-toggle="dropdown">{!! __('Options') !!}
        <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right">
        <li>
            <a href="{!! route('reactor.reviews.view',[$node->id]) !!}">{!! __('View Review') !!}</a>
        </li>
        <li>
            <a href="{!! route('reactor.reviews.destroy',[$node->id]) !!}"><i class="fa fa-trash"></i> </a>
        </li>
    </ul>


</div>
