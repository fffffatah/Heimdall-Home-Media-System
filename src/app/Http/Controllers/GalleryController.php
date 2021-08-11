<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GalleryUploadRequest;
use App\Models\Gallery;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use File;

class GalleryController extends Controller
{
    public function galleryIndex(){
        $galleries = Gallery::where('user_id',Auth::id())->get();
        return view('galleries')->with('galleries',$galleries);
    }

    public function photoIndex($id){
        $gallery = Gallery::find($id);
        $photos = Photo::where('gallery_id',$id)->get();
        return view('photos')->with('photos',$photos)->with('gallery',$gallery);
    }

    public function uploadGalleryIndex(){
        $files = File::directories(public_path('storage'));
        return view('uploadgallery')->with('storages',$files);
    }

    public function uploadGallery(GalleryUploadRequest $request){
        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->user_id = Auth::id();
        if($gallery->save()){
            $photoFiles = $request->file('photos');
            foreach($photoFiles as $photoFile){
                $photo = new Photo;
                $photo->photo = $request->storage.'/'.$photoFile->getClientOriginalName().'.'.$photoFile->getClientOriginalExtension();
                $photo->gallery_id = $gallery->id;
                if($photo->save()){
                    $photoFile->move('storage/'.$request->storage, $photoFile->getClientOriginalName().'.'.$photoFile->getClientOriginalExtension());
                }
            }
            $request->session()->flash('msg', 'Gallery Uploaded');
        }
        else{
            $request->session()->flash('msg', 'Could Not Upload Gallery');
        }
        return redirect()->route('uploadgallery.index');
    }

    public function deleteGallery($id){
        $gallery = Gallery::destroy($id);
        return redirect()->route('galleries.index');
    }

    public function deletePhoto($id){
        $photo = Photo::destroy($id);
        return redirect()->route('galleries.index');
    }
}
