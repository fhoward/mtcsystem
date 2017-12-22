

@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'route' => [$routeKey.'.restore', $row->id])) !!}
    {!! Form::submit(trans('Activate'), array('class' => 'btn btn-xs btn-success')) !!}
    {!! Form::close() !!}
@endcan
@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => [$routeKey.'.perma_del', $row->id])) !!}
    {{-- {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!} --}}
    {!! Form::close() !!}
@endcan