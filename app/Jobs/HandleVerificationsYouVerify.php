<?php

namespace App\Jobs;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
use App\Models\AddressVerificationDetail;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class HandleVerificationsYouVerify extends SpatieProcessWebhookJob
{
    // use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $webhookCall;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $webhookCallData = json_decode($this->webhookCall, true)['payload']['data'];
        // logger($webhookCall);
    //  if($webhookCall["event"] == 'address.completed' && in_array($webhookCall["data"]["type"], ['individual','guarantor','business'])){
         
    //  }    
        
    }
}
