<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Note;

class NoteController extends Controller
{
    public function new()
    {
        $note = new Note();
        return view('note.new',['note' => $note]);
    }
}
