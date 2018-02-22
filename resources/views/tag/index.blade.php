@extends('layouts.app')

@section('content')
	<h2>Tags List</h2>
	<div class="row">
		
			@foreach ($tags as $tag)
				<div class="col-md-2 col-md-offset-1">
					<a href="{{ route('note_index',['tag' => $tag->name]) }}">{{ $tag->name }}</a>
				</div>				
			@endforeach
		</div>
	</div>
@endsection