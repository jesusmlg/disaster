@extends('layouts.app')

@section('content')
    <h2>New Note</h2>
    {{ Form::open(['route' => ['note_create']]) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('Title:')}}
            {{ Form::text('title') }}
        </div>    
        
        <div class="form-group">
            {{ Form::label('Note:')}}
            {{ Form::textarea('note') }}
        </div>    
        <div class="form-group">
            {{ Form::submit('Save') }}
        </div>
        
    {{ Form::close() }}
@endsection