<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
            if ($this->channel->image) {
                unlink(storage_path() . '/app/images/' . $this->channel->image);
            }
            $image = $this->image->storeAs('images', $this->channel->slug . uniqid(true) . '.png');
            $imageImage = explode('/', $image)[1];
            // resize image and convert to PNG format
            $img = Image::make(storage_path() . '/app/' . $image)
                ->encode('png')
                ->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save();

            $this->channel->update(['image' => $imageImage]);
        }

        toast('Channel Update Successful', 'success');



        return redirect()->route('home');
    }
}
