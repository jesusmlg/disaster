@extends('layouts.app')

@section('content')
<p>
	<a href="{{ route('note_new') }}" class="btn btn-primary btn-green btn-lg">New Note</a>
</p>
{{ Form::open(['route' => ['note_index'], 'method' => 'get', 'id' => 'search-form']) }}
	<div class="form-group has-feedback">
	    <input type="text" class="form-control" placeholder="Search..." name="txt" id="txt"/>
	    <span class="glyphicon glyphicon-search form-control-feedback" id="search"></span>
	</div>
	
{{ Form::Close() }}

    <h2>Notes List</h2>

    		@foreach($notes as $note)
    			<div class="col-md-2 text-center mythumb">
    				<div class="thumbnail">

    					<a href="{{ route('note_show',['id' => $note->id]) }}">
    					
    					<img src="{{ asset('images/file.png') }}" class="img-responsive" >
    					{{ $note->title }}
    				</a>
    				</div>
    				
    				
    			</div>
    		@endforeach


@endsection