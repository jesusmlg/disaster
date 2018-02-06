<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Note extends Model
{
    protected $fillable = ['title','note'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Models\Tag', 'notes_tags');
    }

    public function files()
    {
    	return $this->belongsToMany('\App\Models\File','notes_files');
    }

    public static function search($txt)
    {
    	return DB::table('notes')
            ->leftJoin('notes_tags','notes.id','=','notes_tags.note_id')
            ->leftJoin('tags','tags.id','=','notes_tags.tag_id')
            ->leftJoin('notes_files','notes.id','=','notes_files.note_id')
            ->leftJoin('files','files.id','=','notes_files.file_id')
            ->where('notes.title','ilike','%'.$txt.'%')
            ->orWhere('tags.name','ilike','%'.$txt.'%')
            ->orWhere('files.url','ilike','%'.$txt.'%')
            ->get();
    
    }
}
