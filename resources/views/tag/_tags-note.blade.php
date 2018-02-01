<b>Tags: </b>
<i>
	@foreach ($note->tags as $tag)
		{{ $tag->name }} 
		@unless ($loop->last) - @endunless
	@endforeach
</i>