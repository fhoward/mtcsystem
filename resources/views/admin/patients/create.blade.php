@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.patients.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.patients.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('assigned_therapist', trans('quickadmin.patients.fields.assigned-therapist'), ['class' => 'control-label']) !!}
                    {!! Form::select('assigned_therapist[]', $assigned_therapists, old('assigned_therapist'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('assigned_therapist'))
                        <p class="help-block">
                            {{ $errors->first('assigned_therapist') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image', trans('quickadmin.patients.fields.image'), ['class' => 'control-label']) !!}
                    {!! Form::file('image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_max_size', 8) !!}
                    {!! Form::hidden('image_max_width', 2000) !!}
                    {!! Form::hidden('image_max_height', 2000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Full Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Last Name, First M.I.', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gender', trans('quickadmin.patients.fields.gender'), ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gender'))
                        <p class="help-block">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('gender', 'male', false, []) !!}
                            Male
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('gender', 'female', false, []) !!}
                            Female
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('birthday', trans('quickadmin.patients.fields.birthday'), ['class' => 'control-label']) !!}
                    {!! Form::date('birthday', old('birthday'), ['class' => 'form-control','min'=>"1950-01-02", 'placeholder' => '']) !!}
                   {{--  {!! Form::date('birthday', old('birthday')) !!} --}}
                    <p class="help-block"></p>
                    @if($errors->has('birthday'))
                        <p class="help-block">
                            {{ $errors->first('birthday') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('guardians_name', trans('quickadmin.patients.fields.guardians-name'), ['class' => 'control-label']) !!}
                    {!! Form::text('guardians_name', old('guardians_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('guardians_name'))
                        <p class="help-block">
                            {{ $errors->first('guardians_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contact_number', trans('quickadmin.patients.fields.contact-number'), ['class' => 'control-label']) !!}
                    {!! Form::text('contact_number', old('contact_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contact_number'))
                        <p class="help-block">
                            {{ $errors->first('contact_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address', trans('quickadmin.patients.fields.address'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('address', old('address'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('doctors_name', trans('quickadmin.patients.fields.doctors-name'), ['class' => 'control-label']) !!}
                    {!! Form::text('doctors_name', old('doctors_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('doctors_name'))
                        <p class="help-block">
                            {{ $errors->first('doctors_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('remarks', trans('quickadmin.patients.fields.remarks'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('remarks'))
                        <p class="help-block">
                            {{ $errors->first('remarks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('file', 'Other Files', ['class' => 'control-label']) !!}
                    {!! Form::file('file', ['class' => 'form-control']) !!}
                    {!! Form::hidden('file_max_size', 15) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file'))
                        <p class="help-block">
                            {{ $errors->first('file') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop