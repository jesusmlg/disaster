
	<b>Files: </b>
	<i>
		@foreach ($note->files as $file)
			<li>
				<a href="{{ $file->url }} "> 
					<img src="asset('img/file.png')" class="img-thumbnail">{{ $file->filename }} 
				</a> 
				@if(Route::current()->getName() == 'note_edit')
					<span class="glyphicon glyphicon-remove delete-file"></span>
				@endif
			</li>			
		@endforeach
	</i>

