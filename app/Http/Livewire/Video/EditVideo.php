<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class EditVideo extends Component
{
    use AuthorizesRequests;

    public Channel $channel;
    public Video $video;

    protected $rules = [
        'video.title' => 'required|max:255',
        'video.description' => 'nullable|max:1000',
        'video.visibility' => 'nullable|in:private,public,unlisted',
    ];

    public function mount($channel, $video)
    {
        $this->channel = $channel;
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.video.edit-video')
            ->extends('layouts.master');
    }

    public function update()
    {
        $this->authorize('update',$this->video);
        
        $this->validate();

        $this->video->update([
            'title' => $this->video->title,
            'description' => $this->video->description,
            'visibility' => $this->video->visibility,
        ]);

        toast('Video updated successfully','success');

        return redirect()->route('home');
    }
}
