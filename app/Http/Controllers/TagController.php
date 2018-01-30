<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Tag;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $tag = new Tag();

        $tag->fill(
            $request->only('name')
        ); 

    	if($tag->save())
    		session()->flash('message','Tag saved succesfully');

        if($request->ajax())
        {
            return response()->json(['message' => 'ok', 'tag' => $tag->name]);
        }
    	//return redirect()->route('show_baby_path',['baby' => $request->baby_id]);

    }
}
