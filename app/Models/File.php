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

    public function publicPath()
    {
    	return preg_replace('/public/', 'storage', $this->url, 1);
    }

    public function getPublicPath($value)
    {
    	return preg_replace('/public/', 'storage', $this->url, 1);
    }


}
