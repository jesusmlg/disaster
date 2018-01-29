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
}
