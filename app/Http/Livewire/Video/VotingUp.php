<?php

namespace App\Http\Livewire\Video;

use App\Models\Like;
use App\Models\Video;
use Livewire\Component;
use App\Models\Interaction;

class VotingUp extends Component
{
    public Video $video;
    public $likes;
    public bool $likesActive;

    protected $listeners = ['reduceLike' => 'reduceLike'];

    public function mount(Video $video)
    {
        $this->video = $video;
        $this->likes = $video->likes_count;
        $this->checkIfLiked();
    }

    public function reduceLike($id)
    {
        $this->likes--;
        Like::where('user_id', auth()->id())
                ->where('video_id', $id)
                ->delete();
        $this->likesActive = false;
    }

    public function checkIfLiked()
    {
        return $this->video->userLikedVideo() ? $this->likesActive = true : $this->likesActive = false;
    }

    public function render()
    {
        return view('livewire.video.voting-up')->extends('layouts.master');
    }

    public function like()
    {
        if ($this->video->userLikedVideo()) {
            Like::where('user_id', auth()->id())
                ->where('video_id', $this->video->id)
                ->delete();
            $this->likesActive = false;
            $this->likes--;
        } else {
            $this->video->likes()->create([
                'user_id' => auth()->id(),
            ]);
            $this->emit('reduceDislike',['id' => $this->video->id]);
            $this->likesActive = true;
            $this->likes++;
        }
    }
}
