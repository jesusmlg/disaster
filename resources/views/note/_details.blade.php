<table class="table table-notes">
	<tr>
		<th>Adj</th>
		<th>Title</th>
		{{-- <th>Text</th>	 --}}
        <th>Tags</th>   		
		<th>Created</th>
		<th>Modified</th>			
	</tr>

	@foreach($notes as $note)
	<tr>
		<td class="list-note-adj">@if(count($note->files)) <img src="{{ asset('images/icons/clip.png')}}" class="img-32 img-responsive"> @endif</td>
		<td class="list-note-title">
			<a href="{{ route('note_show',['id' => $note->id]) }}">
				{{ $note->title }}
			</a>
		</td>
		<td class="list-note-text">
			<a href="{{ route('note_show',['id' => $note->id]) }}">
				{{-- {!!$note->note !!} --}}
                @foreach ($note->tags as $tag)
                    <a href="{{ route('note_index',['tag' => $tag->name]) }}" class="btn btn-info btn-xs">{{ $tag->name }}</a>
                @endforeach
			</a>
		</td>    				
		<td class="list-note-date">{{ $note->created_at }}</td>
		<td class="list-note-date">{{ $note->updated_at }}</td>    			
	</tr>    			
	@endforeach
</table>