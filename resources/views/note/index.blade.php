@extends('layouts.app')

@section('content')
    <h2>Notes List</h2>

    		@foreach($notes as $note)
    			<div class="col-md-2 text-center">
    				<a href="{{ route('note_show',['id' => $note->id]) }}">
    					<img src="{{ asset('images/file.png') }}" >
    					<p class="">{{ $note->title }}</p>
    				</a>
    				
    			</div>
    		@endforeach

@endsection