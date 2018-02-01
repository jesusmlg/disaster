<b>Files: </b>
<i>
	@foreach ($note->files as $file)
		<a href="{{ $file->url }} "> <img src="asset('img/file.png')" class="img-thumbnail">{{ $file->filename }} </a>
		@unless ($loop->last) - @endunless
	@endforeach
</i>