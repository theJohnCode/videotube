<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{

    use WithFileUploads;

    public Channel $channel;
    public Video $video;
    public $videofile;

    protected $rules = [
        'videofile' => 'required|file|mimes:mp4|max:102400',
    ];

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.create-video')
            ->extends('layouts.master');
    }

    public function fileCompleted()
    {
        // validate the video according to the rules above

        $this->validate();

        $this->video = $this->channel->videos()->create([
            'title' => 'untitled',
            'description' => '',
            'uid' => uniqid(true),
            'visibility' => 'private',
        ]);

        // go to edit route
        return redirect()->route('video.edit', [
            'channel' => $this->channel,
            'video' => $this->video,
        ]);
    }
}
