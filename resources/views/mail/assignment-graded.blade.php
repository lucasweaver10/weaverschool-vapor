@component('mail::message')
# Assignment graded #

Hi {{ $assignment->user->first_name }}, your assignment has been graded.<br>

<strong>Title:</strong> {{ $assignment->title }}<br>
<strong>Grade:</strong> {{ $assignment->score }}<br>
<strong>Feedback:</strong> {{ $assignment->feedback }}

Log in to your dashboard to see if there are any graded homeworks.<br>


@component('mail::button', ['url' => 'www.weaverschool.com/en/dashboard'])
    View dashboard
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
