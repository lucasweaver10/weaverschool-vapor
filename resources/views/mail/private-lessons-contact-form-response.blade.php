@component('mail::message')
# Information About English Lessons

Hi {{ $data['firstName'] }}, thank you for contacting The Weaver School. Here's a bit of info to hopefully answer most of your questions.

<strong>Online Private Lessons</strong><br>
With our online private lessons, you can attend your lessons from anywhere. You won’t have to worry about transportation to and from a classroom, the only thing you’ll need is your laptop and an internet connection.

<strong>Flexible Schedules</strong><br>
You can schedule your lessons any time that is most convenient for you. Whether you prefer morning, afternoon, or night time, our teachers are happy to work with your schedule.

<strong>Flexible Pricing</strong><br>
Our teachers set their own hourly rates based on their teaching experience and expertise. This means that you get to choose the teacher whose hourly rate fits with your budget and preferences. You can see our teachers' hourly rates on our [Teachers page](https://weaverenglish.nl/teachers) when you log into your free The Weaver School account.

<strong>Choose Your Own Teacher</strong><br>
All of our teachers are experienced professional English teachers, with an average of 21 years teaching experience per teacher. By visiting our teachers page on our website, you can see all of our available teachers, including their specialties, teaching experience, as well as which other languages they speak that might be helpful for you.

<strong>Easy Payments</strong><br>
Our payment process is smooth and simple. You can choose between an online payment all at once (iDeal or SEPA), or choose easy monthly payments. You can also have an invoice sent to your employer so they can make the payment for you.

<strong>In-Person Group & Private Lessons at Your Location</strong><br>
We also offer in-person private & group lessons at your location if you prefer lessons at your home or office. Please note that for some remote locations we may charge a travel fee.

<strong>How to Get Started</strong><br>
Create your free The Weaver School account [here](https://weaverenglish.nl/register) and you can then register for courses and take our free level test. If you have questions please email us at [contact@weaverenglish.nl](mailto:contact@weaverenglish.nl) and we will be happy to help.

Thank you for your interest in The Weaver School!<br>
Lucas Weaver

@component('mail::button', ['url' => 'https:www.weaverenglish.nl/register'])
Create Account
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
