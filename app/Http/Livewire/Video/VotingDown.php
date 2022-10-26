<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Dislike;
use Livewire\Component;

class VotingDown extends Component
{
    public Video $video;

    public $dislikes;
    public bool $dislikesActive;

    public function mount(Video $video)
    {
        $this->video = $video;
        $this->checkIfDisliked();
    }

    public function render()
    {
        $this->dislikes = $this->video->dislikes->count();

        return view('livewire.video.voting-down')->extends('layouts.master');
    }


    public function checkIfDisliked()
    {
        return $this->video->userDislikedVideo() ? $this->dislikesActive = true : $this->dislikesActive = false;
    }

    public function dislike()
    {
        if ($this->video->userDislikedVideo()) {
            Dislike::where('user_id', auth()->id())
                ->where('video_id', $this->video->id)
                ->delete();
            $this->dislikesActive = false;
        } else {
            $this->video->dislikes()->create([
                'user_id' => auth()->id(),
            ]);
            $this->dislikesActive = true;
        }
    }
}
