@component('mail::message')
# Level Test Results

Hi {{ $data['first_name'] }},

Here are your results from your level test:

Your score: {{ $data['score'] }}<br>
Your level: {{ $data['level'] }}

If you have already created a free The Weaver School student account, you can find your course recommendation in your Dashboard in the "Level Test" tab.

If you have not yet created your free account, do so now by clicking the "Register" button.


@component('mail::button', ['url' => 'https://weaverenglish.nl/dashboard'])
Dashboard
@endcomponent
@component('mail::button', ['url' => 'https://weaverenglish.nl/register', 'color' => 'success'])
Register
@endcomponent

Thank you,<br>
{{ config('app.name') }}
@endcomponent
