@component('mail::message')
# Information About English Lessons

Hi {{ $data['name'] }}, thank you for contacting The Weaver School. 

I will try and get back to you within 24 hours.<br>

You can also email me directly at lucas@weaverschool.com.

Talk soon,
Lucas Weaver

@component('mail::button', ['url' => 'https:://weaverschool.com/register'])
Create Account
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
