@component('mail::message')
# Payment #{{ $payment->id }} was not successful

Hi {{ $user->first_name }}, your payment of €{{ $payment->amount }} was not successful. Please save this receipt for your records and try your payment again.<br>

Thank you for your business,<br>
Lucas Weaver

<br>
{{ config('app.name') }}
@endcomponent
