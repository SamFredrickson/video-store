<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class WatchedController extends Controller
{
    public function index(Request $request)
    {
        $videos = Video::where('watched', 1)
                  ->orderByDesc('queue');

        if($request->input('title')) 
            $videos->where('title', 'like', '%' . $request->input('title') . '%');

        if($request->input('queue')) 
            $videos->where('queue', $request->input('queue'));
        
        if($request->input('platform'))
            $videos->where('platform', $request->input('platform'));

        $videos = $videos->get();

        session()->flashInput($request->all());
        return view('watched.index', compact('videos'));
    }

    public function update(Video $video)
    {
        $this->authorize('update', $video);
        
        if( $video->watched ) $video->watched = 0;
        else $video->watched = 1;

        $video->save();
    }
}
