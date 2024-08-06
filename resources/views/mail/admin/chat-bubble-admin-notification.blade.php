<x-mail::message>
# New User Message via Chat Bubble

UserId: {{ $user->id }}  

Email: {{ $user->email }}  

Subject: {{ $subject }}  

Message: {{ $message }}  


{{ config('app.name') }}
</x-mail::message>
