@extends('layouts.app')
@section('content')
<h2>{{ $note->title  }}</h2>
<a href="{{ route('note_edit',['id' => $note->id]) }}" class="btn btn-primary">Edit</a> 
<a href="{{ route('note_delete',['id' => $note->id]) }}" class="btn btn-danger">Delete</a> 
<li>
	Add Tag: <input type="text" name="tag"> 
	<a href="#" class="btn btn-info" id="btn-add-tag">Add</a>
</li>
<p class="text-justify">
	{{ $note->note }}
</p>
@endsection