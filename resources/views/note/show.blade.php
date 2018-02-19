@extends('layouts.app')
@section('content')
<h2>{{ $note->title  }}</h2>

<img src="{{ asset('images/file.png')}}">
<a href="{{ route('note_edit',['id' => $note->id]) }}" class="btn btn-primary">Edit</a> 
<p>&nbsp;</p>

<div class="divTable">
    <div class="divTableBody">
        <div class="divTableRow">
            <div class="divTableCell">@include('tag._tags-note')</div>
            <div class="divTableCellSeparator"></div>
            <div class="divTableCell">@include('file._files-notes')</div>
        </div>
    </div>
</div>

<p class="text-justify">
	{!! $note->note !!}
</p>



@endsection