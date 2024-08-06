@component('mail::message')
Hi there,

{{ $user->first_name }} {{ $user->last_name }} has invited you to join the {{ $user->company->name }} team at The Weaver School.

Click on the button below to create your account. Make sure you use the same email where you received this invitation.

@component('mail::button', ['url' => 'https://www.weaverschool.com/companies/members/invitations/accept/' .  $invitation->token ])
Create account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
