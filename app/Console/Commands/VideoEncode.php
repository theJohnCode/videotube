<?php

namespace App\Console\Commands;

use FFMpeg\Format\Video\X264;
use Illuminate\Console\Command;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoEncode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video-encode:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Video Encoder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $low = (new X264('aac'))->setKiloBitrate(500);
        $high = (new X264('aac'))->setKiloBitrate(1000);

        FFMpeg::fromDisk('videos_temp')
            ->open('sample.mp4')
            ->exportForHLS()
            ->addFormat($low, function ($filter) {
                $filter->resize(640, 480);
            })
            ->addFormat($high, function ($filter) {
                $filter->resize(1280, 720);
            })
            ->onProgress(function($progress){
                $this->info("Progress {$progress}%");
            })
            ->toDisk('videos_temp')
            ->save('/test/file.m3u8');
    }
}
