<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use Livewire\Component;

class CreateVideo extends Component
{
    public $channel;
    public $name = 'gssjdjdj';

    public function mounted(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.create-video')
            ->extends('layouts.master');
    }
}
