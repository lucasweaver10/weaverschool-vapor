<?php

namespace App\Jobs;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Laravel\Cashier\Subscription;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CaptureAuthorizedPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;    

    public $paymentIntent;
    public $stripeCustomerId;
    public $stripeSubscriptionId;
    public $amount;
    public $tries = 3;
    public $timeout = 120;
    
    /**
     * Create a new job instance.
     */
    public function __construct($paymentIntent, $stripeCustomerId, $stripeSubscriptionId, $amount)
    {
        $this->paymentIntent = $paymentIntent;
        $this->stripeCustomerId = $stripeCustomerId;
        $this->stripeSubscriptionId = $stripeSubscriptionId;
        $this->amount = $amount;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscription = Subscription::where('stripe_id', $this->stripeSubscriptionId)->first();
        if($subscription->stripe_status !== 'canceled') {
            Payment::captureAuthorizedPayment($this->paymentIntent, $this->stripeCustomerId, $this->stripeSubscriptionId, $this->amount);
        }
    }
}
