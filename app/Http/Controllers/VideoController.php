<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store()
    {
        $this->authorize('create', Video::class);
    }
}
