<div>
<form
    x-data="{
        step: @entangle('step').live,
        selectedAnswer: @entangle('selectedAnswer').live,
        answerChoices: @entangle('answerChoices').live,
        nextStep() {
            step: this.step++;
        },
        previousStep() {
            step: this.step--;
        }
     }"
     wire:submit="submitForm" onkeydown="return event.key != 'Enter';"
>
    <div x-show="step === -1" class="px-5 text-center">
        <h2>{{ $levelTest->name }}</h2>
    </div>

            <div class="my-5 mx-5" style="max-width: 100%;" x-show="step === -1">

                {{-- <div class="">
                    <h5 class="text-center mt-1 mb-4">Level Test</h5>
                </div> --}}

                <div class="card-body">
                    <div class="welcome-text text-center">
                        <h4 class="text-center">{{ $levelTest->description }}</h4>
                        <p>Your results will be emailed to you at the address you provide.</p>
                        <button type="button" class="btn btn-primary btn-lg text-center mt-3" x-on:click="nextStep" x-on:keydown.enter="nextStep">Start Test</button>
                    </div>
                </div>

            </div>

            @foreach ($levelTest->questions as $question)

            <div class="mt-2 mb-5 mx-0 px-5" style="display: none; height: 22rem;" x-show="step === {{ $loop->index}}">

            <div class="mb-5 mb-md-0 mx-0 no-gutters" style="height: 17rem;">
                <div class="pt-5" x-show="step === {{ $loop->index}}" x-cloak>
                    <h4 class="mb-4">{{$question->number}}. {{$question->text}}</h4>
                        @foreach ($question->answers as $answer)
                            @if ($question->type === 'text')
                                <div class="form-group form-check">
                                    <input autofocus class="form-check-input mb-4 py-1 px-1" type="{{ $question->type }}" id="selectedAnswer" wire:model="selectedAnswer" wire:keydown.enter="addAnswerChoice( {{ $question }} )" x-on:keydown.enter="nextStep">
                                </div>
                            @else
                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="{{ $question->type }}" id="selectedAnswer" wire:model.live="selectedAnswer" value={{$answer->id}}
                                    wire:keydown.enter="addAnswerChoice( {{ $question }}, {{ $answer }} )" x-on:keydown.enter="nextStep"> {{$answer->text}}
                                </div>
                            @endif
                        @endforeach
                </div>
            </div>

            <div class="row no-gutters mt-5 mx-0 px-0">
                <div class="col-6">
                    <button x-show="step !== {{ ($levelTest->questions->count()) }}" type="button" class="btn btn-lg btn-primary mr-5" x-on:click="nextStep" wire:click="addAnswerChoice( {{ $question }} )" wire:keydown.enter="addAnswerChoice( {{ $question }} )" x-on:keydown.arrow-right="nextStep">
                        Continue
                        </button>
                </div>
                <div class="col-6">
                    <div class="float-right">
                    {{-- <span class=""> --}}
                        <button class="btn btn-lg btn-light" type="button" x-on:click="previousStep"><
                        </button>
                    {{-- </span> --}}
                    {{-- <span class=""> --}}
                        <button class="btn btn-lg btn-light" type="button" x-on:click="nextStep">></button>
                    {{-- </span> --}}
                    </div>
                </div>
            </div>

            </div>
            @endforeach
            {{-- </div> --}}

            <div class="card my-5" style="display: none; max-width: 100%;"  x-show="step === {{ count($levelTest->questions) }}">
                <div class="card-header">
                    <h5 class="text-center mb-0 mt-1">Level Test</h5>
                </div>
                <div class="card-body">
                    <div class="welcome-text text-center">
                        <h4 class="text-center">Test completed. Please click the button below to submit your answers.
                        </h4>
                        <button x-show="step === {{ count($levelTest->questions) }}" class="btn btn-primary btn-lg ml-md-3 my-3 mt-md-4" type="submit" wire:keydown.enter="submitForm">Submit Test</button>
                    </div>
                </div>
            </div>

            <div class="card my-5" style="display: none; max-width: 100%;" x-show="step === 'submitted'">
                <div class="card-header">
                    <h5 class="text-center mb-0 mt-1">Level Test</h5>
                </div>
                <div class="card-body">
                    <div class="welcome-text text-center">
                        <h4 class="text-center">Complete! Your score was: {{ $score }}/{{ $maxPoints }}
                        </h4>
                        <p>Check your email for your level and full results.</p>
                        <a href="/dashboard" type="button" class="button btn btn-primary btn-lg text-center mt-2" >View Dashboard</a>
                    </div>
                </div>
            </div>

            <div class="progress-bar text-center" style="display: none;">
                <span class="" x-show="step !== -1 & step !== 'submitted' ">
                    <div class="progress">
                        <div class="progress-bar bg-primary" style="width: {{ $progress }}%;" role="progressbar" aria-valuenow="{{ count($answerChoices) }}" aria-valuemin="0" aria-valuemax="{{ count($levelTest->questions) }}"></div>
                      </div>
                </span>
            </div>
        </div>



</form>
</div>
