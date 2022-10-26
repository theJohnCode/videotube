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

    public function mount(Video $video)
    {
        $this->video = $video;
        $this->checkIfLiked();
    }

    public function checkIfLiked()
    {
        return $this->video->userLikedVideo() ? $this->likesActive = true : $this->likesActive = false;
    }

    public function render()
    {
        $this->likes = $this->video->likes->count();

        return view('livewire.video.voting-up')->extends('layouts.master');
    }

    public function like()
    {
        // return tap(Interaction::query()->firstOrCreate([
        //     'user_id' => auth()->id(),
        //     'video_id' => $this->video->id,
        // ]), static function (Interaction $interaction): void {
        //     $interaction->liked = !$interaction->liked;
        //     $interaction->save();

        // event(new SongLikeToggled($interaction));
        // });

        if ($this->video->userLikedVideo()) {
            Like::where('user_id', auth()->id())
                ->where('video_id', $this->video->id)
                ->delete();

            $this->likesActive = false;
        } else {
            $this->video->likes()->create([
                'user_id' => auth()->id(),
            ]);
            $this->likesActive = true;
        }
    }
}
