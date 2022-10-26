<div>
    <div class="videos">
        {{-- starts --}}
        @foreach ($videos as $video)
            <div class="video">
                <div class="thumbnail">
                    <a href="{{ route('video.watch',$video) }}">
                        <img src="{{ asset($video->thumbnail) }}" alt="{{ $video->title }}" />
                    </a>
                </div>

                <div class="details">
                    <div class="author">
                        <img src="{{ asset('images/' . $video->channel->image) }}" alt="" />
                    </div>
                    <div class="title">
                        <h3>{{ ucwords($video->title) }}</h3>
                        <a href=""> {{ ucwords($video->channel->name) }} </a>
                        <span> {{ $video->views }} Views • {{ $video->created_at->diffForHumans() }} </span>
                    </div>
                </div>
            </div>
            {{-- ends --}}
        @endforeach


    </div>

</div>
