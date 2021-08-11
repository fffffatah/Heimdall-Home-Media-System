<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadAlbumRequest;
use File;
use App\Models\Album;
use App\Models\Song;

class MusicController extends Controller
{
    public function albumIndex(){
        $albums = Album::all();
        return view('albums')->with('albums',$albums);
    }

    public function songIndex($id){
        $songs = Song::where('album_id',$id)->get();
        $album = Album::find($id);
        return view('songs')->with('songs',$songs)->with('album',$album);
    }

    public function uploadAlbumIndex(){
        $files = File::directories(public_path('storage'));
        return view('uploadalbum')->with('storages',$files);
    }

    public function uploadAlbum(UploadAlbumRequest $request){
        $album = new Album;
        $img = $request->file('cover');
        $album->cover = uniqid().".".$img->getClientOriginalExtension();
        $album->title = $request->title;
        $album->artist = $request->artist;
        $album->year = $request->year;
        $album->genre = $request->genre;
        $album->isagerestricted = $request->isagerestricted;
        if($album->save()){
            $img->move('upload/albumarts', $album->cover);
            $songFiles = $request->file('songs');
            foreach($songFiles as $songFile){
                $song = new Song;
                $song->song = $request->storage.'/'.$songFile->getClientOriginalName().'.'.$songFile->getClientOriginalExtension();
                $song->title = $songFile->getClientOriginalName();
                $song->album_id = $album->id;
                if($song->save()){
                    $songFile->move('storage/'.$request->storage, $songFile->getClientOriginalName().'.'.$songFile->getClientOriginalExtension());
                }
            }
            $request->session()->flash('msg', 'Album Uploaded');
        }
        else{
            $request->session()->flash('msg', 'Could Not Upload Album');
        }
        return redirect()->route('uploadalbum.index');
    }

    public function deleteAlbum($id){
        $album = Album::destroy($id);
        return redirect()->route('albums.index');
    }

    public function deleteSong($id){
        $song = Song::destroy($id);
        return redirect()->route('albums.index');
    }
}
