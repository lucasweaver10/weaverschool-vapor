@component('mail::message')
# Flashcard Review Reminder

Hi {{ $user->first_name ?? 'there' }},

Here are your flashcards due for review today:

@foreach ($flashcards as $flashcard)
    - {{ $flashcard->flashcard->term }} (Review Date: {{ $flashcard->next_review_date }})
@endforeach
<!-- Add the config app url variable below -->
@component('mail::button', ['url' => config('app.url') . '/flashcards/sets/' . $flashcard->flashcard_set_id . '/study'])
    Review Now
@endcomponent

Happy studying,<br>
{{ config('app.name') }}
@endcomponent
