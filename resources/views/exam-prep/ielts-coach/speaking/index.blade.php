<x-layouts.app>
    <x-slot name="title">
        IELTS Speaking Practice Tests | {{ config('app.name') }}
    </x-slot> 
    <x-layouts.guest>      
                       
    <div class="bg-gray-900 min-h-screen flex flex-col items-center px-4 py-10">        
        <div class="flex flex-wrap justify-center mx-auto max-w-6xl">
            @foreach($tests as $test)
                <div class="bg-gray-800 hover:bg-gray-700 rounded-lg overflow-hidden shadow-lg my-4 w-full sm:w-80 md:w-96 mx-2 transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="flex flex-col">
                        <div class="p-5 flex flex-col justify-between">
                            <h2 class="text-2xl font-bold text-teal-400 mb-4">{{ $test->title }}</h2>
                            <p class="text-gray-200 mb-6">{{ $test->description }}</p>
                            <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.submit', ['locale' => session('locale', 'en'), 'id' => $test->id]) }}" class="px-4 py-2 mt-4 mx-auto bg-teal-500 text-white font-semibold rounded-lg hover:bg-teal-600 transition ease-in-out duration-150">Take Test</a>
                        </div>
                    </div>
                    @unless(!$test->questions->first()->audio_url)
                    <div class="mx-auto mt-4 w-full rounded-lg text-violet-400 p-2 text-xs text-center font-bold">PREVIEW</div>
                    <div class="max-w-lg mx-auto px-4 rounded-lg">
                        <div class="flex justify-between items-center mb-8">                            
                            <div x-data="{ playing: false, submitted: false, audio: new Audio('{{ asset( $test->questions->first()->audio_url ) }}') }" 
                                x-init="audio.addEventListener('ended', () => { playing = false })" 
                                class="flex max-w-md mx-auto my-2 ">                                                      
                                    <button x-on:click="playing ? audio.pause() : audio.play(); playing = !playing"                                        
                                            class="flex mr-4 items-center justify-center bg-teal-500 hover:bg-teal-600 text-white p-2 rounded-full transition duration-150 ease-in-out">
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
                                <div class="text-gray-100 mt-1">
                                    {!! Str::of($test->questions->first()->text)->markdown() !!}
                                </div>       
                            </div> 
                        </div>
                    </div>                   
                    @endunless
                </div>
            @endforeach
        </div>
    </div>
    
    <x-alerts.success />
    <x-alerts.error />

    </x-layouts.guest>
</x-layouts.app>
