@extends('layouts.app')

@section('content')
	<h2>Edit Note {!! Form::open(['method' => 'DELETE','route' => ['note_destroy', $note->id],'onsubmit' => 'return confirm("are you sure ?")','style'=>'display:inline; float:right;']) !!}
		{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
	{!! Form::close() !!}</h2>
	
	{!! Form::model($note,['route' => ['note_update',$note->id], 'files' => true]) !!}
		@include('note._form') 
	{!! Form::close() !!}
@endsection