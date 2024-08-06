@component('mail::message')
# Registration Confirmation

Hi {{ $registration->user->first_name ?? '' }}, your course registration was successful.<br>

Course Name: {{ $registration->course_name }}<br>
Plan: {{ $registration->plan_name }}<br>

@if($registration->trial)Your trial will end on {{ $registration->trial->end_date }} and your payment method will be charged the next day.<br>@endif

Thank you for choosing The Weaver School! And please let me know if you have any questions.<br>

<br>
{{ config('app.name') }}

@endcomponent
