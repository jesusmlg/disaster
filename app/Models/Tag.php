<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function notes()
    {
        return $this->belongsToMany('Note', 'notes_tags');
    }

    public static function mostUsed()
    {

    	return Tag::whereIn('id', function($q){
    		$q->select(\DB::raw('nt.tag_id from notes_tags nt group by nt.tag_id order by count(nt.note_id) desc'));
    	});
    }

    public function setAttributeName($value)
    {
    	$this->attributes['name'] = strtolower($value);
    }
}
