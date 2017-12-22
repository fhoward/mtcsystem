@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.avatar')</th>
                            <td field-key='avatar'>@if($user->avatar)<a href="{{ asset(env('UPLOAD_PATH').'/' . $user->avatar) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $user->avatar) }}" style="width:100px; height:100px;  "/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.emp-id')</th>
                            <td field-key='emp_id'>{{ $user->emp_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.rfid-no')</th>
                            <td field-key='rfid_no'>{{ $user->rfid_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td field-key='role'>{{ $user->role->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.gender')</th>
                            <td field-key='gender'>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.contact-no')</th>
                            <td field-key='contact_no'>{{ $user->contact_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.profession')</th>
                            <td field-key='profession'>{{ $user->profession->profession or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.prc-number')</th>
                            <td field-key='prc_number'>{{ $user->prc_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.sss-id')</th>
                            <td field-key='sss_id'>{{ $user->sss_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.tin-no')</th>
                            <td field-key='tin_no'>{{ $user->tin_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.philhealth-id')</th>
                            <td field-key='philhealth_id'>{{ $user->philhealth_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.guardian-name')</th>
                            <td field-key='guardian_name'>{{ $user->guardian_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.guardian-contact-no')</th>
                            <td field-key='guardian_contact_no'>{{ $user->guardian_contact_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.guardian-address')</th>
                            <td field-key='guardian_address'>{!! $user->guardian_address !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#patients" aria-controls="patients" role="tab" data-toggle="tab">Patients</a></li>
<li role="presentation" class=""><a href="#schedules" aria-controls="schedules" role="tab" data-toggle="tab">Schedules</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="patients">
<table class="table table-bordered table-striped {{ count($patients) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.patients.fields.assigned-therapist')</th>
                        <th>@lang('quickadmin.patients.fields.image')</th>
                        <th>@lang('quickadmin.patients.fields.name')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($patients) > 0)
            @foreach ($patients as $patient)
                <tr data-entry-id="{{ $patient->id }}">
                    <td field-key='assigned_therapist'>
                                    @foreach ($patient->assigned_therapist as $singleAssignedTherapist)
                                        <span class="label label-info label-many">{{ $singleAssignedTherapist->name }}</span>
                                    @endforeach
                                </td>
                                <td field-key='image'>@if($patient->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $patient->image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $patient->image) }}"/></a>@endif</td>
                                <td field-key='name'>{{ $patient->name }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('patient_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.patients.restore', $patient->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('patient_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.patients.perma_del', $patient->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('patient_view')
                                    <a href="{{ route('admin.patients.show',[$patient->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('patient_edit')
                                    <a href="{{ route('admin.patients.edit',[$patient->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('patient_delete')
                                {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.patients.destroy', $patient->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="16">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="schedules">
<table class="table table-bordered table-striped {{ count($schedules) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            {{-- <th>@lang('quickadmin.schedules.fields.staff')</th> --}}
                        <th>@lang('status')</th>
                        <th>@lang('quickadmin.schedules.fields.patient')</th>
                        <th>@lang('quickadmin.patients.fields.guardians-name')</th>
                        <th>@lang('quickadmin.patients.fields.contact-number')</th>
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
                    {{-- <td field-key='staff'>{{ $schedule->staff->name or '' }}</td> --}}
@if($schedule->status == 'present')
                            <td field-key='patient' style="background-color:green; color:white"><strong>{{ $schedule->status or '' }}</strong></td>
                           @else
                           <td field-key='patient' style="background-color:red; color:white"> <strong>{{ $schedule->status or '' }}</strong></td>
                           @endif
                                <td field-key='patient'>{{ $schedule->patient->name or '' }}</td>
<td field-key='guardians_name'>{{ isset($schedule->patient) ? $schedule->patient->guardians_name : '' }}</td>
<td field-key='contact_number'>{{ isset($schedule->patient) ? $schedule->patient->contact_number : '' }}</td>
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

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
