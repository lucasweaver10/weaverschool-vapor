<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Invoice;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class MoneybirdController extends Controller
{
    public function createInvoice(Request $request) {
        $baseUrl = config('services.moneybird.base_url');
        $adminId = config('services.moneybird.admin_id');
        $actionUrl = "/sales_invoices";
        $token = config('services.moneybird.access_id');
        $registration = Registration::where('id', $request->registrationId)->first();
        $userId = $registration->user_id;
        $contactId = Invoice::getContact($userId);

        $attributes = [
            "description" => $registration->private_lessons_name,
            "price" => $registration->hourly_rate . '.00',
            "amount" => "$registration->total_hours",
            "tax_rate_id" => 278303950218724580,
        ];

        $data = [
            "contact_id" => $contactId,
            "currency" => "EUR",
            "details_attributes" =>  [
                $attributes
            ]
        ];

        // dd(json_encode($data));

        $response = Http::withToken($token)->post($baseUrl . $adminId . $actionUrl, [
            "sales_invoice" => $data ]);

        $invoiceId = $response['id'];

        $response = Http::withToken($token)->atch($baseUrl . $adminId . $actionUrl . '/' . $invoiceId . '/send_invoice');

        return redirect('dashboard')->with('invoice-success', 'Thank you. Your invoice has been sent.');
    }
}
