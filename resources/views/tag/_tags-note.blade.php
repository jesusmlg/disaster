
<div id="note-tags">
	<b>Tags: </b>
	<i>
		@foreach ($note->tags as $tag)
			<li>
				{{ $tag->name }} 
				@unless(Route::current()->getName() == 'note_new' || Route::current()->getName() == 'note_show' )
					<span class="glyphicon glyphicon-remove delete-tag" data-id="{{ $tag->id }}" data-url="{{ route('note_tag_destroy', ['note_id' => $note->id,'tag_id' => $tag->id]) }}"></span>
				@endif
				
			</li>			
		@endforeach
	</i>
	@unless(Route::current()->getName() == 'note_new' || Route::current()->getName() == 'note_show' )
		
	@endif
</div>
