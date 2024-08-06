@component('mail::message')
# Information About Our IELTS Courses

Hi {{ $data['firstName'] }}, thank you for contacting The Weaver School. Here's a bit of info about our IELTS courses to hopefully answer most of your questions.

<strong>In-Person Courses</strong><br>
Our next round of In-Person IELTS group courses is starting on 10 October. These courses will be limited in size to 6 students maximum due to COVID-19. If you would like to join this course, click the link at the bottom of this email to schedule a call with us so that we can give you all the details of the course.

<strong>Pricing</strong><br>
Our in-person IELTS group courses are €325 for a full 10-week course.

<strong>Online Courses</strong><br>
We also offer online IELTS courses via Zoom video. You will study with a small group of other students who are also preparing for their IELTS exam.

The course will meet once a week for 2 hours each lesson. The time and day of the course will be chosen once we know the schedules of each of the students.

<strong>Pricing</strong><br>
Our in-person IELTS group courses are €250 for a full 10-week course.

<strong>Private Lessons</strong><br>
Our private lessons for IELTS are the fastest way for you to improve your IELTS scores. These lessons are 1-to-1 with you and your teacher. You will cover all 4 sections of the exam just like in the group course, but the main difference is that you will receive much more speaking practice and individual feedback in private lessons. The price for IELTS private lessons is €60/hour, with a minimum of 12 hours total.

<strong>What the Courses Cover</strong><br>
Our IELTS group course covers all four sections of the exam. We teach you each section and which test-taking strategies you need to know to score the highest points possible
in each section. You will practice speaking each week, either with your classmates or with your teacher, as well as at least two hours of homework to practice the exam.

<strong>Next Steps</strong><br>
If you're interested in registering for our IELTS course, click the button below to schedule a phone call with us at a time of your convenience. The purpose of the call is to determine your speaking level and answer any questions you may have about the course.

Thank you for your interest in The Weaver School!<br>
The The Weaver School Team

@component('mail::button', ['url' => 'https://calendly.com/weaverenglish/meetings'])
Schedule a phone call
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
