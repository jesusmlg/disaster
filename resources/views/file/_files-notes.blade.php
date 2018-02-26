<div id="note-files">
	<b>Files: </b>
	<i>
		@foreach ($note->files as $file)
			<li>
				<a href="{{ asset($file->publicPath()) }}"> 
					<img src="{{ asset( $file->icon )}}" class="img-thumbnail img-small">{{ $file->filename }}
				</a> 
				@if(Route::current()->getName() == 'note_edit')
				<span class="glyphicon glyphicon-remove delete-file" data-id="{{ $file->id }}" data-url="{{ route('note_file_destroy', ['note_id' => $note->id,'file_id' => $file->id]) }}"></span>					
				@endif
			</li>			
		@endforeach
	</i>
</div>
