@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contacts.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.company')</th>
                            <td field-key='company'>{{ $contact->company->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.name')</th>
                            <td field-key='name'>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.phone1')</th>
                            <td field-key='phone1'>{{ $contact->phone1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.email')</th>
                            <td field-key='email'>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.address')</th>
                            <td field-key='address'>{{ $contact->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.date')</th>
                            <td field-key='date'>{{ $contact->date }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contacts.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
