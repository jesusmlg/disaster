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

    public function getIconAttribute()
    {
        $path='images/icons/';

        $file = $this->url;
        $ext = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        
        switch ($ext) {
            case 'doc':
            case 'docx':
                $img = 'doc_1.png';
                break;
            case 'xls':
            case 'xlsx':
                $img = 'excel.png';
                break;
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'tiff':
            case 'bmp':
                $img = 'jpg.png';
                break;  
            case 'gif':
                $img = 'gif.png';
                break; 
            case 'pdf':
                $img = 'pdf.png';
                break; 
            case "rar":
            case "zip":
            case "7z":
            case "tar":
            case "bzip":
                $img = 'zip.png';
                break;
            default:
                $img = 'txt_1.png';
                break;
        }

        return $path.$img;
    }


}
