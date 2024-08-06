@component('mail::message')
# Payment Confirmation for Payment #{{ $payment->id }}

Hi {{ $user->first_name }}, payment #{{ $payment->id }} was successful. Please save this receipt for your records.<br>

Payment Date: {{ $payment->created_at }}<br>
Payment ID: {{ $payment->id }}<br>
Total Paid: €{{ $payment->amount }}<br>
Remaining Balance: €{{ $payment->registration->outstanding_balance }}<br>
Course: {{ $payment->registration->private_lessons_name ?? $payment->registration->course_name  }}<br>
Paid by: {{ $payment->user->first_name ?? ''}} {{ $payment->user->last_name ?? '' }}<br>

Thank you for your business,<br>
Lucas Weaver

<br>
{{ config('app.name') }}
@endcomponent
