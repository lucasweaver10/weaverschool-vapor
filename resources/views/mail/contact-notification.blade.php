<!DOCTYPE html>
<body>

<p>New contact form submission: </p>

<p>First Name: {{ $data['name'] }}
<br>Email: {{ $data['email'] }}
<br>Message: {{ $data['message'] }}</p>

<p>{{ config('app.name') }}</p>

</body>
</html>
