<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function chargeBalance(Request $request) {
        $response = Payment::processPayment($request->registrationId);
        if ($response) {
            return redirect()->route('dashboard.payments', ['locale' => session('locale')])
                ->with('success', 'Payment successful!');
        } else {
            return redirect()->route('dashboard.payments', ['locale' => session('locale')])
                ->with('error', 'Payment failed. Please email me at lucas@weaverschool.com for assistance.');
        }
    }

    public function stripeThankYou(Request $request )
    {
        $courseId = $request->courseId;
        $locale = $request->locale;

        return view('payments.thank-you', compact('courseId', 'locale'));
    }

    public function stripeFlashcardsThankYou(Request $request )
    {
        return view ('payments.flashcards.thank-you');
    }

    public function thankYou(Request $request)
    {
        return view('payments.thank-you.generic');
    }
}
