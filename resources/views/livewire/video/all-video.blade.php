<div>
    {{-- {{ dd($videos) }} --}}
    <div class="center" style="margin: 0 auto; width: 70%">
        <div class="card">
            <div class="card-header">{{ __('Your Videos') }}</div>
            <div class="card-body">
                <div class="container">
                    @foreach ($videos as $video)
                        <div class="row my-2">
                            <div class="col-md-2">
                                <img src="{{ asset($video->thumbnail) }}" class="img-thumbnail" alt="{{ $video->title }}">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('video.edit',['channel'=>Auth::user()->channel, 'video' => $video->uid]) }}" class="btn btn-light btn-sm">
                                            <span class="material-icons">edit</span>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a wire:click.prevent='delete(`{{ $video->uid }}`)' class="btn btn-danger btn-sm">
                                            <span class="material-icons">delete</span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $videos->links() }}
    </div>
</div>
