<div class="input-group">
    <span class="input-group-addon">{{ Form::label('Title:')}}</span>
    {{ Form::text('title', null,['class' => 'form-control','aria-describedby' => 'basic-addon3']) }}
</div>

<div class="input-group">
    <span class="input-group-addon">{{ Form::label('File:')}}</span>
     {{ Form::file('attachments[]',['multiple' => 'multiple', 'class' => 'form-control']) }}
</div>  
@unless(Route::current()->getName() == 'note_new' || Route::current()->getName() == 'note_show' )
    <div class="input-group">
        <span class="input-group-addon">{{ Form::label('Tag:')}}</span>
         <input type="text" name="tag" id="txt-tag" class="form-control">      
         <input type="hidden" name="note_id" id="note_id" value="{{ $note->id }}" class="form-control">          
        <a href="#" class="btn btn-info form-control" id="btn-add-tag" style="display:none">Add Tag</a>

    </div>  
    <div id="tag-list"></div>    
                    
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">@include('tag._tags-note')</div>
                <div class="divTableCellSeparator"></div>
                <div class="divTableCell">@include('file._files-notes')</div>
            </div>
        </div>
    </div>
@endunless




<div class="form-group">
    {{ Form::textarea('note',null,['class' => 'summernote']) }}   
</div>
<div class="form-group">
    {{ Form::submit('Save',['class' => 'btn - btn-primary text-center btn-green btn-lg']) }}
</div>