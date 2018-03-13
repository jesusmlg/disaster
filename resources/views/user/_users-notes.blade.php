<div id="note-users">
	<b>Users: </b>
	<i>
		@foreach ($note->users as $user)
			<li>
				{{ $user->name }} 
				@unless(Route::current()->getName() == 'note_new' || Route::current()->getName() == 'note_show' )
					<span class="glyphicon glyphicon-remove delete-user" data-id="{{ $user->id }}" data-url="{{ route('note_user_destroy', ['note_id' => $note->id,'user_id' => $user->id]) }}"></span>
				@endif
				
			</li>			
		@endforeach
	</i>
</div>