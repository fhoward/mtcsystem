@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schedules.title')</h3>
    @can('schedule_create')
    <p>
        <a href="{{ route('admin.schedules.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('schedule_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.schedules.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.schedules.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Archived</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('schedule_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('schedule_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan
                        <th>@lang('Status')</th>
                        <th>@lang('quickadmin.schedules.fields.staff')</th>
                        {{-- <th>@lang('quickadmin.users.fields.emp-id')</th> --}}
                        <th>@lang('quickadmin.schedules.fields.date')</th>
                        <th>@lang('quickadmin.schedules.fields.patient')</th>
                        <th>@lang('quickadmin.patients.fields.guardians-name')</th>
                        <th>@lang('quickadmin.patients.fields.contact-number')</th>
                        <th>@lang('quickadmin.schedules.fields.activity')</th>
                        <th>@lang('quickadmin.schedules.fields.date')</th>
                        {{-- <th>@lang('quickadmin.schedules.fields.start')</th>
                        <th>@lang('quickadmin.schedules.fields.end')</th> --}}
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('schedule_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.schedules.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.schedules.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [
                @can('schedule_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan
                {data: 'status', name: 'status'},
                {data: 'staff.name', name: 'staff.name'},
                {data: 'date', name: 'date'},
                {data: 'patient.name', name: 'patient.name'},
                {data: 'patient.guardians_name', name: 'patient.guardians_name'},
                {data: 'patient.contact_number', name: 'patient.contact_number'},
                {data: 'activity', name: 'activity'},
                // {data: 'date', name: 'date'},
                // {data: 'start', name: 'start'},
                // {data: 'end', name: 'end'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection