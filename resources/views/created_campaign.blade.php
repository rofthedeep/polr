@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/shorten_result.css' />
@endsection

@section('content')
<h3>Created Campaign: {{$message}}</h3>

<a href="/admin#campaigns" class='btn btn-info back-btn'>Back to Admin</a>

@endsection

@section('js')
<script src='/js/shorten_result.js'></script>
@endsection
