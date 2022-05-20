<?php

namespace App\Jobs;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class HandleVerificationsYouVerify extends SpatieProcessWebhookJob
{
    // use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $webhookCall;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $webhookCall = $this->webhookCall;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
    }
}
