<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login.index');
});
//LOGIN AND REGISTRATION
Route::group(['middleware' => ['rememberme']], function () {
    Route::get('login', ['as'=>'login.index', 'uses'=>'LoginController@index']);
    Route::get('registration', ['as'=>'registration.index', 'uses'=>'RegistrationController@index']);
    Route::get('setpass', ['as'=>'setpass.index', 'uses'=>'RegistrationController@setPassIndex']);
});
Route::post('login', ['as'=>'login.authenticate', 'uses'=>'LoginController@authenticate']);
Route::post('registration', ['as'=>'registration.registration', 'uses'=>'RegistrationController@registration']);
Route::get('logout', ['as'=>'logout.index', 'uses'=>'LogoutController@index']);
Route::post('setpass', ['as'=>'setpass.set', 'uses'=>'RegistrationController@setNewPass']);


Route::group(['middleware' => ['authuser']], function () {
    Route::group(['middleware' => ['iskid']], function () {
        Route::get('dashboard', ['as'=>'dashboard.index', 'uses'=>'DashboardController@index']);
        //ACCOUNT UPDATE
        Route::get('myaccount', ['as'=>'myaccount.index', 'uses'=>'AccountController@index']);
        Route::post('myaccount', ['as'=>'myaccount.update', 'uses'=>'AccountController@updateUser']);
        Route::get('changepass', ['as'=>'changepass.index', 'uses'=>'AccountController@changePassIndex']);
        Route::post('changepass', ['as'=>'changepass.change', 'uses'=>'AccountController@changePass']);
        //MOVIES
        Route::get('movies', ['as'=>'movie.index', 'uses'=>'MovieController@movieIndex']);
        Route::get('movieplayer/{id}', ['as'=>'movieplayer.index', 'uses'=>'MovieController@playMovie']);
        Route::get('tvplayer/{id}', ['as'=>'tvplayer.index', 'uses'=>'MovieController@playTv']);
        Route::get('shows', ['as'=>'shows.index', 'uses'=>'MovieController@showIndex']);
        Route::get('episodes/{id}', ['as'=>'episodes.index', 'uses'=>'MovieController@episodeIndex']);
        //ALBUM AND SONGS
        Route::get('albums', ['as'=>'albums.index', 'uses'=>'MusicController@albumIndex']);
        Route::get('songs/{id}', ['as'=>'songs.index', 'uses'=>'MusicController@songIndex']);

        Route::group(['middleware' => ['isadmin']], function () {
            Route::get('users', ['as'=>'users.index', 'uses'=>'UserController@index']);
            Route::get('users/{id}', ['as'=>'users.delete', 'uses'=>'UserController@deleteUser']);
            Route::get('adduser', ['as'=>'adduser.index', 'uses'=>'UserController@addUserIndex']);
            Route::post('adduser', ['as'=>'adduser.addUser', 'uses'=>'UserController@addUser']);
            //MOVIE
            Route::get('movies/{id}', ['as'=>'movie.delete', 'uses'=>'MovieController@deleteMovie']);
            Route::get('uploadmovie', ['as'=>'uploadmovie.index', 'uses'=>'MovieController@uploadMovieIndex']);
            Route::post('uploadmovie', ['as'=>'uploadmovie.index', 'uses'=>'MovieController@uploadMovie']);
            Route::get('uploadshow', ['as'=>'uploadshow.index', 'uses'=>'MovieController@uploadShowIndex']);
            Route::post('uploadshow', ['as'=>'uploadshow.index', 'uses'=>'MovieController@uploadShow']);
            Route::get('uploadepisode', ['as'=>'uploadepisode.index', 'uses'=>'MovieController@uploadEpisodeIndex']);
            Route::post('uploadepisode', ['as'=>'uploadepisode.index', 'uses'=>'MovieController@uploadEpisode']);

            Route::get('shows/{id}', ['as'=>'shows.delete', 'uses'=>'MovieController@deleteShow']);
            Route::get('episode/{id}', ['as'=>'episodes.delete', 'uses'=>'MovieController@deleteEpisode']);

            Route::get('uploadalbum', ['as'=>'uploadalbum.index', 'uses'=>'MusicController@uploadAlbumIndex']);
            Route::post('uploadalbum', ['as'=>'uploadalbum.index', 'uses'=>'MusicController@uploadAlbum']);

            Route::get('album/{id}', ['as'=>'albums.delete', 'uses'=>'MusicController@deleteAlbum']);
            Route::get('song/{id}', ['as'=>'songs.delete', 'uses'=>'MusicController@deleteSong']);

            Route::get('uploadgallery', ['as'=>'uploadgallery.index', 'uses'=>'GalleryController@uploadGalleryIndex']);
            Route::post('uploadgallery', ['as'=>'uploadgallery.index', 'uses'=>'GalleryController@uploadGallery']);
            Route::get('galleries', ['as'=>'galleries.index', 'uses'=>'GalleryController@galleryIndex']);

            Route::get('photos/{id}', ['as'=>'photos.index', 'uses'=>'GalleryController@photoIndex']);

            Route::get('gallery/{id}', ['as'=>'galleries.delete', 'uses'=>'GalleryController@deleteGallery']);
            Route::get('photo/{id}', ['as'=>'photos.delete', 'uses'=>'GalleryController@deletePhoto']);

            Route::get('videos', ['as'=>'videos.index', 'uses'=>'VideoController@videoIndex']);
            Route::get('uploadvideo', ['as'=>'uploadvideo.index', 'uses'=>'VideoController@videoUploadIndex']);
            Route::post('uploadvideo', ['as'=>'uploadvideo.index', 'uses'=>'VideoController@videoUpload']);

            Route::get('video/{id}', ['as'=>'videos.delete', 'uses'=>'VideoController@deleteVideo']);
            Route::get('myfile/{id}', ['as'=>'myfiles.delete', 'uses'=>'MyfileController@deleteMyfile']);
            Route::get('videoplayer/{id}', ['as'=>'videoplayer.index', 'uses'=>'VideoController@playVideo']);

            Route::get('myfiles', ['as'=>'myfiles.index', 'uses'=>'MyfileController@myfileIndex']);
            Route::get('uploadfile', ['as'=>'uploadfile.index', 'uses'=>'MyfileController@myfileUploadIndex']);
            Route::post('uploadfile', ['as'=>'uploadfile.index', 'uses'=>'MyfileController@myfileUpload']);

            Route::get('settings', ['as'=>'settings.index', 'uses'=>'AccountController@settingIndex']);
        });
    });
});