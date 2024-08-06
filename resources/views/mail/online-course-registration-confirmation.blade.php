@component('mail::message')
# Registration Confirmation

Hi {{ $user->first_name }}, your course registration was successful.<br>

Course: {{ $registration->course_name ?? $registration->private_lessons_name }}<br>
Plan: {{ $registration->plan_name ?? '' }}<br>
@if($registration->teacher)Teacher: {{ $registration->teacher->first_name }}@endif

You can now make your payment in your dashboard by clicking on the "Payments" tab, if you haven't done so already.

Once your payment is complete your course will be available in your dashboard.

Thank you for choosing The Weaver School!<br>

<br>
{{ config('app.name') }}

@endcomponent
