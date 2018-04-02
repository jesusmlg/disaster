<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Models\Note;

class UserController extends Controller
{
    public function index(Request $request)
    {
       
    }

    public function create(Request $request)
    {        
        $note = Note::find($request->note_id);
            
        if(!$note->users()->where('id',$request->user_id)->exists())
        {
            $user = User::find($request->user_id);

            if($note->users()->save($user))
                session()->flash('message','User added succesfully');
        }

        if($request->ajax())
        {
        	$html = view('user._users-notes',['note' => $note])->render();        
            return response()->json(['message' => 'ok','email' => $user->email, 'html' => $html]);
        }
    	
    }

    public function destroyNoteUser(Request $request,$note_id,$user_id)
    {
        $note = Note::find($note_id);
        $note->users()->detach($user_id);
        
        if($request->ajax())
        {
            $html = view('user._users-notes',['note' => $note])->render();
            return response()->json(['message' => 'ok', 'html' => $html]);
        }

    }

    public function list(Request $request)
    {
        if($request->ajax())
        {
            if($request->txt != "")
            {

                $users = User::whereNotIn('id',function($q) use ($request){
                                $q->select('user_id')->from('notes_users')->where('note_id',$request->note_id);
                            })             
                            ->where(function($q) use ($request){
                                $q->where('name','like', '%'.$request->txt.'%');
                                $q->orWhere('email', 'like', '%'.$request->txt.'%');
                            })
                            ->get();

                $html='<ul>';
                foreach ($users as $user) 
                {
                    $html.='<li id="'.$user->id.'">'. $user->name.'</li>';
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
