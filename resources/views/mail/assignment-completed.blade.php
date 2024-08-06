@component('mail::message')
# Assignment completed #

Hi {{ $assignment->teacher->first_name }},

{{ $assignment->user->first_name . ' ' . $assignment->user->last_name }} has completed their {{ $assignment->title }} assignment.<br>

Log in to your teacher dashboard to grade it and give feedback.<br>


@component('mail::button', ['url' => 'www.weaverschool.com/en/myteacher'])
    Go to dashboard
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
