<?php

namespace App\Jobs;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConfirmAuthorizedPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $registrationId;
    public $tries = 3;

    // Take the $this->user, $registration from StoreStripe and confirm the payment //
    // This job should be scheduled to run 6 days and 23 hours after the payment is authorized //

    public function __construct($registrationId)
    {
        $this->registrationId = $registrationId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Payment::confirmAuthorizedPayment($this->registrationId);
    }
}
