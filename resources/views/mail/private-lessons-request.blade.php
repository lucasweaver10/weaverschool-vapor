<!DOCTYPE html>
<html>
<body>

<p>Someone has requested private lessons </p>

<br>Email: {{ $data['email'] }}
<br>First name: {{ $data['first_name'] }}
<br>Last name: {{ $data['last_name'] }}
<br>Message: {{ $data['message'] }}
<br>Page submitted: {{ $data['url'] }}


<p>{{ config('app.name') }}</p>

</body>
</html>
