<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InvoiceController extends Controller
{
    public function storeInvoicingDetails (Request $request) {
        $contact = [
            'send_invoices_to_attention' => $request->send_invoices_to_attention,
            'send_invoices_to_email' => $request->send_invoices_to_email,
            'company_name' => $request->company_name,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'country' => $request->country,
            'chamber_of_commerce' => $request->chamber_of_commerce,
            'tax_number' => $request->tax_number,
            'customer_id' => $request->userId,
        ];

        Invoice::updateContact($contact);

        return redirect('dashboard')->with('invoicing-success', 'Thank you. Your invoicing information has been saved successfully.');

    }

    public function sendToMoneybird () {
        $baseUrl = config('services.moneybird.base_url');
        $adminId = config('services.moneybird.admin_id');
        $actionUrl = "/sales_invoices";
        $token = config('services.moneybird.access_id');

        $attributes = [
            "description" => "Private English Lessons - Online",
            "price" => 129.95,
            "amount" => "12",
        ];

        $data = [
            "reference" => "30059",
            "contact_id" => 322591994761184742,
            "currency" => "EUR",
            $details_attributes =  [
                $attributes
            ]
        ];

        dd(json_encode($data));

        $response = Http::withToken($token)->post($baseUrl . $adminId . $actionUrl, [
            "sales_invoice" => $data ]);

        dd($response, $response['error']);
        // dd($response['error']);

        return $response;
    }
}
