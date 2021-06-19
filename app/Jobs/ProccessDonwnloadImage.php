<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProccessDonwnloadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $folder, $fileName, $url;

    public function __construct($folder, $fileName, $url)
    {
        $this->folder = $folder;
        $this->fileName = $fileName;
        $this->url = $url;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $downloadedFileContents = file_get_contents($this->url);


        if (!file_exists($this->folder)) {
            mkdir($this->folder, 0775);
        }

        file_put_contents( $this->folder . $this->fileName, $downloadedFileContents, LOCK_EX);
    }



}
