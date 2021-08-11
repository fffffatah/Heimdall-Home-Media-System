<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use File;

class MovieController extends Controller
{
    public function movieIndex(){
        $movies = Movie::all();
        return view('movies')->with('movies',$movies);
    }

    public function uploadMovieIndex(){
        $files = File::directories(public_path('storage'));
        return view('uploadmovie')->with('storages',$files);
    }

    public function uploadMovie(UploadMovieRequest $request){
        $movie = new Movie;
        $img = $request->file('cover');
        $movieFile = $request->file('movie');
        $movie->cover = uniqid().".".$img->getClientOriginalExtension();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->year = $request->year;
        $movie->genre = $request->genre;
        $movie->isagerestricted = $request->isagerestricted;
        $movieName = uniqid().".".$movieFile->getClientOriginalExtension();
        $movie->movie = $request->storage."/".$movieName;
        if($movie->save()){
            $img->move('upload/moviecovers', $movie->cover);
            $movieFile->move('storage/'.$request->storage, $movieName);
            $request->session()->flash('msg', 'Movie Uploaded');
        }
        else{
            $request->session()->flash('msg', 'Could Not Upload Movie');
        }
        return redirect()->route('movie.index');
    }

    public function deleteMovie($id){
        $movie = Movie::destroy($id);
        return redirect()->route('movie.index');
    }

    public function playMovie($id){
        $movie = Movie::find($id);
        return view('movieplayer')->with('movie',$movie);
    }

    public function playTv($id){
        
    }
}
