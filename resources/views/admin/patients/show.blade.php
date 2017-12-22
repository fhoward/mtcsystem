@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.patients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.patients.fields.assigned-therapist')</th>
                            <td field-key='assigned_therapist'>
                                @foreach ($patient->assigned_therapist as $singleAssignedTherapist)
                                    <span class="label label-info label-many">{{ $singleAssignedTherapist->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.image')</th>
                            <td field-key='image'>@if($patient->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $patient->image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $patient->image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.name')</th>
                            <td field-key='name'>{{ $patient->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.gender')</th>
                            <td field-key='gender'>{{ $patient->gender }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.birthday')</th>
                            <td field-key='birthday'>{{ $patient->birthday }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.guardians-name')</th>
                            <td field-key='guardians_name'>{{ $patient->guardians_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.contact-number')</th>
                            <td field-key='contact_number'>{{ $patient->contact_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.address')</th>
                            <td field-key='address'>{!! $patient->address !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.doctors-name')</th>
                            <td field-key='doctors_name'>{{ $patient->doctors_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.remarks')</th>
                            <td field-key='remarks'>{!! $patient->remarks !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.file')</th>
                            <td field-key='file'>@if($patient->file)<a href="{{ asset(env('UPLOAD_PATH').'/' . $patient->file) }}" target="_blank">View File</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#schedules" aria-controls="schedules" role="tab" data-toggle="tab">Schedules</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="schedules">
<table class="table table-bordered table-striped {{ count($schedules) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.schedules.fields.staff')</th>

                        <th>@lang('quickadmin.users.fields.emp-id')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('quickadmin.schedules.fields.activity')</th>
                        <th>@lang('quickadmin.schedules.fields.date')</th>
                        <th>@lang('quickadmin.schedules.fields.start')</th>
                        <th>@lang('quickadmin.schedules.fields.end')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($schedules) > 0)
            @foreach ($schedules as $schedule)
                <tr data-entry-id="{{ $schedule->id }}">
                    <td field-key='staff'>{{ $schedule->staff->name or '' }}</td>
                            <td field-key='emp_id'>{{ isset($schedule->staff) ? $schedule->staff->emp_id : '' }}</td>
                           @if($schedule->status == 'present')
                            <td field-key='patient' style="background-color:green; color:white"><strong>{{ $schedule->status or '' }}</strong></td>
                           @else
                           <td field-key='patient' style="background-color:red; color:white"> <strong>{{ $schedule->status or '' }}</strong></td>
                           @endif
                           

                                <td field-key='activity'>{{ $schedule->activity }}</td>
                                <td field-key='date'>{{ $schedule->date }}</td>
                                <td field-key='start'>{{ $schedule->start }}</td>
                                <td field-key='end'>{{ $schedule->end }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('schedule_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.schedules.restore', $schedule->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('schedule_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.schedules.perma_del', $schedule->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('schedule_view')
                                    <a href="{{ route('admin.schedules.show',[$schedule->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('schedule_edit')
                                    <a href="{{ route('admin.schedules.edit',[$schedule->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('schedule_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.schedules.destroy', $schedule->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.patients.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
