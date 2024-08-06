<div x-data="{ visibleQuestion: @entangle('visibleQuestion').live, totalQuestions: @entangle('totalQuestions').live, answerChoiceValue: ''}"
     class="bg-white flex min-h-screen">
    <div class="relative flex flex-col w-full">
        <div x-show="visibleQuestion === 0" class="w-full bg-white rounded-lg p-4 mt-3 mb-3">

            <button @click="visibleQuestion++" class="text-white text-md bg-blue-400 hover:bg-blue-500 focus:outline-none
            py-2 px-4 rounded-lg my-2 w-full mx-auto shadow-md">Start Quiz</button>
        </div>

        <div wire:loading wire:target="processAnswerChoice, processTextAnswerChoice" class="w-full bg-white rounded-lg
        p-4 mt-3 mb-3">

            <div>
                <img src="/images/loading.gif" class="w-24 h-24 mt-5 ml-5 mb-5">
            </div>
        </div>

            @foreach($quiz->questions as $question)
                <div x-cloak x-show="visibleQuestion === {{ $loop->index + 1 }}" wire:target="processAnswerChoice,
                processTextAnswerChoice" class="bg-white w-full rounded-lg p-5 mt-3 mb-3">
                    <div class="text-xl">
                        {{ $loop->index + 1 }}. {{ $question->text }}
                    </div>
                    <div>
                        <div class="space-y-4 mt-4">
                            @if($question->type === 'radio')
                                @foreach($question->answers as $answerChoice)
                                    <div class="flex items-center">
                                        <input id="answer{{ $loop->parent->index + 1 }}" wire:model.live="answerChoiceId"
                                               type="radio" value="{{ $answerChoice->id }}" class="focus:ring-blue-500
                                               h-4 w-4 border-gray-300">
                                        <label for="answer{{ $loop->parent->index + 1 }}" class="ml-3 block text-xl font-medium text-gray-700">
                                            {{ $answerChoice->text }} </label>
                                    </div>
                                @endforeach
                                    <button type="button" class="text-white text-md bg-blue-400 hover:bg-blue-500
                                    focus:outline-none py-2 px-4 rounded-lg mt-4 w-full shadow-md" wire:click="processAnswerChoice">Next</button>
                            @elseif($question->type === 'text')
                                <div>
                                    @foreach($question->answers as $answerChoice)
                                        <label for="email" class="sr-only">Answer</label>
                                        <input type="text" id="answer{{ $loop->index + 1 }}" wire:model.live="userAnswerText"
                                               class="shadow-sm focus:ring-indigo-500 focus:border-blue-500 block sm:text-sm
                                               border-gray-300 rounded-md">
                                        <button class="text-white text-md bg-blue-400 hover:bg-blue-500 focus:outline-none
                                        py-2 px-4 rounded-lg mt-5 w-full shadow-md" wire:click="processTextAnswerChoice({{ $answerChoice->id }})">
                                            Next</button>
                                    @endforeach
                                </div>
                            @endif
                                @error('answerChoiceId') <span class="error">{{ $message }}</span> @enderror
                                @error('userAnswerText') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>
            @endforeach

        <script>
            window.addEventListener('answered-correctly', event => {
                new Audio("/sounds/correct.wav").play();
            });
            window.addEventListener('answered-incorrectly', event => {
                new Audio("/sounds/incorrect.wav").play();
            });
            window.addEventListener('bonus', event => {
                function bonus() {

                }
            });
        </script>

{{--        <audio x-ref="ouch">--}}
{{--            <source src="/sounds/correct.wav" type="audio/mpeg" />--}}
{{--        </audio>--}}

            <div x-cloak x-show="visibleQuestion === {{ $totalQuestions + 1 }}" class="w-full bg-white rounded-lg p-4 mt-3 mb-3">
                <h3>Quiz complete</h3>
                <p>Click the button below to submit your answers.</p>
                <button wire:click="submitQuiz" class="text-white text-md bg-blue-400 hover:bg-blue-500 focus:outline-none py-2 px-4 rounded-lg">Submit Quiz</button>
            </div>

        <x-alerts.bonus></x-alerts.bonus>
        <x-alerts.answered-correctly></x-alerts.answered-correctly>
        <x-alerts.answered-incorrectly></x-alerts.answered-incorrectly>
        <x-alerts.success></x-alerts.success>
    </div>
</div>
