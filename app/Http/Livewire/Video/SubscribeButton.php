<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Subscriber;
use Livewire\Component;

class SubscribeButton extends Component
{
    public Channel $channel;
    public $subscribed;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
        $this->isSubscribed();
    }

    public function render()
    {
        return view('livewire.video.subscribe-button');
    }

    public function isSubscribed(): bool
    {
        return $this->channel->userSubscribed() ? $this->subscribed =  true : $this->subscribed = false;
    }

    public function subscribe()
    {
        if ($this->channel->userSubscribed()) {
            // alert('Do you want to UNSUBSCRIBE to this channel?',);
            Subscriber::where('user_id', auth()->id())
                ->where('channel_id', $this->channel->id)
                ->delete();
            $this->subscribed = false;
        } else {
            $this->channel->subscribers()->create([
                'user_id' => auth()->id(),
            ]);
            $this->subscribed = true;
        }
    }
}
