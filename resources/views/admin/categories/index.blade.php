@extends('layouts.admin') @section('content')


<h1>Kategorie</h1>

<div class="col-xs-6">
	{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
	<div class="form-group">
		{!! Form::label('name', 'Nazwa') !!} {!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!!Form::submit('Utwórz', ['class'=>'btn btn-primary'])!!}
	</div>
	{!! Form::close() !!}
</div>
<div class="col-xs-6">
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nazwa</th>
				<th>Utworzone</th>
			</tr>
		</thead>
		<tbody>
			@if($categories) @foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>
					<a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a>
				</td>
				<td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
			</tr>
			@endforeach @endif
		</tbody>
	</table>
</div>

@stop
