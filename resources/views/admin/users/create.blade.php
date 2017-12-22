@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('avatar', trans('quickadmin.users.fields.avatar'), ['class' => 'control-label']) !!}
                    {!! Form::file('avatar', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('avatar_max_size', 5) !!}
                    {!! Form::hidden('avatar_max_width', 2000) !!}
                    {!! Form::hidden('avatar_max_height', 2000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('avatar'))
                        <p class="help-block">
                            {{ $errors->first('avatar') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('emp_id', 'Employee ID', ['class' => 'control-label']) !!}
                    {!! Form::text('emp_id', old('emp_id'), ['class' => 'form-control', 'placeholder' => '200*-**-**', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('emp_id'))
                        <p class="help-block">
                            {{ $errors->first('emp_id') }}
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
                    {!! Form::label('email', trans('quickadmin.users.fields.email'), ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <strong><div id='message'></div></strong>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', trans('quickadmin.users.fields.password'), ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control','id' =>'password','onkeyup'=>'check();', 'placeholder' => 'Input Password', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('confirm_password', trans('quickadmin.users.fields.confirm-password'), ['class' => 'control-label']) !!}
                    {!! Form::password('confirm_password', ['class' => 'form-control','id' =>'confirm_password','onkeyup'=>'check();', 'placeholder' => 'Confirm password', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('confirm_password'))
                        <p class="help-block">
                            {{ $errors->first('confirm_password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rfid_no', trans('quickadmin.users.fields.rfid-no'), ['class' => 'control-label']) !!}
                    {!! Form::number('rfid_no', old('rfid_no'), ['class' => 'form-control', 'id' => 'rfid_no','placeholder' => 'Tap ID', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rfid_no'))
                        <p class="help-block">
                            {{ $errors->first('rfid_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('role_id', trans('quickadmin.users.fields.role'), ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gender', trans('quickadmin.users.fields.gender'), ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gender'))
                        <p class="help-block">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('gender', 'Male', false, []) !!}
                            Male
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('gender', 'Female', false, []) !!}
                            Female
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contact_no', trans('quickadmin.users.fields.contact-no'), ['class' => 'control-label']) !!}
                    {!! Form::number('contact_no', old('contact_no'), ['class' => 'form-control', 'placeholder' => '09*********']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contact_no'))
                        <p class="help-block">
                            {{ $errors->first('contact_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('profession_id', trans('quickadmin.users.fields.profession'), ['class' => 'control-label']) !!}
                    {!! Form::select('profession_id', $professions, old('profession_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('profession_id'))
                        <p class="help-block">
                            {{ $errors->first('profession_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('prc_number', trans('quickadmin.users.fields.prc-number'), ['class' => 'control-label']) !!}
                    {!! Form::text('prc_number', old('prc_number'), ['class' => 'form-control', 'placeholder' => 'Input PRC License']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prc_number'))
                        <p class="help-block">
                            {{ $errors->first('prc_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sss_id', trans('quickadmin.users.fields.sss-id'), ['class' => 'control-label']) !!}
                    {!! Form::text('sss_id', old('sss_id'), ['class' => 'form-control', 'placeholder' => 'Input SSS Id']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sss_id'))
                        <p class="help-block">
                            {{ $errors->first('sss_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tin_no', trans('quickadmin.users.fields.tin-no'), ['class' => 'control-label']) !!}
                    {!! Form::text('tin_no', old('tin_no'), ['class' => 'form-control', 'placeholder' => 'Input TIN no']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tin_no'))
                        <p class="help-block">
                            {{ $errors->first('tin_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('philhealth_id', trans('quickadmin.users.fields.philhealth-id'), ['class' => 'control-label']) !!}
                    {!! Form::text('philhealth_id', old('philhealth_id'), ['class' => 'form-control', 'placeholder' => 'Input Philhealth ID']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('philhealth_id'))
                        <p class="help-block">
                            {{ $errors->first('philhealth_id') }}
                        </p>
                    @endif
                </div>
            </div>
        <strong><i>In Case of Emergency :</i></strong>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('guardian_name', trans('quickadmin.users.fields.guardian-name'), ['class' => 'control-label']) !!}
                    {!! Form::text('guardian_name', old('guardian_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('guardian_name'))
                        <p class="help-block">
                            {{ $errors->first('guardian_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('guardian_contact_no', trans('quickadmin.users.fields.guardian-contact-no'), ['class' => 'control-label']) !!}
                    {!! Form::number('guardian_contact_no', old('guardian_contact_no'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('guardian_contact_no'))
                        <p class="help-block">
                            {{ $errors->first('guardian_contact_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('guardian_address', trans('quickadmin.users.fields.guardian-address'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('guardian_address', old('guardian_address'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('guardian_address'))
                        <p class="help-block">
                            {{ $errors->first('guardian_address') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password Match';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password not Match';
  }
}

</script>
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@stop
