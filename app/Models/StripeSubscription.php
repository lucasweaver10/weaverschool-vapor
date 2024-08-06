<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeSubscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function cancel($subscriptionId)
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $subscription = $stripe->subscriptions->cancel(
            $subscriptionId,
            []
        );
        $endsAt = Carbon::createFromTimestamp($subscription->current_period_end);
        $cancelledAt = Carbon::createFromTimestamp($subscription->ended_at);
        $stripeSubscription = StripeSubscription::where('stripe_id', $subscription->id)->first();
        $stripeSubscription->update(['stripe_status' => $subscription->status, 'ends_at' => $endsAt, 'cancelled_at' => $cancelledAt ]);
        return $subscription->status;
    }
}
