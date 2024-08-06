<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Invoice extends Model
{
    public static function getContacts (Request $request) {
        $baseUrl = config('services.moneybird.base_url');
        $adminId = config('services.moneybird.admin_id');
        $actionUrl = "/contacts";
        $token = config('services.moneybird.access_id');

        $response = Http::withToken($token)->get($baseUrl . $adminId . $actionUrl);

        return $response;
    }

    public static function createBasicContact (User $user) {
        $baseUrl = config('services.moneybird.base_url');
        $adminId = config('services.moneybird.admin_id');
        $actionUrl = "/contacts";
        $token = config('services.moneybird.access_id');

        $contact = [
            "email" => $user->email,
            "customer_id" => $user->id,
            "mollie_customer_id" => $user->mollie_customer_id,
        ];

        $response = Http::withToken($token)->post($baseUrl . $adminId . $actionUrl, [
            "contact" => $contact
        ]);

        return $response;

    }

    public static function createContact (User $user) {
        $baseUrl = config('services.moneybird.base_url');
        $adminId = config('services.moneybird.admin_id');
        $actionUrl = "/contacts";
        $token = config('services.moneybird.access_id');

        $contact = [
            "firstname" => $user->first_name,
            "lastname" => $user->last_name,
            "company_name" => $user->company_name,
            "email" => $user->email,
            "customer_id" => $user->id,
            "mollie_customer_id" => $user->mollie_customer_id,
        ];

        $response = Http::withToken($token)->post($baseUrl . $adminId . $actionUrl, [
            "contact" => $contact
        ]);

        return $response;
    }

    public static function updateContact ($contact) {
        $baseUrl = config('services.moneybird.base_url');
        $adminId = config('services.moneybird.admin_id');
        $actionUrl = "/contacts/";
        $token = config('services.moneybird.access_id');

        $request = Http::withToken($token)->get($baseUrl . $adminId . $actionUrl . 'customer_id/' . $contact['customer_id']);

        $contactId = $request['id'];

        $response = Http::withToken($token)->patch($baseUrl . $adminId . $actionUrl . $contactId, [
            "contact" => $contact
        ]);

        return redirect('dashboard')->with('invoicing-success', 'Thank you. Your invoicing information has been saved successfully.');

    }
}
