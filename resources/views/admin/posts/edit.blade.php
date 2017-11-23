@extends('layouts.admin') @section('content') @include('includes.tinyeditor')
<h2>Edytuj</h2>

<div class="row">
	<div class="col-xs-3">
		<img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="">
	</div>
	<div class="col-xs-9">
		{!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('title', 'Tytuł') !!} {!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Kategoria') !!} {!! Form::select('category_id', $categories, null, ['class'=>'form-control'])
			!!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Foto') !!} {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('body', 'Opis') !!} {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!!Form::submit('Aktualizuj', ['class'=>'btn btn-primary'])!!}
		</div>
		{!! Form::close() !!} {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
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
