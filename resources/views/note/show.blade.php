@extends('layouts.app')
@section('content')
<h2>{{ $note->title  }}</h2>
<img src="{{ asset('images/file.png')}}">
<a href="{{ route('note_edit',['id' => $note->id]) }}" class="btn btn-primary">Edit</a> 
{!! Form::open(['method' => 'DELETE','route' => ['note_destroy', $note->id],'onsubmit' => 'return confirm("are you sure ?")','style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
<li>
	Add Tag: <input type="text" name="tag" id="txt-tag"> 
	<a href="#" class="btn btn-info" id="btn-add-tag">Add</a>
</li>
<p class="text-justify">
	{{ $note->note }}
</p>
@endsection