<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function destroyNoteFile(Request $request,$note_id,$file_id)
    {
        $note = Note::find($note_id);
        $note->tags()->detach($tag_id);
        
        if($request->ajax())
        {
            $html = view('tag._tags-note',['note' => $note])->render();
            return response()->json(['message' => 'ok', 'html' => $html]);
        }

    }
}
