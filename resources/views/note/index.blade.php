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
    	<p><b>Total Files: </b> {{ $notes->count() }}</p>
    	<div class="text-center">{{ $notes->links() }}</div>
		<table class="table table-notes">
			<tr>
				<th>Adj</th>
				<th>Title</th>
				<th>Text</th>			
				<th>Created</th>
				<th>Modified</th>			
			</tr>
		
    		@foreach($notes as $note)
    		<tr>
    			<td class="list-note-adj">@if(count($note->files)) <img src="{{ asset('images/file.png')}}" class="img-32 img-responsive"> @endif</td>
    			<td class="list-note-title">
    				<a href="{{ route('note_show',['id' => $note->id]) }}">
    					{{ $note->title }}
    				</a>
    			</td>
    			<td class="list-note-text">{{ $note->note }}</td>
    			<td class="list-note-date">{{ $note->created_at }}</td>
    			<td class="list-note-date">{{ $note->updated_at }}</td>    			
    		</tr>    			
    		@endforeach
		</table>

		<div class="text-center">{{ $notes->links() }}</div>

@endsection