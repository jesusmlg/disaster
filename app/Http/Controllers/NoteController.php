<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Note;
use \App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function new()
    {
        $note = new Note();
        $tag = new Tag();
        return view('note.new',['note' => $note, 'tag' => $tag]);
    }

    public function index()
    {
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

        $note->save();

        return redirect()->route('note_index');
    }

    public function destroy($id)
    {
        Note::destroy($id);

        return redirect()->route('note_index');
    }
}
