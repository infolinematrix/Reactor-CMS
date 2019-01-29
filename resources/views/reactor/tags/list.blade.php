<table class="table table-striped">
    <tbody>
    @if($tags->count() > 0)
        <tr>
            <th>{!! __('#ID') !!}</th>
            <th>{!! __('Title') !!}</th>
            <th>{!! __('Tag Name') !!}</th>
            <th>{!! __('Updated') !!}</th>
            <th>{!! __('Locale') !!}</th>
            <th class="text-right">{!! __('Action') !!}</th>
        </tr>

        @foreach($tags as $tag)
            <tr>
                <td>#{!! $tag->getKey() !!}</td>
                <td>{!! $tag->title !!}</td>
                <td>{!! $tag->tag_name !!}</td>
                <td>{!! $tag->updated_at !!}</td>
                <td>{!! $tag->translate()->locale !!}</td>
                <td class="text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs" data-toggle="dropdown">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="{{ route('reactor.tags.edit', [$tag->getKey(), $tag->translate()->getKey()]) }}"><i
                                            class="fa fa-ellipsis-v "></i> {!! __('Edit') !!}</a>
                            </li>
                            <li>
                                <a href="{{ route('reactor.tags.translations.create', [$tag->getKey(), $tag->translate()->getKey()]) }}"><i
                                            class="fa fa-ellipsis-v "></i> {!! __('Translate') !!}</a>
                            </li>
                            <li>
                                <a href="{{ route('reactor.tags.nodes', [$tag->getKey(), $tag->translate()->getKey()]) }}"><i
                                            class="fa fa-ellipsis-v "></i> {!! __('Nodes') !!}</a>
                            </li>
                            <li class="divider"></li>
                            <li>

                                <form action="{{ route('reactor.tags.destroy', $tag->getKey()) }}" method="POST"
                                      class="delete-form">
                                    {!! method_field('DELETE') . csrf_field() !!}
                                    <button class="btn-link" type="submit"><i
                                                class="fa fa-trash"></i>{!! __('Delete') !!}</button>
                                </form>

                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        {!! no_results_row(__('No Tags found ...')) !!}
    @endif

    </tbody>
</table>

