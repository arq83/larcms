@extends('layouts.admin') @section('content')


<h1>Edycja</h1>

<div class="col-xs-6">
	{!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
	<div class="form-group">
		{!! Form::label('name', 'Nazwa') !!} {!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!!Form::submit('Update', ['class'=>'btn btn-primary'])!!}
	</div>
	{!! Form::close() !!} {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]])
	!!}
	<div class="form-group">
		{!!Form::submit('Usuń', ['class'=>'btn btn-danger'])!!}
	</div>
	{!! Form::close() !!}
</div>




@stop
