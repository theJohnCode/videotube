<div>
    {{-- {{ dd($videos) }} --}}
    <div class="center" style="margin: 0 auto; width: 70%">
        <div class="card">
            <div class="card-header">{{ __('Your Videos') }}</div>
            <div class="card-body">
                @if (count($videos) > 0)
                <div class="container">
                    @foreach ($videos as $video)
                        <div class="row my-2">
                            <div class="col-md-2">
                                <a href="{{ route('video.watch',$video) }}">
                                <img src="{{ asset($video->thumbnail) }}" class="img-thumbnail" alt="{{ $video->title }}">
                                </a>
                            </div>
                            <div class="col-md-3 align-self-center">
                                <h5>{{ $video->title }}</h5>
                                <p class="text-truncate">{{ $video->description }}</p>
                            </div>
                            <div class="col-md-2">
                                {{ $video->visibility }}
                            </div>
                            <div class="col-md-2">
                                {{ $video->created_at->format('d/m/y') }}
                            </div>
                            <div class="col-md-2">
                                @if (auth()->user()->owns($video))
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('video.edit',['channel'=>Auth::user()->channel, 'video' => $video->uid]) }}" class="btn btn-light btn-sm">
                                            <span class="material-icons">edit</span>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a wire:click.prevent='delete(`{{ $video->uid }}`)' class="btn btn-danger btn-sm">
                                            <span class="material-icons text-white">delete</span>
                                        </a>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                <h4>No Video is available</h4>
                @endif
            </div>
        </div>
        {{ $videos->links() }}
    </div>
</div>
