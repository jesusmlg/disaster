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
        return $this->belongsToMany('\App\Models\Tag', 'notes_tags','note_id','tag_id');
    }

    public function files()
    {
    	return $this->belongsToMany('\App\Models\File','notes_files','note_id','file_id');
    }

    public static function search($txt)
    {
    	// return DB::table('notes')
     //        ->leftJoin('notes_tags','notes.id','=','notes_tags.note_id')
     //        ->leftJoin('tags','tags.id','=','notes_tags.tag_id')
     //        ->leftJoin('notes_files','notes.id','=','notes_files.note_id')
     //        ->leftJoin('files','files.id','=','notes_files.file_id')
     //        ->where('notes.title','ilike','%'.$txt.'%')
     //        ->orWhere('tags.name','ilike','%'.$txt.'%')
     //        ->orWhere('files.url','ilike','%'.$txt.'%')
     //        ->orderBy('notes.created_at', 'desc')
     //        ->get();
        $tags = explode(" ", $txt);

        $notes = Note::select('notes.*')
                ->leftJoin('notes_tags','notes.id','=','notes_tags.note_id')
                ->leftJoin('tags','tags.id','=','notes_tags.tag_id')
                ->leftJoin('notes_files','notes.id','=','notes_files.note_id')
                ->leftJoin('files','files.id','=','notes_files.file_id')
                ->where('notes.title','ilike','%'.$txt.'%')
                ->orWhere('files.url','ilike','%'.$txt.'%')
                ->orWhere('notes.note','ilike','%'.$txt.'%')
                //->orWhere('tags.name','ilike','%'.$txt.'%')
                ->orWhere(function($query) use ($tags){
                    foreach($tags as $t) {
                        $query->orWhere('tags.name','ilike','%'.$t.'%');
                        }
                    }
                )
                ->orderBy('notes.created_at', 'desc')
                ->paginate(20);
        
        return $notes;
        
    }
    

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
        //return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
        //return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['created_at'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
    public function getDateCarbon()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at']);
    }

    public function  getIconAttribute()
    {
        if ($this->files()->count()>0)
            $img = $this->files()->first()->icon;
        else
            $img = 'images/icons/note.png';

        return $img;

    }

}
