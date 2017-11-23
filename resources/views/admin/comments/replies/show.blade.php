@extends('layouts.admin') @section('content')
<h1>Odpowiedzi</h1>

@if ($replies)
<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Autor</th>
			<th>Email</th>
			<th>Treść</th>
			{{--
			<th>Link</th> --}}
			<th>Akcept</th>
			<th>Usuń</th>
		</tr>
	</thead>
	<tbody>

		@foreach ($replies as $reply)
		<tr>
			<td>{{$reply->id}}</td>
			<td>{{$reply->author}}</td>
			<td>{{$reply->email}}</td>
			<td>{{$reply->body}}</td>
			{{--
			<td>
				<a href="{{route('home.post',$reply->comment->post->id)}}">Link</a>
			</td> --}}

			<td>
				@if ($reply->is_active == 1) {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]])
				!!}
				<input type="hidden" name="is_active" value="0">

				<div class="form-group">
					{!!Form::submit('Odrzuć', ['class'=>'btn btn-success'])!!}
				</div>
				{!! Form::close() !!} @else {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]])
				!!}
				<input type="hidden" name="is_active" value="1">

				<div class="form-group">
					{!!Form::submit('Akcept', ['class'=>'btn btn-info'])!!}
				</div>
				{!! Form::close() !!} @endif
			</td>

			<td>

				{!! Form::open(['method'=>'DELETE', 'action'=> ['CommentRepliesController@destroy', $reply->id]]) !!}

				<div class="form-group">
					{!!Form::submit('Usuń', ['class'=>'btn btn-danger'])!!}
				</div>
				{!! Form::close() !!}

			</td>

		</tr>
		@endforeach
	</tbody>
</table>

@else
<h1 class="text-center">No Replies</h1>

@endif @stop
