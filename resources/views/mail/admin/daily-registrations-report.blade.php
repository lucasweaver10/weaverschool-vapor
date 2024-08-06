@component('mail::message')
# Daily Registrations Report

Here are the {{ $userCount) }} new registrations from yesterday:


@foreach ($categorizedUsers as $category => $users)
    @if ($users->count() > 0)
### {{ ucfirst($category) }} Registrations
@foreach ($users as $user)
- Name: {{ $user->name }}, Email: {{ $user->email }},
  Converting Page: {{ $user->userTrackingData->converting_page_url ?? 'N/A' }},
  First Page Visited: {{ $user->userTrackingData->first_page_visited ?? 'N/A' }}
@endforeach
    @endif
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
