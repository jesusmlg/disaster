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
            $request->only('tag')
        );
    }
}
