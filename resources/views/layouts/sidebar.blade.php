<div class="side-bar">
    <div class="nav">
      <a href="{{ route('home') }}" class="nav-link active">
        <i class="material-icons">home</i>
        <span>Home</span>
      </a>
      <a class="nav-link">
        <i class="material-icons">local_fire_department</i>
        <span>Trending</span>
      </a>
      <a class="nav-link">
        <i class="material-icons">subscriptions</i>
        <span>Subscriptions</span>
      </a>
    </div>
    <hr />
    <a class="nav-link">
      <i class="material-icons">library_add_check</i>
      <span>Library</span>
    </a>
    <a class="nav-link">
      <i class="material-icons">history</i>
      <span>History</span>
    </a>
    <a href="{{ route('video.all',['channel' => Auth::user()->channel]) }}" class="nav-link">
      <i class="material-icons">play_arrow</i>
      <span>Your Videos</span>
    </a>
    <a class="nav-link">
      <i class="material-icons">watch_later</i>
      <span>Watch Later</span>
    </a>
    <a class="nav-link">
      <i class="material-icons">thumb_up</i>
      <span>Liked Videos</span>
    </a>
  </div>