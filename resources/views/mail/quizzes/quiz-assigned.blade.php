@component('mail::message')
# New quiz assignment #

Hi {{ $quizAssignment->user->first_name }}, you have a new assignment.<br>

Name: {{ $quizAssignment->quiz->name }}<br>
Due date: {{ $dueDate }}

Log in to your dashboard to download attachments or mark the assignment as complete.<br>


@component('mail::button', ['url' => 'www.weaverschool.com/en/dashboard/quizzes'])
    Go to dashboard
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
