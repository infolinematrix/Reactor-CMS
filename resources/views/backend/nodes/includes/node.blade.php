<div class="box-body clearfix">

    {!! form_row($form->title)  !!}
    {!! form_row($form->node_name)  !!}

    <hr>
    {!! form_rest($form) !!}

    <hr>
    @if($node->isTaggable())
        @include('backend.partials.nodes.tags', ['tags' => $node->tags])
    @endif
</div>