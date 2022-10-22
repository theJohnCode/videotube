<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Str;

class EditChannel extends Component
{
    use AuthorizesRequests;
    /**
     * @var $channel \App\Models\Channel
     */
    public $channel;

    protected function rules()
    {
        return [
            'channel.name' => 'required|max:255|unique:channels,name,'.$this->channel->id,
            'channel.description' => 'nullable|max:1000',
        ];
    }
    public function mounted(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function update()
    {

        $this->authorize('update',$this->channel);
        $this->validate();

        $this->channel->update([
            'name' => $this->channel->name,
            'slug' => Str::slug($this->channel->name),
            'description' => $this->channel->description,
        ]);

        toast('Channel Update Successful','success');



        return redirect()->route('home');
    }
}
