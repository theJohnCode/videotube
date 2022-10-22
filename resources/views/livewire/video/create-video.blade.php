<div>
    {{-- Stop trying to control. --}}
    <div class="card text-center">
        <div class="card-header">
            <h5 class="card-title">
                Upload Your Video
            </h5>
        </div>
        <div class="card-body" style="width: 60%; margin: 0 auto;" x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false,$wire.fileCompleted()"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

            <div class="progress mb-3" x-show="isUploading">
                <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"></div>
            </div>

            <form x-show="!isUploading">
                <div class="row mb-3">
                    <label for="channel" class="col-md-4 col-form-label text-md-end">{{ __('Video File') }}</label>
                    <div class="col-md-6">
                        <input type="file" name="videofile" class="form-control" wire:model='videofile' />
                    </div>
                    @error('videofile')
                        <span style="display:block; width: 70%; margin:auto; background:none; border:none"
                            class="alert alert-danger text-center">
                            <strong>{{ $message }}</strong>
                        </span pan>
                    @enderror
                </div>
            </form>

        </div>
    </div>
