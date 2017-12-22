@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schedules.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.schedules.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('staff_id', trans('quickadmin.schedules.fields.staff'), ['class' => 'control-label']) !!}
                    {!! Form::select('staff_id', $staff, old('staff_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('staff_id'))
                        <p class="help-block">
                            {{ $errors->first('staff_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('patient_id', trans('quickadmin.schedules.fields.patient'), ['class' => 'control-label']) !!}
                    {!! Form::select('patient_id', $patients, old('patient_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('patient_id'))
                        <p class="help-block">
                            {{ $errors->first('patient_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('activity','Treatment', ['class' => 'control-label']) !!}
                    {!! Form::text('activity', old('activity'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('activity'))
                        <p class="help-block">
                            {{ $errors->first('activity') }}
                        </p>
                    @endif
                </div>
            </div>
           {{--  <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('quickadmin.schedules.fields.status'), ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('status', 'present', false, []) !!}
                            Present
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('status', 'absent', false, []) !!}
                            Absent
                        </label>
                    </div>
                    
                </div>
            </div> --}}
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', trans('quickadmin.schedules.fields.date'), ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start', 'Start Time', ['class' => 'control-label']) !!}
                    {!! Form::text('start', old('start'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start'))
                        <p class="help-block">
                            {{ $errors->first('start') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('end', 'End Time', ['class' => 'control-label']) !!}
                    {!! Form::text('end', old('end'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('end'))
                        <p class="help-block">
                            {{ $errors->first('end') }}
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
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.timepicker').datetimepicker({
            autoclose: true,
            timeFormat: "HH:mm:ss",
            timeOnly: true
        });
    </script>

@stop