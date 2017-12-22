@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schedules.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

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

            <p>&nbsp;</p>
            {{-- @if --}}
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
