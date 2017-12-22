@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.roles.title')</h3>
    @can('role_create')
    <p>
        
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>@lang('quickadmin.roles.fields.title')</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($roles) > 0)
                        @foreach ($roles as $role)
                            <tr data-entry-id="{{ $role->id }}">
                                
                                <td field-key='title'>{{ $role->title }}</td>
                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection