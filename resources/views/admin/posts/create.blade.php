@extends('layouts.admin') @section('content') @include('includes.tinyeditor')
<h2>Utwórz</h2>

<div class="row">
	{!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
	<div class="form-group">
		{!! Form::label('title', 'Tytuł') !!} {!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id', 'Kategoria') !!} {!! Form::select('category_id', [''=>'Wybierz kategorię'] + $categories,
		null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('photo_id', 'Foto') !!} {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body', 'Opis') !!} {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!!Form::submit('Utwórz Post', ['class'=>'btn btn-primary'])!!}
	</div>
	{!! Form::close() !!}
</div>

<div class="row">
	@include('includes.form_error')
</div>



@stop
