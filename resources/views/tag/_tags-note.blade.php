
<div id="note-tags">
	<b>Tags: </b>
	<i>
		@foreach ($note->tags as $tag)
			<li>
				{{ $tag->name }} 
				@if(Route::current()->getName() == 'note_edit' || Route::current()->getName() == "tag_create")
					<span class="glyphicon glyphicon-remove delete-tag" data-id="{{ $tag->id }}" data-url="{{ route('note_tag_destroy', ['note_id' => $note->id,'tag_id' => $tag->id]) }}"></span>
				@endif
				
			</li>			
		@endforeach
	</i>
	@if(Route::current()->getName() == 'note_edit' || Route::current()->getName() == "tag_create")
		<p>
			Add Tag: <input type="text" name="tag" id="txt-tag"> 
			<input type="hidden" name="note_id" id="note_id" value="{{ $note->id }}">
			<a href="#" class="btn btn-info" id="btn-add-tag">Add</a>
		</p>
	@endif
</div>
