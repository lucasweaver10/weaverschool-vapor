@component('mail::message')
Hey there, welcome to the Weaver School!

I've created a few tools here that you can use to get the passing score you need on your IELTS exam.

First, there's the [IELTS Essay Grader tool](https://weaverschool.com/{{ session('locale') ?? 'en' }}/dashboard/exam-prep/ielts/writing/submit) that you can use to get feedback and corrections on your essays.

You can use the tool 2 times for free until you need to upgrade to paid account. This is to help me cover the costs of using the AI.

Your [3 paid options](https://weaverschool.com/{{ session('locale') ?? 'en' }}/exam-prep/ielts-coach) are: Weaver School Basic (10 essays per month), Weaver School Pro (20 essays per month and 5 speaking tests), and Weaver School Premium (50 essays and 10 speaking tests).

Second, I've created 20 sets of flashcards using the IELTS Academic Word List: a list of 567 Academic English words that are commonly found on all sections of the IELTS exam.

Learning these words will help you get a higher score on your exam. You can access the flashcards [here](https://weaverschool.com/en/flashcards/sets/explore).

You can try the flashcards tool for free for 7 days after creating your account. After that you'll need a <em>Weaver School Pro</em> account to keep using it. 


Lastly, I also have a video course called ["Master IELTS Writing"](https://weaverschool.com/{{ session('locale') ?? 'en' }}/english/courses/online/ielts-writing), where I cover how to get the highest score possible on Task 1 and Task 2 of the IELTS Writing exam.

It's normally $29 by itself, but you can also get access to the course for free included in your <em>Weaver School Pro</em> account for just $8.99/mo.


I hope you find these tools helpful. If you have any questions, feel free to reply to this email and I'll get back to you as soon as I can.

<br>
Take care and talk soon,<br>
Lucas Weaver

<br>
<img src="{{ asset('https://we-public.s3.eu-north-1.amazonaws.com/images/teachers/lucas+weaver+english+teacher+weaver+school.png') }}" style="height: 100px; width: 100px; border-radius: 50%; margin-top: 20px; margin-bottom: 20px; margin-left: 40%; margin-right: 45%;" alt="lucas weaver">

<br>
<div align="center">Lucas Weaver</div>
<div align="center">Founder, the Weaver School<br></div>

@component('mail::button', ['url' => 'https://weaverschool.com/login'])
Log in
@endcomponent

{{-- <br>
{{ config('app.name') }} --}}
@endcomponent
