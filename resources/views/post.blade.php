@extends('layouts.blog-post') @section('content')

<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
	Autor:
	<a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p>
	<span class="glyphicon glyphicon-time"></span> Utworzone {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="">

<hr>

<!-- Post Content -->
<p class="lead">{!! $post->body !!}</p>
{{--
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati
	impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p> --}}

<hr> @if (Session::has('comment_message')) {{session('comment_message')}} @endif

<!-- Blog Comments -->

@if (Auth::check())
<!-- Comments Form -->
<div class="well">
	<h4>Zostaw komentarz:</h4>
	{!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
	<input type="hidden" name="post_id" value="{{$post->id}}">
	<div class="form-group">
		{!! Form::label('body', 'Treść:') !!} {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}
	</div>
	<div class="form-group">
		{!!Form::submit('Wyślij', ['class'=>'btn btn-primary'])!!}
	</div>
	{!! Form::close() !!}
</div>
@endif



<hr> @if (count($comments)>0)
<!-- Posted Comments -->
@foreach ($comments as $comment)
<!-- Comment -->
<div class="media">
	<a class="pull-left" href="#">

		<img width="60" class="media-object" src="{{$comment->photo}}" alt="">
		<!-- <img width="60" class="media-object" src="{{Auth::user()->gravatar}}" alt=""> -->
	</a>
	<div class="media-body">

		<h4 class="media-heading">{{$comment->author}}
			<small>{{$comment->created_at->diffForHumans()}}</small>
		</h4>
		{{$comment->body}}

		<div class="comment-reply-container clearfix">
			<button class="toogle-reply btn btn-primary pull-right">Odpowiedz</button>

			<div class="comment-reply col-xs-6">
				{!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
				<input type="hidden" name="comment_id" value="{{$comment->id}}">
				<div class="form-group">
					{!! Form::label('body', 'Body:') !!} {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1]) !!}
				</div>
				<div class="form-group">
					{!!Form::submit('Wyślij', ['class'=>'btn btn-primary'])!!}
				</div>
				{!! Form::close() !!}
			</div>


		</div>

		@if (count($comment->replies)>0) @foreach ($comment->replies as $reply) @if ($reply->is_active == 1)



		<!-- Nested Comment -->
		<div class="media">
			<a class="pull-left" href="#">
				<img height="30" class="media-object" src="{{$reply->photo}}" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading">{{$reply->author}}
					<small>{{$reply->created_at->diffForHumans()}}</small>
				</h4>
				{{$reply->body}}
			</div>

			<div class="comment-reply-container col-xs-10">
				<button class="toogle-reply btn btn-primary pull-right">Odpowiedz</button>

				<div class="comment-reply col-xs-6">
					{!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
					<input type="hidden" name="comment_id" value="{{$comment->id}}">
					<div class="form-group">
						{!! Form::label('body', 'Body:') !!} {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1]) !!}
					</div>
					<div class="form-group">
						{!!Form::submit('Wyślij', ['class'=>'btn btn-primary'])!!}
					</div>
					{!! Form::close() !!}
				</div>


			</div>
			<!-- End Nested Comment -->
		</div>

		@endif @endforeach @endif

	</div>
</div>
@endforeach @endif @stop @section('scripts')
<script>
	$(".comment-reply").hide();
    $(".comment-reply-container .toogle-reply").click(function(){
      $(this).next().slideToggle("slow");
    });

</script>
@stop
