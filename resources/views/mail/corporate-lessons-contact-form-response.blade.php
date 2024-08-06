@component('mail::message')
# Information about Corporate English Lessons

Hi {{ $data['firstName'] }}, thank you for contacting The Weaver School. Here's a bit of info about our Corporate lessons to hopefully answer most of your questions.

<strong>Lessons Taught by Business Professionals for Business Professionals</strong><br>
One of the biggest differences at The Weaver School is that all of our Business English teachers have worked in the corporate world. We know what vocabulary you need for real-world work situations because WE ARE IN these same situations every day.

<strong>Improve without Leaving the Office</strong><br>
Our In-Company corporate lessons are the best option for companies who want their employees to improve their English while not interfering with their work. Your employees will receive
training at your location, so they'll never be far away if anything urgent at work comes up. They also save time by not having to leave the office.

<strong>Come to Our Location</strong><br>
We also provide lessons at our location in the Groothandelsgebouw, right next to Central Station. Our beautiful and spacious sound-proof boardrooms, huge whiteboard walls, and large TV screens all ensure that you will receive the best Business English training in all of Rotterdam.

<strong>Online Courses</strong><br>
We also provide online lessons via Zoom Video. If you live far from the city and don't have time to come to the city center, we can teach you right in your home without sacrificing course quality.

<strong>Pricing</strong><br>
The hourly rate for In-Person Corporate private lessons is €75 per hour with a minimum of 10 hours (€750 total). For Corporate group courses the price is €500 per student for a 20-hour course (usually given over a period of 10 weeks).

The hourly rate for Online Corporate private lessons is €55 per hour with a minimum of 10 hours (€550 total).

<strong>Next Steps</strong><br>
If you're interested in a Corporate course or private lessons, click the button below to schedule a phone call with us at a time of your convenience. I will give you all the details you need and answer all of your questions.

Thank you for your interest in The Weaver School!<br>
The The Weaver School Team

@component('mail::button', ['url' => 'https://calendly.com/weaverenglish/meetings'])
Schedule a phone call
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
