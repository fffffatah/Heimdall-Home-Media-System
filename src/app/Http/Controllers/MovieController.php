<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadMovieRequest;
use App\Http\Requests\UploadShowRequest;
use App\Http\Requests\UploadEpisodeRequest;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Show;
use Illuminate\Http\Request;
use File;

class MovieController extends Controller
{
    public function movieIndex(){
        $movies = Movie::all();
        return view('movies')->with('movies',$movies);
    }

    public function showIndex(){
        $shows = Show::all();
        return view('shows')->with('shows',$shows);
    }

    public function episodeIndex($id){
        $show = Show::find($id);
        $episodes = Episode::where('show_id',$id)->get();
        return view('episodes')->with('episodes',$episodes)->with('show',$show);
    }

    public function uploadMovieIndex(){
        $files = File::directories(public_path('storage'));
        return view('uploadmovie')->with('storages',$files);
    }

    public function uploadShowIndex(){
        return view('uploadshow');
    }

    public function uploadEpisodeIndex(){
        $shows = Show::all();
        $files = File::directories(public_path('storage'));
        return view('uploadepisode')->with('shows',$shows)->with('storages',$files);
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

    public function uploadEpisode(UploadEpisodeRequest $request){
        $episode = new Episode;
        $epFile = $request->file('episode');
        $episode->title = $request->title;
        $episode->description = $request->description;
        $episode->season = $request->season;
        $episode->show_id = $request->show;
        $episodeName = uniqid().".".$epFile->getClientOriginalExtension();
        $episode->episode = $request->storage."/".$episodeName;
        if($episode->save()){
            $epFile->move('storage/'.$request->storage, $episodeName);
            $request->session()->flash('msg', 'Episode Uploaded');
        }
        else{
            $request->session()->flash('msg', 'Could Not Upload Episode');
        }
        return redirect()->route('uploadepisode.index');
    }

    public function deleteMovie($id){
        $movie = Movie::destroy($id);
        return redirect()->route('movie.index');
    }

    public function deleteShow($id){
        $show = Show::destroy($id);
        return redirect()->route('shows.index');
    }

    public function deleteEpisode($id){
        $episode = Episode::destroy($id);
        return redirect()->route('shows.index');
    }

    public function playMovie($id){
        $movie = Movie::find($id);
        return view('movieplayer')->with('movie',$movie);
    }

    public function playTv($id){
        $episode = Episode::find($id);
        $show = Show::find($episode->show_id);
        return view('tvplayer')->with('episode',$episode)->with('show',$show);
    }
}
