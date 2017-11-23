@extends('layouts.admin') @section('content') @if(Session::has('deleted_user'))
<p class="bg-danger">{{session('deleted_user')}}</p>
@endif

<h1>Użytkownicy</h1>
<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Foto</th>
			<th>Imie</th>
			<th>Email</th>
			<th>Rola</th>
			<th>Status</th>
			<th>Utworzone</th>
			<th>Zaktualizowane</th>
		</tr>
	</thead>
	<tbody>
		@if($users) @foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>
				@isset($user->photo)
				<img height="50" src="{{$user->photo->file}}" alt=""> @endisset @empty($user->photo)
				<img height="50" src="https://www.gravatar.com/avatar/{{ md5($user->email) }}?d=robohash" alt=""> @endempty

			</td>
			<td>
				<a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a>
			</td>
			<td>{{$user->email}}</td>
			<td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
			<td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
			<td>{{$user->created_at}}</td>
			<td>{{$user->updated_at->diffForHumans()}}</td>
		</tr>
		@endforeach @endif
	</tbody>
</table>
@stop
