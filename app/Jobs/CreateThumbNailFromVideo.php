<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class CreateThumbNailFromVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Video $video)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $destination = '/' . $this->video->uid . '/' . $this->video->uid . '.png';

        FFMpeg::fromDisk('videos_temp')
            ->open($this->video->url)
            ->getFrameFromSeconds(2)
            ->export()
            ->toDisk('videos')
            ->save($destination);

        $this->video->update([
            'thumbnail_image' => $this->video->uid . '.png',
        ]);
    }
}
