<div class="row">
	@foreach ($notes as $note)
		<div class="col-md-2 col col-xs-6 grid-notes">
			<a href="{{ route('note_show',['id' => $note->id]) }}" title="{{ $note->title }}">
				<div><img src="{{ asset($note->icon) }}"></div>
				<p>{{ $note->title }}</p>
			</a>
		</div>
	@endforeach
</div>
