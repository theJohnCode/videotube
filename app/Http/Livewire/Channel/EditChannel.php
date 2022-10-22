<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditChannel extends Component
{
    use AuthorizesRequests,
        WithFileUploads;
    /**
     * @var $channel \App\Models\Channel
     */
    public $channel;
    public $image;

    protected function rules()
    {
        return [
            'channel.name' => 'required|max:255|unique:channels,name,' . $this->channel->id,
            'channel.description' => 'nullable|max:1000',
            'image' => 'nullable|max:1024',
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

        $this->authorize('update', $this->channel);
        $this->validate();

        $this->channel->update([
            'name' => $this->channel->name,
            'slug' => Str::slug($this->channel->name),
            'description' => $this->channel->description,
        ]);

        if ($this->image) {
           
            $image = $this->image->storeAs('images', $this->channel->slug . uniqid(true) . '.png');

            $this->channel->update(['image' => $image]);
        }

        toast('Channel Update Successful', 'success');



        return redirect()->route('home');
    }
}
