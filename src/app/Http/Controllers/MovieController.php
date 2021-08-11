<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadMovieRequest;
use App\Http\Requests\UploadShowRequest;
use App\Models\Movie;
use App\Models\Show;
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

    public function uploadShowIndex(){
        return view('uploadshow');
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

    public function uploadShow(UploadShowRequest $request){
        $show = new Show;
        $img = $request->file('cover');
        $show->cover = uniqid().".".$img->getClientOriginalExtension();
        $show->title = $request->title;
        $show->description = $request->description;
        $show->year = $request->year;
        $show->genre = $request->genre;
        $show->isagerestricted = $request->isagerestricted;
        if($show->save()){
            $img->move('upload/showcovers', $show->cover);
            $request->session()->flash('msg', 'Show Uploaded');
        }
        else{
            $request->session()->flash('msg', 'Could Not Upload Show');
        }
        return redirect()->route('uploadshow.index');
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
