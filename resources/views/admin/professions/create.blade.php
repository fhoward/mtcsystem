@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.professions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.professions.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('profession', trans('quickadmin.professions.fields.profession'), ['class' => 'control-label']) !!}
                    {!! Form::text('profession', old('profession'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('profession'))
                        <p class="help-block">
                            {{ $errors->first('profession') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

