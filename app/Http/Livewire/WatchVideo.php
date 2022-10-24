<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class WatchVideo extends Component
{
    public Video $video;

    protected $listeners = ['videoViewed' => 'increaseViewCount'];

    public function mount(Video $video)
    {
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.watch-video')->extends('layouts.master');
    }

    public function increaseViewCount()
    {
        $this->video->update([
            'views' => $this->video->views + 1
        ]);

        // dd($this->video->views);
    }
}
