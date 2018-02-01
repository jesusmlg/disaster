<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Tag;
use \App\Models\Note;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $tag = new Tag();
        
        $note = Note::find($request->note_id);

        $tag->fill([
            'name' => $request->tag
        ]); 

    	if($note->tags()->save($tag))
    		session()->flash('message','Tag saved succesfully');

        if($request->ajax())
        {
        	$html = view('tag._tags-note',['note' => $note])->render();        
            return response()->json(['message' => 'ok', 'tag' => $tag->name, 'html' => $html]);
        }
    	
    	//return redirect()->route('note_show',['note' => $note]);

    }
}
