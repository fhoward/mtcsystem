@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schedules.title')</h3>
    
    {!! Form::model($schedule, ['method' => 'PUT', 'route' => ['admin.schedules.update', $schedule->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('')
        </div>

        <div class="panel-body">

         <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.schedules.fields.staff')</th>
                            <td field-key='staff'>{{ $schedule->staff->name or '' }} </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.emp-id')</th>
                            <td field-key='emp_id'>{{ isset($schedule->staff) ? $schedule->staff->emp_id : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schedules.fields.patient')</th>
                            <td field-key='patient'>{{ $schedule->patient->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.guardians-name')</th>
                            <td field-key='guardians_name'>{{ isset($schedule->patient) ? $schedule->patient->guardians_name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.contact-number')</th>
                            <td field-key='contact_number'>{{ isset($schedule->patient) ? $schedule->patient->contact_number : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schedules.fields.activity')</th>
                            <td field-key='activity'>{{ $schedule->activity }}</td>
                        </tr>
                {{--         <tr>
                            <th>@lang('quickadmin.schedules.fields.activity')</th>
                            <td field-key='activity'>{{ $schedule->activity }}</td>
                        </tr> --}}
                   {{--      <tr>
                            <th>@lang('quickadmin.schedules.fields.status')</th>
                            <td field-key='status'>{{ $schedule->status }}</td>
                        </tr> --}}
                        <tr>
                            <th>@lang('quickadmin.schedules.fields.date')</th>
                            <td field-key='date'>{{ $schedule->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schedules.fields.start')</th>
                            <td field-key='start'>{{ $schedule->start }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schedules.fields.end')</th>
                            <td field-key='end'>{{ $schedule->end }}</td>
                        </tr>
                        </table>
                        </div>
                        </div>
                        </div>

           
            
             <div class="row" style="display: none;">
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
            <div class="row" style="display: none;">
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
            <div class="row" style="display: none;">
                <div class="col-xs-12 form-group">
                    {!! Form::label('activity', 'Treatment', ['class' => 'control-label']) !!}
                    {!! Form::text('activity', old('activity'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('activity'))
                        <p class="help-block">
                            {{ $errors->first('activity') }}
                        </p>
                    @endif
                </div>
            </div>
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
                            {!! Form::radio('status', 'Attended', false, []) !!}
                            Attended
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('status', 'Unattended', false, []) !!}
                            Unattended
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row" style="display: none;">
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
            <div class="row" style="display: none;">
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
            <div class="row" style="display: none;">
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
                <div style="margin: 50px";>
                     {!! Form::submit(trans('Save'), ['class' => 'btn btn-danger', 'style' => 'width:250px;' ]) !!}
                     {!! Form::close() !!} 
                </div>    
        </div>
    </div>

 
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