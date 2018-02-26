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