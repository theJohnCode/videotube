<div>
    @push('customCSS')
        <link href="//vjs.zencdn.net/7.10.2/video-js.min.css" rel="stylesheet">
    @endpush

    <div class="container-fluid">
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
            })
        </script>
    @endpush
</div>
