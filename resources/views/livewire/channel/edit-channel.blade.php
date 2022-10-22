<div>
    @if ($channel->image)
        <img src="{{ asset('images/'.$channel->image) }}"class="img-thumbnail"/>
    @endif
    <form wire:submit.prevent='update'>

        <div class="row mb-3">
            <label for="channel" class="col-md-4 col-form-label text-md-end">{{ __('Channel Name') }}</label>
            <div class="col-md-6">
                <input type="text" class="form-control" wire:model='channel.name'>
            </div>
            @error('channel.name')
                <span style="display:block; width: 70%; margin:auto; background:none; border:none"
                    class="alert alert-danger text-center">
                    <strong>{{ $message }}</strong>
                </span pan>
            @enderror
        </div>



        <div class="row mb-3">
            <label for="channel" class="col-md-4 col-form-label text-md-end">{{ __('Channel Description') }}</label>

            <div class="col-md-6">
                <textarea style="resize: none" cols="30" rows="4" class="form-control" wire:model='channel.description'></textarea>
            </div>
        </div>
        @error('description')
            <span style="display:block; width: 70%; margin:auto; background:none; border:none"
                class="alert alert-danger text-center">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Channel Image') }}</label>

            <div class="col-md-6">
                <input type="file" class="form-control" wire:model='image'>
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="" class="col-md-4"></label>
            <div class="col-md-6">
            @if ($image)
                <img class="img-thumbnail" src="{{ $image->temporaryUrl() }}">
            @endif
            </div>
            
        </div>
        @error('image')
            <span style="display:block; width: 70%; margin:auto; background:none; border:none"
                class="alert alert-danger text-center">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>
