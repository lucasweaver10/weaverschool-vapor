<x-layouts.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
  Vocabulary Practice
</x-slot>
<x-slot name="content">
<div x-data="{showAnswers: false}">
    <div class="mb-12">
        <div class="text-sm text-gray-900 font-semibold mb-5">Word:</div>
        <div class="text-xl"><strong>{{ $word->word }}:</strong> {{ $word->example }}</div>
    </div>
    <div class="mb-12">
        <div class="text-sm text-gray-900 font-semibold mb-5">Here's an explanation and examples:</div>
        <div class="text-xl">
            @foreach($explanation as $text)
                {!! $text !!}
            @endforeach
        </div>
    </div>
    <div class="mt-5">
        <div class="text-lg">Write your own sentence with the word to test your mastery of its meaning and get instant
            feedback on how well you used it.</div>
        <livewire:dashboard.vocabulary-practice.sentence-analyzer :word="$word" />
    </div>
    <div class="mt-5">
        @foreach($exercise as $text)
            {!! $text !!}
        @endforeach
    </div>
</div>
</x-slot>
</x-layouts.lessons>
