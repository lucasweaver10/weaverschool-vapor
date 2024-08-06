<div x-data="{ tab: 'balance', content: 'balance', }">
    <!-- Balance Payments -->
    <div x-show="tab === 'balance'">
        @if(count($registrations) == 0)
            <p class="lead">This is where you will manage your payments.</p>
        @else
            @if($user->pm_id == null)
                <div class="rounded-lg bg-white p-4 shadow-sm mb-5">
                    <div class="mb-4">You don't have a payment method on file. Add one now.</div>
                    <a href="{{ route('dashboard.payments.methods.create', ['locale' => session('locale')]) }}" role="button" type="submit"
                       class="inline-flex items-center px-4 py-3 mt-2 border
                            border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-500
                            hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-300">
                        Add Payment Method
                    </a>
                </div>
            @endif
            @foreach($registrations as $registration)
                <div class="rounded-lg bg-white p-4 shadow-sm mb-5">
                    <div class="my-1">{{ $registration->course_name ?? $registration->private_lessons_name }}</div>
                    <h3 class="mt-3 mb-3">Outstanding Balance: @lang('currency.symbol'){{ $registration->outstanding_balance }}</h3>

                    @php
                        // Check if the trial exists and if its end_date is before today
                        $showPaymentForm = $registration->trial && $registration->trial->end_date < now();
                        // Additional check for outstanding balance
                        $showPaymentForm = $showPaymentForm && $registration->outstanding_balance > 0;
                    @endphp

                    @if($showPaymentForm || (!$registration->trial && $registration->outstanding_balance > 0))
                        @if($user->pm_id)
                            <form action="{{ route('payments.charge-balance') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="registrationId" name="registrationId" value="{{ $registration->id }}">
                                </div>
                                <button role="button" type="submit" class="inline-flex items-center px-4 py-3 mt-2 border
                                    border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-500
                                    hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-400">
                                    Pay Balance
                                </button>
                            </form>
                        @endif
                    @elseif($registration->outstanding_balance == 0)
                        <p class="text-center">Thanks for paying your bill!</p>
                    @else
                        <p class="my-5">Your card will be automatically charged on {{ $registration->trial->end_date }}.
                            To cancel your trial click on the button below.
                        </p>
                    @endif

                    @if(!$showPaymentForm)
                        @if($registration->trial && $registration->trial->cancelled_at == null)
                        <form action="{{ route('trials.cancel') }}" method="POST">
                            @csrf
                            <input type="hidden" name="trialId" value="{{ $registration->trial->id }}">
                            <button role="button" type="submit" class="inline-flex items-center px-4 py-3 mt-2 border
                                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500
                                hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Cancel Trial
                            </button>
                        </form>
                        @endif
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <x-alerts.success />
</div>
