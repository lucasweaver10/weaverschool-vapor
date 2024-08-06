@component('mail::message')
# New assignment #

Hi {{ $assignment->user->first_name }}, you have a new assignment.<br>

Title: {{ $assignment->title }}<br>
Content: {!! $assignment->content !!}<br>
Due date: {{ $dueDate }}

Log in to your dashboard to download attachments or mark the assignment as complete.<br>


@component('mail::button', ['url' => 'www.weaverschool.com/en/dashboard'])
    View dashboard
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
