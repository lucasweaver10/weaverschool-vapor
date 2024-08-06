<!DOCTYPE html>
<body>

<p>New user signup! </p>

<br>Email: {{ $user->email }}
<br>First Page: {{ $user->userTrackingData->first_page_visited ?? '' }}
<br>Converting Page: {{ $user->userTrackingData->converting_page_url ?? '' }}


<p>{{ config('app.name') }}</p>

</body>
</html>
