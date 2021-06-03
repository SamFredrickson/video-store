<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function create()
    {
        $this->authorize('create', Video::class);
        return view('video.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Video::class);
        
    }
}
