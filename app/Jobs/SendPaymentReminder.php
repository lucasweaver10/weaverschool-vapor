<?php

namespace App\Jobs;

use App\Mail\PaymentReminder;
use App\Models\EmailAutomation;
use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPaymentReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $registration;
    public $user;
    public $tries = 3;
    public $backoff = 5;
    public $maxExceptions = 2;

    public function uniqueId()
    {
        return $this->registration->id;
    }

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $registration)
    {
        $this->registration = $registration;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $registration = Registration::find($this->registration->id);
        if($registration->total_paid == 0) {
            EmailAutomation::sendPaymentReminder($this->user);
        }
        else {
            info('This student has already paid!');
        }
    }

    public function failed($e)
    {
        info($e);
    }
}
