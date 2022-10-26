<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class Home extends Component
{
    public $videos;

    public function mount()
    {
        $this->videos = Video::where('visibility', 'public')
            ->where('processing_percentage', 100)
            ->get();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
