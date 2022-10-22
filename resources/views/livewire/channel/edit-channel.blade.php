<div>
    <form wire:submit.prevent='update'>

        <div class="row mb-3">
            <label for="channel" class="col-md-4 col-form-label text-md-end">{{ __('Channel Name') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control" wire:model='channel.name'>
            </div>
        </div>

        <div class="row mb-3">
            <label for="channel" class="col-md-4 col-form-label text-md-end">{{ __('Channel Name') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control" wire:model='name'>
            </div>
        </div>
        <div class="row mb-3">
            <label for="channel" class="col-md-4 col-form-label text-md-end">{{ __('Channel Description') }}</label>

            <div class="col-md-6">
                <textarea cols="30" rows="4" class="form-control"></textarea>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>
