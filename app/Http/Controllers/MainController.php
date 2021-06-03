<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $videos = Video::where('watched', 0)
                  ->orderByDesc('queue');

        if($request->input('title')) 
            $videos->where('title', 'like', '%' . $request->input('title') . '%');

        if($request->input('queue')) 
            $videos->where('queue', $request->input('queue'));
        
        if($request->input('platform'))
            $videos->where('platform', $request->input('platform'));

        $videos = $videos->get();

        session()->flashInput($request->all());
        return view('main.index', compact('videos'));
    }
}
