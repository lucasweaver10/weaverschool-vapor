@component('mail::message')
# Registration Confirmation

Hi {{ $user->first_name }}, your course registration was successful.<br>

Course: {{ $registration->course_name}}<br>
Total hours: {{ $registration->total_hours }}<br>

You can now make your payment in your dashboard by clicking on the "Payments" tab.

We will reach out via email with the next steps and more info about your course.

Thank you for choosing The Weaver School!<br>

<br>
{{ config('app.name') }}

@endcomponent
