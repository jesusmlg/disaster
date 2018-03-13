<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Tag;
use \App\Models\Note;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::orderBy('name','asc')->paginate(100);

        return view('tag.index',['tags' => $tags]);
    }

    public function create(Request $request)
    {        
        $note = Note::find($request->note_id);

        $tags = explode(",", $request->tag);

        foreach ($tags as $t)
        {
            $tag = Tag::firstOrNew(['name' => $t]);
            if(!$note->tags()->where('id',$tag->id)->exists())
            {
                if($note->tags()->save($tag))
                    session()->flash('message','Tag saved succesfully');
            }
                
        }
    	

        if($request->ajax())
        {
        	$html = view('tag._tags-note',['note' => $note])->render();        
            return response()->json(['message' => 'ok', 'tag' => $tag->name, 'html' => $html]);
        }
    	
    	//return redirect()->route('note_show',['note' => $note]);

    }

    public function destroyNoteTag(Request $request,$note_id,$tag_id)
    {
        $note = Note::find($note_id);
        $note->tags()->detach($tag_id);
        
        if($request->ajax())
        {
            $html = view('tag._tags-note',['note' => $note])->render();
            return response()->json(['message' => 'ok', 'html' => $html]);
        }

    }

    public function list(Request $request)
    {
        if($request->ajax())
        {
            if($request->txt != "")
            {
                $tags = Tag::where('name','ilike', ''.$request->txt.'%')->get();
                $html='<ul>';
                foreach ($tags as $tag) 
                {
                    $html.='<li>'. $tag->name.'</li>';
                }
                $html.='</ul>';
            }
            else
            {
                $html = "";
            }
            

            return response()->json(['message' => 'ok', 'html' => $html]);
        }
    }
}
