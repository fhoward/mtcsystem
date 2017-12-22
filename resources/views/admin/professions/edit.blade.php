@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.professions.title')</h3>
    
    {!! Form::model($profession, ['method' => 'PUT', 'route' => ['admin.professions.update', $profession->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

