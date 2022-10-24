<div>
    @push('customCSS')
        <link href="//vjs.zencdn.net/7.10.2/video-js.min.css" rel="stylesheet">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @endpush

    <div class="container-fluid">
        {{-- Video Player --}}
        <div class="row">
            <div class="col-md-12">
                <div class="video-container">
                    <video controls preload="auto" autoplay id="videotube" wire:ignore
                        class="video-js vjs-fill vjs-theme-city vjs-big-play-centered" data-setup='{}'>
                        <source src="{{ asset('videos/' . $video->uid . '/' . $video->processed_file) }}"
                            type="application/x-mpegURL" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser <a
                                href="https://videojs.com/html5-video-support" target="_blank">suppot HTML 5 video</a>
                        </p>
                    </video>
                </div>
            </div>
        </div>

        {{-- Video Info --}}
        <div class="row py-4">
            <div class="col-md-12">
                <h6 class="fw-bold">{{ $video->title }}</h6>
            </div>
        </div>
        {{-- Video description --}}
        <div class="row">
            {{-- channel description --}}
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-2">
                        <img class="rounded-circle" src="{{ asset('images/' . $video->channel->image) }}"
                            style="width: 35px" alt="">
                    </div>
                    <div class="col-md-6" style="padding-left: 0px">
                        <p class="fw-bolder" style="margin-bottom: 0px">{{ $video->channel->name }}</p>
                        <p>23 subscribers</p>
                    </div>
                    {{-- <div class="col-md-3"></div> --}}
                </div>
            </div>
            {{-- buttons --}}
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-light btn-sm">SUBSCRIBE</button>
                            </div>
                            <div class="col-md-3">
                                <i class="material-icons">notifications_active</i>
                            </div>
                            <div class="col-md-3">
                                <i class="material-symbols-outlined">thumb_up</i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                                <p>dislikes</p>
                                <i class="material-symbols-outlined">
                                    thumb_down
                                </i>
                            </div>

                            <div class="col-md-3 d-flex">
                                <p>Share</p>
                                <i class="material-icons">
                                    share
                                </i>
                            </div>
                            <div class="col-md-3">
                                <i class="material-icons" data-toggle="tooltip" data-placement="bottom"
                                    title="Download">
                                    download
                                </i>

                            </div>
                            <div class="col-md-3">
                                <i class="material-icons" data-toggle="tooltip" data-placement="bottom" title="Clip">
                                    content_cut
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <i class="material-icons" data-toggle="tooltip" data-placement="bottom" title="More">
                            more_horiz
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <p class="fw-bold">7 views</p>
                    </div>
                    <div class="col-md-3">
                        <p class="fw-bold">Oct 15, 2022</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="height: 55px">
                    <div class="card-body" style="padding: 8px;">
                        <form>
                            <div class="row mb-3">
                                <label for="channel" class="col-md-3 col-form-label text-md-end">Comments  |</label>
                                <div class="col-md-1" style="margin-top: 5px;">
                                    <img src="{{ asset('assets/images/dummy.jpg') }}" style="width: 20px; height: 20px;"
                                        alt="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="add a comment" class="form-control">
                                </div>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
        <section>
            <div>
                <div class="section__comments">
                    <p>6,806 Comments</p>
                </div>
                <div class="section__sort-container">
                    <a href="#">
                        <img src="{{ asset('assets/images/sort.jpg') }}" alt="sort comments">
                        <p>SORT BY</p>
                    </a>
                </div>
                <div class="section__profile">
                    <img src="{{ asset('assets/images/profile_icon.png') }}" alt="profile_icon">
                </div>
                <div class="input__container">
                    <form>
                        <input type="text" name="comment" id="comment" value="Add a public comment...">
                    </form>
                </div>
            </div>
            <div>
                <div class="comments">
                    <img src="{{ asset('assets/images/profile_icon.png') }}" alt="profile icon" width="50">
                    <p class="comments__name">John Snow <a href="#">10 months ago</a> </p>
                    <p class="comments__comment">Stephen A will do anything he possibly can to get KD on the Knicks 😂.
                    </p>
                    <div class="likes">
                        <a href="#">
                            <img src="{{ asset('assets/images/like.jpg') }}" alt="like">
                        </a>
                        <p class="comments__text">1K</p>
                        <a href="#">
                            <img src="{{ asset('assets/images/dislike.jpg') }}" alt="dislike">
                        </a>
                        <a href="#" class="comments__text">REPLY</a>
                    </div>
                    <a href="#" class="comments_replies">View all 7 replies</a>
                </div>
                <div class="comments">
                    <img src="{{ asset('assets/images/profile_icon.png') }}" alt="profile icon" width="50">
                    <p class="comments__name">Arya Stark <a href="#">10 months ago</a> </p>
                    <p class="comments__comment">Stephen A will do anything he possibly can to get KD on the Knicks 😂.
                    </p>
                    <div class="likes">
                        <a href="#">
                            <img src="{{ asset('assets/images/like.jpg') }}" alt="like">
                        </a>
                        <p class="comments__text">1K</p>
                        <a href="#">
                            <img src="{{ asset('assets/images/dislike.jpg') }}" alt="dislike">
                        </a>
                        <a href="#" class="comments__text">REPLY</a>
                    </div>
                    <a href="#" class="comments_replies">View all 7 replies</a>
                </div>

            </div>
        </section>
    </div>

    @push('customJs')
        <script src="//vjs.zencdn.net/7.10.2/video.min.js"></script>

        <script>
            let videotube = videojs('videotube');

            videotube.on('timeupdate', function() {
                if (this.currentTime() > 3) {
                    this.off('timeupdate');
                    Livewire.emit('videoViewed');
                }
            });
        </script>

        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    @endpush
</div>
