<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['url'];


    public function notes()
    {
    	return $this->belongsToMany('\App\Models\Note','notes_files');
    }

    public function getFilenameAttribute()
    {
    	return basename($this->url);
    }


}
