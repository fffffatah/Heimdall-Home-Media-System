<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heimdall - Home Media</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('dashboard.index')}}"><h1 class="text-white"><i>Heimdall</i></h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-film"></i> Movies & TV
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('movie.index')}}">My Movies</a></li>
            <li><a class="dropdown-item" href="{{route('shows.index')}}">My TV Shows</a></li>
            @if(Auth::user()->type != 'kid')
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('uploadmovie.index')}}"><i class="fas fa-file-upload"></i> Upload Movie</a></li>
            <li><a class="dropdown-item" href="{{route('uploadshow.index')}}"><i class="fas fa-file-upload"></i> Create Show</a></li>
            <li><a class="dropdown-item" href="{{route('uploadepisode.index')}}"><i class="fas fa-file-upload"></i> Upload Episode</a></li>
            @endif
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-music"></i> Music
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('albums.index')}}">My Music</a></li>
            @if(Auth::user()->type != 'kid')
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('uploadalbum.index')}}"><i class="fas fa-file-upload"></i> Upload</a></li>
            @endif
          </ul>
        </li>
        @if(Auth::user()->type != 'kid')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-images"></i> Pictures
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('galleries.index')}}">My Pictures</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('uploadgallery.index')}}"><i class="fas fa-file-upload"></i> Upload</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-video"></i> Videos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('videos.index')}}">My Videos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('uploadvideo.index')}}"><i class="fas fa-file-upload"></i> Upload</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-file"></i> Files
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('myfiles.index')}}">My Files</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('uploadfile.index')}}"><i class="fas fa-file-upload"></i> Upload</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
    <div class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link active btn btn-danger dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-address-card"></i> Profile
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('myaccount.index')}}"><i class="fas fa-id-card"></i> Account Settings</a></li>
            <li><a class="dropdown-item" href="{{route('changepass.index')}}"><i class="fas fa-user-edit"></i> Change Password</a></li>
            @if(Auth::user()->type != 'kid')
            <li><a class="dropdown-item" href="{{route('users.index')}}"><i class="fas fa-users"></i> Users</a></li>
            <li><a class="dropdown-item" href="{{route('adduser.index')}}"><i class="fas fa-user-plus"></i> Add User</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> System Settings</a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('logout.index')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
        </li>
    </div>
        <span style="padding-right:7px;"></span>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> Search</button>
        </form>
  </div>
</nav>