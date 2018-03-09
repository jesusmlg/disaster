@extends('layouts.app')

@section('content')
	<h2>
		Edit Note (#{{ $note->id }}) {!! Form::open(['method' => 'DELETE','route' => ['note_destroy', $note->id],'onsubmit' => 'return confirm("are you sure ?")','style'=>'display:inline; float:right;']) !!}
		{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-lg']) !!}
	{!! Form::close() !!}
	</h2>
	
	<div style="margin-top:40px">
		{!! Form::model($note,['route' => ['note_update',$note->id], 'files' => true]) !!}
			@include('note._form') 
		{!! Form::close() !!}
	</div>
	
@endsection