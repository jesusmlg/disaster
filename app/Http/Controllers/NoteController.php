<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Note;
use \App\Models\Tag;
use \App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \App\Http\Requests\NotesRequest;

class NoteController extends Controller
{    
    public function new()
    {        
        $note = new Note();
        return view('note.new',['note' => $note]);        
    }

    public function edit(Request $request,$id)
    {
        $note = Note::find($id);

        return view('note.edit',['note' => $note]);
    }

    public function index(Request $request)
    {
        $lastTags = Tag::orderBy('created_at','desc')->take(20)->get();   
        $mostUsedTags = Tag::mostUsed()->take(20)->get();

        $total = Note::all()->count();

        if($request->txt)
            $notes = Note::search($request->txt);
        elseif($request->tag)
            $notes = Note::whereHas('tags', function($q) use ($request){
                $q->where('name', $request->tag);
            })->paginate(20);
        else
            $notes = Note::orderBy('created_at', 'desc')->paginate(20);


        return view('note.index',['notes'=> $notes, 'total' => $total, 'lastTags' => $lastTags, 'mostUsedTags' => $mostUsedTags, 'view' => $request->view ]);
    }

    public function show($id)
    {
        $note = Note::find($id);

        return view('note.show',['note' => $note]);
    }

    public function create(NotesRequest $request)
    {
        $note = new Note();

        $note->fill(
            $request->only('title','note')
        );

        $note->user_id = Auth::user()->id;

        if($note->save())
        {
            if($request->hasFile('attachments'))
                $this->saveFiles($request,$note);
            // foreach ($request->attachments as $attachment) 
            // {
            //     //$path = "/public/files/".Auth::user()->id."/".date('Y')."/". date('j');
            //     //Storage::put('files/'.$file->getClientOriginalName(),$file);
            //     if($url = $attachment->storeAs($path,$attachment->getClientOriginalName()))
            //     {
            //         $file = \App\Models\File::create(['url' => $url]);
            //         $note->files()->save($file);
            //     }
            // }
        }                
        return redirect()->route('note_edit',['note' => $note]);
    }

    public function update(Request $request, $id)
    {
        $note = Note::find($id);

        $note->fill(
            $request->only('title','note')
        );

        if($note->save())
        {
            if($request->hasFile('attachments'))
                $this->saveFiles($request,$note);
            // foreach ($request->attachments as $attachment) 
            // {                
            //     if($url = $attachment->storeAs($this->path,$attachment->getClientOriginalName()))
            //     {
            //         $file = \App\Models\File::create(['url' => $url]);
            //         $note->files()->save($file);
            //     }
            // }
        }    

        return redirect()->route('note_edit',['note' => $note]);

    }

    public function destroy($id)
    {
        $note = Note::find($id);

        foreach ($note->files as $f) 
        {
            Storage::delete($f->url);
        }
        Note::destroy($id);


        return redirect()->route('note_index');
    }

    private function saveFiles(Request $request, $note)
    {
        $path = "/public/files/".Auth::user()->id."/".date('Y')."/". date('n');

        foreach ($request->attachments as $attachment) 
            {                
                //Storage::put('files/'.$file->getClientOriginalName(),$file);
                if($url = $attachment->storeAs($path,$attachment->getClientOriginalName()))
                {
                    $file = \App\Models\File::create(['url' => $url]);
                    $note->files()->save($file);
                }
            }
    }
}
