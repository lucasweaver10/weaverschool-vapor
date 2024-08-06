<!DOCTYPE html>
<html>
<body>

<p>{{ $data['first-name'] }} {{ $data['last-name'] }} has requested to join the Elite Language Learning Mastermind Group waiting list.</p>

<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Location:</strong> {{ $data['location'] }}</p>
<p><strong>Native Language:</strong> {{ $data['native-language'] }}</p>
<p><strong>Target Language:</strong> {{ $data['target-language'] }}</p>
<p><strong>Motivation:</strong> {{ $data['motivation'] }}</p>

<br>
<p>Best regards,</p>
<p>{{ config('app.name') }}</p>

</body>
</html>
