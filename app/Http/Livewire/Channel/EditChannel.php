<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;

class EditChannel extends Component
{

    public $channel;


    public function mounted(Channel $channel)
    {
        $this->channel = $channel;   
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function submit()
    {
        dd($this->name);
    }
}
