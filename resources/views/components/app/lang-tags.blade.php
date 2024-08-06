@if(Route::is('blog*') || Route::is('flashcards*'))
    <link rel="canonical" href="{{ url()->current() }}" />
@else
    @foreach (config('app.available_locales') as $locale)
        <link rel="alternate" hreflang="{{ $locale }}" href="{{ $locale == session('locale') ? url()->current() : session('root') . '/' . $locale . '/' . ltrim(session('path'), '/') }}" />
    @endforeach
    <link rel="canonical" href="{{ $englishUrl ?? '' }}" />
@endif
