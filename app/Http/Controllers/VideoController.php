<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Utils\PregMatcher;
use Illuminate\Support\Facades\Http;
use App\Models\Video;

class VideoController extends Controller
{
    protected $youtube = "https://www.googleapis.com/youtube/v3/videos";

    public function create()
    {
        $this->authorize('create', Video::class);
        return view('video.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Video::class);
        
        $validated = $request->validate([
            'link'   => 'required',
            'queue'  => 'required|numeric',
            'start'  => 'required',
            'finish' => 'required',
            'sum'    => 'required|numeric',
        ]);
        
       $id = PregMatcher::getYoutubeCode($request->input('link'));

       if($id)
       {
            $response = Http::get($this->youtube, [
                'key'  => 'AIzaSyCSCuLWB2oc-eWKEobaTa_XWBxOCosIl-w',
                'part' => 'snippet',
                'id'   => $id
            ]);
            
            $title   = $response['items'][0]['snippet']['title'];
            $preview = $response['items'][0]['snippet']['thumbnails']['high']['url']; 
       }

       if( !$id ) {
         $title = $request->input('title') 
             ? $request->input('title') : "Не указано";

          $preview = '/storage/images/preview.jpg';
       }

       Video::create([
           'link'     => $request->input('link'),
           'title'    => $title,
           'platform' => $request->input('platform'),
           'preview'  => $preview,
           'queue'    => $request->input('queue'),
           'start'    => $request->input('start'),
           'finish'   => $request->input('finish'),
           'sum'      => $request->input('sum'),
           'comment'  => $request->input('comment')
       ]);

       return redirect('/');

    }
}
