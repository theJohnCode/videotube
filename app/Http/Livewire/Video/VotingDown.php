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

    protected $listeners = ['reduceDislike' => 'reduceDislike'];

    public function mount(Video $video)
    {
        $this->video = $video;
        $this->checkIfDisliked();
    }

    public function render()
    {
        return view('livewire.video.voting-down')->extends('layouts.master');
    }

    public function reduceDislike($id)
    {
        // dd($id);
        Dislike::where('user_id', auth()->id())
                ->where('video_id', $id)
                ->delete();
        $this->dislikesActive = false;
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
            $this->emit('reduceLike',['id' => $this->video->id]);
            $this->dislikesActive = true;
        }
    }
}
