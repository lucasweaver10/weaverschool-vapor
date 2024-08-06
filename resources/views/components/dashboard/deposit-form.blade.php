{{-- @unless ( $registration->deposit_paid === null )
                        <form action="{{ url('/payments/desposit') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pay your €20 <strong>one-time</strong> deposit.</label>
                                <input type="hidden" id="registrationId" name="registrationId" value="{{ $registration->id }}">
                                <button type="submit" class="btn btn-lg btn-primary" style="width: 100%;">Pay Deposit</button>
                            </div>
                        </form>
            @endunless   --}}