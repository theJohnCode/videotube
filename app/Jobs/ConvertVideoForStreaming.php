<?php

namespace App\Jobs;

use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ConvertVideoForStreaming implements ShouldQueue
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
        $destination = '/' . $this->video->uid . '/' . $this->video->uid . '.m3u8';

        $low = (new X264('aac'))->setKiloBitrate(400);
        $med = (new X264('aac'))->setKiloBitrate(1200);
        // $high = (new X264('aac'))->setKiloBitrate(1500);
        // $HD720 = (new X264('aac'))->setKiloBitrate(4000);
        // $HD1080 = (new X264('aac'))->setKiloBitrate(8000);
        // $_4k = (new X264('aac'))->setKiloBitrate(14000);

        FFMpeg::fromDisk('videos_temp')
            ->open($this->video->url)
            ->exportForHLS()
            ->addFormat($low, function ($filter) {
                $filter->resize(480, 270);
            })
            ->addFormat($med, function ($filter) {
                $filter->resize(640, 360);
            })
            // ->addFormat($high, function ($filter) {
            //     $filter->resize(960, 540);
            // })
            // ->addFormat($HD720, function ($filter) {
            //     $filter->resize(1280, 720);
            // })
            // ->addFormat($HD1080, function ($filter) {
            //     $filter->resize(1920, 1020);
            // })
            // ->addFormat($_4k, function ($filter) {
            //     $filter->resize(3840, 2160);
            // })
            ->onProgress(function ($progress) {
                $this->video->update([
                    'processing_percentage' => $progress,
                ]);
            })
            ->toDisk('videos')
            ->save($destination);

        $this->video->update([
            'processed' => true,
            'processed_file' => $this->video->uid . '.m3u8',
        ]);

       $result = Storage::disk('videos_temp')->delete($this->video->url);

       Log::info($this->video->ur. 'video deleted from temp folder');
    }
}
