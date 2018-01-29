@extends('layouts.app')

@section('content')
    <h2>Notes List</h2>
    @foreach($notes as $note)
    <li>Title: {{ $note->title }}</li>
    <li>User: {{ $note->user->name }}</li>
    <li><p>{{ $note->note }}</p></li>
    <hr>
    @endforeach
@endsection