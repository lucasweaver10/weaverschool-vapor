<div class="mt-12 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
    <div class="grid grid-cols-1">
    @foreach($test->questions as $question)
        <div class="col-span-1 my-4">
            <div x-data="{ recording: false, recorded: false, playing: false, submitted: false, audio: new Audio('{{ asset( $question->audio_url ) }}') }" 
                    x-init="audio.addEventListener('ended', () => { playing = false })" 
                    class="max-w-md mx-auto my-8 ">
                  <!-- Prompt Player -->
                  <div class="flex items-center justify-between bg-gray-200 dark:bg-gray-700 shadow-lg  p-4 rounded-lg mb-8">
                      <div class="flex items-center">
                            @unless(!$question->audio_url)            
                            <div class="flex items-center">
                                <button x-on:click="playing ? audio.pause() : audio.play(); playing = !playing"                                        
                                        class="bg-teal-400 text-white text-center font-bold py-2 px-2 rounded-full">
                                <!-- Play button -->
                                <span x-show="!playing">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6 pl-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                    </svg>
                                </span>
                                <!-- Pause button -->
                                <span x-cloak x-show="playing">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
                                    </svg>
                                </span>
                                </button>
                            </div>
                            @endunless
                            <div class="ml-4 prose prose-lg dark:prose-invert">
                                {!! Str::of($question->text)->markdown() !!}
                            </div>                            
                      </div>                    
                      <div class="flex justify-end" x-cloak x-show="recorded">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                          </svg>
                      </div>
                  </div>
                  <livewire:audio-recorder :instructionText="'Record your answer'" :key="$question->id" :identifier="$question->id"/>      
              </div>            
        </div>
        @unless(!$question->image_url)
            <div class="col-span-1 my-4">
                <div class="rounded-lg">
                    <img src="{{ asset( $question->image_url ) }}" alt="{{ $question->test->exam }} Question Image" class="object-cover rounded-lg">
                </div>
            </div>
        @endunless
    @endforeach
        
    <div class="col-span-1 my-4">
        <div class="flex justify-center">
            <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-lg" wire:click="submitTest">Submit Test</button>
        </div>
    </div>
</div>