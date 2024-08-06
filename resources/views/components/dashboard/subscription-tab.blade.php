<div class="" id="subscription" role="tabpanel" aria-labelledby="subscription-tab">
{{--    <h2 class="mt-3 mb-4">Subscriptions</h2>--}}
    @if ( $user->mollie_mandate_id === null )
        <div class="rounded-lg bg-white p-4 shadow-sm w-2/3 mb-4">
            <h3 class="">Enable Subscriptions</h3>
                <p class="mb-3" >To enable this feature you must verify your bank account by making a @lang('currency.symbol')0.01 payment.</p>
                    <form action="{{ url('/payments/mandate') }}" method="POST">
                        @csrf
                            <p class="">Once you enable this feature you can then set up automatic monthly payments for your course.</p>
                            <button type="submit" class="inline-flex items-center px-4 py-3 mt-3 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">Enable Subscriptions</button>
                    </form>
      </div>
  @endif

  @unless ($user->mollie_mandate_id === null)
      @foreach ($registrations->where('outstanding_balance', '>', 0) as $registration)
          @if ($registration->subscription_id === null and $registration->outstanding_balance != 0.00 )
              <div class="rounded-lg bg-white p-4 shadow-sm w-2/3 mb-4">
                  <h3 class="">Start Your Subscription</h3>

                  <p class="mb-3" >Start monthly payments for your {{ $registration->course_name ?? $registration->private_lessons_name }}</p>
                  <table class="table">
                      <tbody>
                      <tr>
                          <th scope="row">Payments:</th>
                          <td>{{ $registration->plan_times }} total payments</td>
                      </tr>
                      <tr>
                          <th scope="row">Amount:</th>
                          <td>@lang('currency.symbol'){{ $registration->plan_monthly_price }}</td>
                      </tr>
                      <tr>
                          <th scope="row">Frequency:</th>
                          <td>Every {{ $registration->plan_interval }}</td>
                      </tr>
                      </tbody>
                  </table>
                    <form action="{{ url('/subscriptions/create') }}" method="POST">
                        @csrf
                            <input type="hidden" id="name" name="name" value="{{ $registration->private_lessons_name ?? $registration->course_name  }}">
                            <input type="hidden" id="times" name="times" value="{{ $registration->plan_times }}">
                            <input type="hidden" id="interval" name="interval" value="{{ $registration->plan_interval }}">
                            <input type="hidden" id="value" name="value" value="{{ $registration->plan_monthly_price }}">
                            <input type="hidden" id="registrationId" name="registrationId" value="{{ $registration->id }}">
                            <input type="hidden" id="plan_name" name="plan_name" value="{{ $registration->plan_name }}">
                            <input type="hidden" id="plan_id" name="plan_id" value="{{ $registration->plan_id }}">
                            <button type="submit" class="inline-flex items-center px-4 py-3 mt-3 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">Start Subscription</button>
                    </form>
              </div>
          @endif
      @endforeach
  @endunless

  @unless (count($subscriptions) === 0)
      <h3 class="mb-4">Active Subscriptions</h3>
    @foreach($subscriptions as $subscription)
              @if ($subscription->status === 'Active')
                  <div class="rounded-lg bg-white p-4 shadow-sm w-2/3 mb-4">
                        <h3 class="mb-3">{{ $registration->course_name  ?? $registration->private_lessons_name }}</h3>
                      <table class="table">
                          <tbody>
                              <tr>
                                  <th scope="row">Payments:</th>
                                  <td>{{ $subscription->times }} total payments</td>
                              </tr>
                              <tr>
                                  <th scope="row">Frequency:</th>
                                  <td>Every {{ $subscription->interval }}</td>
                              </tr>
                              <tr>
                                  <th scope="row">Amount:</th>
                                  <td>@lang('currency.symbol'){{ $subscription->amount }}</td>
                              </tr>
                              <tr>
                                  <th scope="row">Start Date:</th>
                                  <td>{{ $subscription->start_date }}</td>
                              </tr>
                              <tr>
                                  <th scope="row">Next Payment Date:</th>
                                  <td>{{ $subscription->next_payment_date }}</td>
                              </tr>
                              <tr>
                                  <th scope="row">Status:</th>
                                  <td>{{ $subscription->status }}</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              @endif
        @endforeach
  @endunless

<!-- This is for getting test subscription payments from mollie. Should move this soon -->
{{--      <form action="{{ url('/subscriptions/payments/get') }}" method="POST">--}}
{{--          @csrf--}}
{{--          <div class="form-group">--}}
{{--          </div>--}}
{{--          <button type="submit" class="btn btn-lg btn-primary" style="">Get payment</button>--}}
{{--      </form>--}}

</div>

