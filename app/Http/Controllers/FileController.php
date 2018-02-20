<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\File;
use \App\Models\Note;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function destroyNoteFile(Request $request,$note_id,$file_id)
    {
        $note = Note::find($note_id);
       	$file = File::find($file_id);

       	if(Storage::delete($file->url))
   		{
       		$note->files()->detach($file_id);	
   		}
    
        if($request->ajax())
        {
            $html = view('file._files-notes',['note' => $note])->render();
            return response()->json(['message' => 'ok', 'html' => $html]);
        }

    }
}
