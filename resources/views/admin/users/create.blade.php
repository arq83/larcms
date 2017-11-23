@extends('layouts.admin') @section('content')
<h2>Utwórz Użytkownika</h2>

{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
<div class="form-group">
	{!! Form::label('name', 'Imie') !!} {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email') !!} {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('role_id', 'Rola') !!} {!! Form::select('role_id', array(''=>'Choose Options') + $roles, null, ['class'=>'form-control'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('is_active', 'Status') !!} {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('photo_id', 'Foto') !!} {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('password', 'Password') !!} {!! Form::password('password', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!!Form::submit('Utwórz', ['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!} @include('includes.form_error') @stop
