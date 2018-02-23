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
	<div id="last-tags" class="panel panel-default" style="padding: 4px 5px 4px 5px">
		
		<a href="{{ route('tag_index') }}">Show All Tags </a>
		<p>
			Last tags:&emsp;&emsp;&emsp;&emsp;
			@foreach ($lastTags as $tag)
				<a href="{{ route('note_index',['tag' => $tag->name]) }}" class="btn btn-info btn-xs">{{ $tag->name }}</a>
			@endforeach
		</p>
		<p>
			Most Used tags:&emsp;
			@foreach ($mostUsedTags as $tag)
				<a href="{{ route('note_index',['tag' => $tag->name]) }}" class="btn btn-info btn-xs">{{ $tag->name }}</a>
			@endforeach
		</p>
		 
	</div>

    <h2>Notes List</h2>
    	<p><b>Total Files: </b> {{ $total }}</p>
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
    			<td class="list-note-text">
    				<a href="{{ route('note_show',['id' => $note->id]) }}">
    					{!!$note->note !!}
    				</a>
    			</td>    				
    			<td class="list-note-date">{{ $note->created_at }}</td>
    			<td class="list-note-date">{{ $note->updated_at }}</td>    			
    		</tr>    			
    		@endforeach
		</table>

		<div class="text-center">{{ $notes->links() }}</div>

@endsection