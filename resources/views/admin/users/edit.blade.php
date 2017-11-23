@extends('layouts.admin') @section('content')
<h2>Edytuj</h2>

<div class="row">
	<div class="col-sm-3">
		@isset($user->photo)
		<img height="50" src="{{$user->photo->file}}" alt="" class="img-responsive img-rounded"> @endisset @empty($user->photo)
		<img height="50" src="https://www.gravatar.com/avatar/{{ md5($user->email) }}?d=robohash&s=300" alt="" class="img-responsive img-rounded"> @endempty
	</div>

	<div class="col-sm-9">
		{!! Form::model($user,array('method' => 'PATCH', 'action' => ['AdminUsersController@update',$user->id],'files'=>true)) !!}
		<div class="form-group">
			{!! Form::label('name', 'Imie') !!} {!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email') !!} {!! Form::email('email', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'Rola') !!} {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('is_active', 'Status') !!} {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control'])
			!!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Foto') !!} {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password') !!} {!! Form::password('password', ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!!Form::submit('Zapisz', ['class'=>'btn btn-primary'])!!}
		</div>
		{!! Form::close() !!} {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
		<div class="form-group">
			{!!Form::submit('Usuń', ['class'=>'btn btn-danger'])!!}
		</div>
		{!! Form::close() !!}

	</div>
</div>

<div class="row">
	@include('includes.form_error')
</div>

@stop
