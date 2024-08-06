<div class="tab-pane fade" id="invoicing" role="tabpanel" aria-labelledby="invoicing-tab">
  <div class="row justify-content-center">
    <div class="col-md-8">
        @if ($user->has_invoicing === false)
            <div class="card mb-5">
                <form action="{{ url('/api/invoicingDetails/store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title text-center my-2">Company Invoicing</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead">Primary Invoicing Contact:</p>
                        <div class="form-group">
                            <label for="send_invoices_to_attention">Full Name</label>
                            <input type="name" class="form-control" id="send_invoices_to_attention" name="send_invoices_to_attention" aria-describedby="send_invoices_to_attentionHelp">
                            <small id="send_invoices_to_attentionHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="send_invoices_to_email">Email address</label>
                            <input type="email" class="form-control" id="send_invoices_to_email" name="send_invoices_to_email" aria-describedby="send_invoices_to_email">
                            <small id="send_invoices_to_email" class="form-text text-muted"></small>
                        </div>
                        <p class="lead">Invoicing Details:</p>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" class="form-control" id="company" name="company_name" aria-describedby="company">
                            <small id="companyHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="streetAddress">Street</label>
                            <input type="text" class="form-control" id="streetAddress" name="address1" aria-describedby="streetAddress">
                            <small id="streetAddress" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="houseNumber">Number</label>
                            <input type="text" class="form-control" id="houseNumber" name="address2" aria-describedby="houseNumber">
                            <small id="houseNumber" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="zipCode">Zipcode</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" aria-describedby="zipCode">
                            <small id="zipcode" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" aria-describedby="city">
                            <small id="city" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" aria-describedby="country">
                            <small id="country" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="chamber_of_commerce">KVK Number</label>
                            <input type="text" class="form-control" id="chamber_of_commerce" name="chamber_of_commerce" aria-describedby="chamber_of_commerce">
                            <small id="chamber_of_commerce" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="tax_number">VAT Number</label>
                            <input type="text" class="form-control" id="tax_number" name="tax_number" aria-describedby="tax_number">
                            <small id="tax_number" class="form-text text-muted"></small>
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" id="user_name" name="user_name" value="{{ $user->first_name }} {{ $user->last_name }}">

                            <button type="submit" class="inline-flex items-center px-4 py-3 mt-2 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">Save</button>

                    </div>
                </form>
            </div>
        @else
            @if ( count($registrations) !== 0)
                @foreach ($registrations as $registration)
                    <div class="card mb-5 text-center">
                        <form action="{{ url('/api/invoices/createInvoice') }}" method="POST">
                            @csrf

                            <div class="card-header">
                                <h4 class="card-title my-1 text-center">{{ $registration->course_name ?? $registration->private_lessons_name }}</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-3" >Outstanding Balance: €{{ $registration->outstanding_balance }}</h5>
                                <p>An invoice will be sent via email to the contact details you provided.</p>
                                <input type="hidden" id="registrationId" name="registrationId" value="{{ $registration->id }}">
                            </div>
                            <div class="card-footer">
                                <button class="inline-flex items-center px-4 py-3 mt-2 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" type="submit">Send Invoice</button>
                            </div>

                        </form>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
  </div>
</div>
