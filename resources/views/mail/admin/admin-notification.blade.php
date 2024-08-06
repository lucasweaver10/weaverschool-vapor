@component('mail::message')
# Hello {{ config('app.name') }} Admin

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent