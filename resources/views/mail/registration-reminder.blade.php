@component('mail::message')
# <div align="center">Next step: register for your lessons</div>

Hi {{ $user->first_name ?? '' }}

Now that you've created your account, the next step is registering for your lessons. Registration is simple and easy. Just click on the "Registration" tab on the left side of your student dashboard and then follow the step by step form to complete your course registration.

<strong>Choose your teacher and number of hours</strong><br>
All you need to do is choose which teacher you want to take lessons from, how many total hours of lessons you want to take (the minimum number of hours is 12), and how many hours you want per week.

<strong>Scheduling your lessons</strong><br>
Once you've registered and completed your payment, we'll then reach out to you via email about what time is best for you to schedule your lessons.

<strong>Have questions?</strong><br>
If you have any questions please email me at [lucas@weaverschool.com](mailto:lucas@weaverschool.com) and I'll be happy to help. Or, you can [schedule a phone call with me here](https://meetings.hubspot.com/lucas56):

<br>
<img src="{{ asset('/images/lucas_weaver.jpg') }}" style="height: 100px; width: 100px; border-radius: 50%; margin-top: 20px; margin-bottom: 20px; margin-left: 40%; margin-right: 45%;" alt="lucas weaver">

<br>
<div align="center">Thank you for choosing The Weaver School!<br></div>
<div align="center">Lucas Weaver</div>

@component('mail::button', ['url' => 'https://www.weaverschool.com/login'])
    Log in
@endcomponent

{{-- <br>
{{ config('app.name') }} --}}
@endcomponent
