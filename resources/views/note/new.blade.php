@extends('layouts.app')

@section('content')
    <h2>New Note</h2>
    {!! Form::open(['route' => ['note_create'], 'files' => true ]) !!}
        {{ Form::token() }} 
        @include('note._form')            
    {!! Form::close() !!}
@endsection