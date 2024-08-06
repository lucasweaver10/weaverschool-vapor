@component('mail::message')
# Assignment grade updated #

Hi {{ $assignment->user->first_name }}, the grade for your assignment has been updated.<br>

<strong>Title:</strong> {{ $assignment->title }}<br>
<strong>Grade:</strong> {{ $assignment->score }}<br>
<strong>Feedback:</strong> {{ $assignment->feedback }}

Log in to your dashboard to download any graded homeworks there might be.<br>


@component('mail::button', ['url' => 'www.weaverschool.com/en/dashboard'])
    View dashboard
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
