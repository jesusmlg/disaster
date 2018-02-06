<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Note;
//use \App\Models\Tag;
use \App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function new()
    {
        $note = new Note();
        //$tag = new Tag();
        return view('note.new',['note' => $note]);
    }

    public function index(Request $request)
    {
        
        if($request->txt)
            $notes = Note::search($request->txt);
        else
            $notes = Note::all();
        return view('note.index',['notes'=> $notes]);
    }

    public function show($id)
    {
        $note = Note::find($id);

        return view('note.show',['note' => $note]);
    }

    public function create(Request $request)
    {
        $note = new Note();

        $note->fill(
            $request->only('title','note')
        );

        $note->user_id = Auth::user()->id;

        if($note->save())
        {
            foreach ($request->attachments as $attachment) 
            {
                //Storage::put('files/'.$file->getClientOriginalName(),$file);
                if($url = $attachment->storeAs('files',$attachment->getClientOriginalName()))
                {
                    $file = \App\Models\File::create(['url' => $url]);
                    $note->files()->save($file);
                }
            }
        }                


        

        return redirect()->route('note_show',['note' => $note]);
    }

    public function destroy($id)
    {
        Note::destroy($id);

        return redirect()->route('note_index');
    }
}
