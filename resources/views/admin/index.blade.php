@extends('layouts.admin')
@section('content')

<h1>Admin</h1>
{{ Auth::user()->name }}<br/>
{{ Auth::user()->email }}<br/>
{{ Auth::user()->password }}<br/>




@stop
