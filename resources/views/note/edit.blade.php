@extends('layouts.app')

@section('content')
	<h2>Edit Note</h2>

	{!! Form::model($note,['route' => ['note_edit',$note->id], 'files' => true]) !!}
		@include('note._form') 
	{!! Form::close() !!}
@endsection