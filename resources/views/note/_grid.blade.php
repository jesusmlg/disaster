<div class="row">
	@foreach ($notes as $note)
		<div class="col-md-2 col col-xs-6 grid-notes">
			<a href="{{ route('note_show',['id' => $note->id]) }}">
				<img src="{{ asset($note->icon) }}">
				<div>{{ $note->title }}</div>
			</a>
		</div>
	@endforeach
</div>
