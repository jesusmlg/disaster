@extends('layouts.app')

@section('content')
    <h2>New Note</h2>
    {{ Form::open(['route' => ['note_create'], 'files' => true ]) }}
        {{ Form::token() }}
        <div class="input-group">
            <span class="input-group-addon">{{ Form::label('Title:')}}</span>
            {{ Form::text('title', null,['class' => 'form-control','aria-describedby' => 'basic-addon3']) }}
        </div>
        
        <div class="input-group">
            <span class="input-group-addon">{{ Form::label('File:')}}</span>
             {{ Form::file('attachments[]',['multiple' => 'multiple', 'class' => 'form-control']) }}
            {{-- <input type="file" name="attachments[]" id="attachments" multiple="true"> --}}
        </div>     
        
        {{ Form::textarea('note',null,['class' => 'summernote']) }}   
        <div class="form-group">
            {{ Form::submit('Save',['class' => 'btn - btn-primary text-center']) }}
        </div>


        
    {{ Form::close() }}
@endsection