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
        if (in_array($webhookCallData["type"], ['individual', 'guarantor', 'business'])) {
            $get_verification_details = AddressVerificationDetail::where('reference_id', $webhookCallData['referenceId'])->first();

            $get_verification_details->agent = json_encode($webhookCallData['agent']);
            $get_verification_details->status = $webhookCallData['status'];
            $get_verification_details->task_status = $webhookCallData['taskStatus'];
            $get_verification_details->start_date = $webhookCallData['startDate'];
            $get_verification_details->end_date = $webhookCallData['endDate'];
            $get_verification_details->submitted_at = $webhookCallData['submittedAt'];
            $get_verification_details->execution_date = $webhookCallData['executionDate'];
            $get_verification_details->completed_at = $webhookCallData['completedAt'];
            $get_verification_details->accepted_at = $webhookCallData['acceptedAt'];
            $get_verification_details->revalidation_date = $webhookCallData['revalidationDate'];
            $get_verification_details->notes = json_encode($webhookCallData['notes']);
            $get_verification_details->is_flagged = $webhookCallData['isFlagged'];
            $get_verification_details->agent_submitted_longitude = $webhookCallData['agentSubmittedLongitude'];
            $get_verification_details->agent_submitted_latitude = $webhookCallData['agentSubmittedLatitude'];
            $get_verification_details->report_geolocation_url = $webhookCallData['reportGeolocationUrl'];
            $get_verification_details->map_address_url = $webhookCallData['mapAddressUrl'];
            $get_verification_details->submission_distance_in_meters = $webhookCallData['submissionDistanceInMeters'];
            $get_verification_details->reasons = $webhookCallData['reasons'];
            $get_verification_details->signature = $webhookCallData['signature'];
            $get_verification_details->images = json_encode($webhookCallData['images']);
            $get_verification_details->building_type = $webhookCallData['buildingType'];
            $get_verification_details->building_color = $webhookCallData['buildingColor'];
            $get_verification_details->gate_present = $webhookCallData['gatePresent'];
            $get_verification_details->gate_color = $webhookCallData['gateColor'];
            $get_verification_details->availability_confirmed_by = $webhookCallData['availabilityConfirmedBy'];
            $get_verification_details->closest_landmark = $webhookCallData['closestLandmark'];
            $get_verification_details->additional_info = $webhookCallData['additionalInfo'];
            $get_verification_details->report_agent_access = $webhookCallData['reportAgentAccess'];
            $get_verification_details->incident_report = $webhookCallData['incidentReport'];
            $get_verification_details->download_url = $webhookCallData['downloadUrl'];
            $get_verification_details->links = json_encode($webhookCallData['links']);
            $get_verification_details->save();
        }
    }
}
