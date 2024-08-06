<?php

namespace App\Http\Controllers;

use App\Models\InvoicingDetails;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InvoicingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $contact = [
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
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
            'customer_id' => $request->user_id,
        ];

        $invoicingDetails = InvoicingDetails::create($contact);

        Invoice::updateContact($contact);

        $user = User::where('id', $contact['user_id'])->update(['has_invoicing' => true]);

        // $user->update('has_invoicing', true);

        return redirect('dashboard')->with('invoicing-success', 'Thank you. Your invoicing information has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoicingDetails  $invoicingDetails
     * @return \Illuminate\Http\Response
     */
    public function show(InvoicingDetails $invoicingDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoicingDetails  $invoicingDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoicingDetails $invoicingDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoicingDetails  $invoicingDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoicingDetails $invoicingDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoicingDetails  $invoicingDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoicingDetails $invoicingDetails)
    {
        //
    }
}
