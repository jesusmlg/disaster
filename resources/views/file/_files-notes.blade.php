
	<b>Files: </b>
	<i>
		@foreach ($note->files as $file)
			<li>
				<a href="{{ $file->url }} "> 
					<img src="asset('img/file.png')" class="img-thumbnail">{{ $file->filename }} 
				</a> 
				@if(Route::current()->getName() == 'note_edit')
				<span class="glyphicon glyphicon-remove delete-file" data-id="{{ $file->id }}" data-url="{{ route('note_tag_destroy', ['note_id' => $note->id,'file_id' => $file->id]) }}"></span>					
				@endif
			</li>			
		@endforeach
	</i>

