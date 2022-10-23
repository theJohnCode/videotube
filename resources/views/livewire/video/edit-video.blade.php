<div>
    <div class="center" style="margin: 0 auto; width: 70%">
        <div class="card">
            <div class="card-header">{{ __('Edit Video') }}</div>

            <div class="card-body">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div style="margin: auto">
                                <img 
                                class="img-thumbnail" 
                                src="{{ asset($this->video->thumbnail) }}" 
                                alt="" 
                                {{-- style="width: 200px; height:200px;" --}}
                                > 
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top: 10%">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $this->video->processing_percentage }}%;" aria-valuenow="{{ $this->video->processing_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $this->video->processing_percentage }}%</div>
                              </div>
                        </div>
                    </div>
                </div>
                

                <form wire:submit.prevent='update'>

                    <div class="row mb-3">
                        <label for="title"
                            class="col-md-4 col-form-label text-md-end">{{ __('Video Title') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" wire:model='video.title'>
                        </div>
                        @error('video.title')
                            <span style="display:block; width: 70%; margin:auto; background:none; border:none"
                                class="alert alert-danger text-center">
                                <strong>{{ $message }}</strong>
                            </span pan>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="description"
                            class="col-md-4 col-form-label text-md-end">{{ __('Video Description') }}</label>

                        <div class="col-md-6">
                            <textarea style="resize: none" cols="30" rows="4" class="form-control" wire:model='video.description'></textarea>
                        </div>
                        @error('video.description')
                            <span style="display:block; width: 70%; margin:auto; background:none; border:none"
                                class="alert alert-danger text-center">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="row mb-3">
                        <label for="visibility" class="col-md-4 col-form-label text-md-end">{{ __('Privacy') }}</label>

                        <div class="col-md-6">
                            <select wire:model="video.visibility" class="form-control">
                                <option value="private">Private</option>
                                <option value="public">Public</option>
                                <option value="unlisted">Unlisted</option>
                            </select>
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
        </div>
    </div>
</div>
