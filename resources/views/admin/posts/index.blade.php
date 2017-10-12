@extends('layouts.admin')
@section('content')

  @if(Session::has('deleted_post'))
    <p class="bg-danger">{{session('deleted_post')}}</p>
  @endif

<h1>Posts</h1>
<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Photo</th>
      <th>Owner</th>
      <th>Category</th>
      <th>Title</th>
      <th>Body</th>
      <th>Created</th>
      <th>Updated</th>
      <th>Link</th>
      <th>Comments</th>
    </tr>
  </thead>
  <tbody>
    @if($posts)
      @foreach($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td><img width="80" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
          <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
          <td>{{$post->category ? $post->category->name : 'None'}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->body}}</td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->updated_at->diffForHumans()}}</td>
          <td><a href="{{route('home.post',$post->slug)}}">Post</a></td>
          <td><a href="{{route('admin.comments.show', $post->id)}}">Comments</a></td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>

<div class="row">
  <div class="col-xs-12" style="text-align: center;">
    {{$posts->render()}}
  </div>
</div>
@stop
