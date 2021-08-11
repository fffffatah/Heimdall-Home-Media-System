<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VideoUploadRequest;
use File;

class VideoController extends Controller
{
    public function videoIndex(){
        $videos = Video::where('user_id',Auth::id())->get();
        return view('videos')->with('videos',$videos);
    }

    public function videoUploadIndex(){
        $files = File::directories(public_path('storage'));
        return view('uploadvideo')->with('storages',$files);
    }

    public function videoUpload(VideoUploadRequest $request){
        $video = new Video;
        $videoFile = $request->file('file');
        $video->name = $request->name;
        $video->file = $request->storage.'/'.$request->name.'.'.$videoFile->getClientOriginalExtension();
        $video->user_id = Auth::id();
        if($video->save()){
            $videoFile->move('storage/'.$request->storage, $request->name.'.'.$videoFile->getClientOriginalExtension());
            $request->session()->flash('msg', 'Video Uploaded');
        }
        else{
            $request->session()->flash('msg', 'Video Upload Failed');
        }
        return redirect()->route('uploadvideo.index');
    }

    public function playVideo($id){
        $video = Video::find($id);
        return view('videoplayer')->with('video',$video);
    }

    public function deleteVideo($id){
        $video = Video::destroy($id);
        return redirect()->route('videos.index');
    }
}
