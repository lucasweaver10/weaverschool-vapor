<!DOCTYPE html>
<body>

<p>New course registration: </p>

<p>Name: {{ $registration->user->first_name }}
<br>Course: {{ $registration->course_name ?? $registration->private_lessons_name }}
<br>Plan: {{ $registration->plan_name }}
<br>Balance due: {{ $registration->outstanding_balance }}

<p>{{ config('app.name') }}</p>

</body>
</html>
