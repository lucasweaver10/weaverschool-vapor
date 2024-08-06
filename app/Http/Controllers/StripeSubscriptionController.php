<?php

namespace App\Http\Controllers;

use App\Models\StripeSubscription;
use Illuminate\Http\Request;

class StripeSubscriptionController extends Controller
{
    public function cancel($id)
    {
        $status = StripeSubscription::cancel($id);
        if($status == 'canceled')
        {
            return redirect()->route('dashboard.subscriptions.index', ['locale' => session('locale')])
                ->with('success', 'Your subscription has been canceled');
        }
        else
        {
            return redirect()->route('dashboard.subscriptions.index', ['locale' => session('locale')])
                ->with('error', 'Something went wrong, please try again.');
        }
    }
}
