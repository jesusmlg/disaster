<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
