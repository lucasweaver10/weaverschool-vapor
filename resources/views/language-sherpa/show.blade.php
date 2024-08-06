<x-layouts.app title="Online English courses | The Weaver School">
    <x-slot name="title">
        Learn new vocabulary with your Language Sherpa from the Weaver School
    </x-slot>
    <x-slot name="description">
        Learn new vocabulary with your Language Sherpa
    </x-slot>
    <script src="https://cdn.tailwindcss.com"></script>
<main>
    <!-- Pricing block -->
    <section id="pricing" aria-label="Pricing" class="bg-black py-20 sm:py-32">
        <div class="md:text-center">
            <h2 class="font-display text-3xl tracking-tight text-white sm:text-5xl">
           Hi there! I'm your Language Sherpa. Let's learn some words.
            </h2>
            <p class="mt-4 text-xl text-white mx-auto">
            </p>
        </div>
        <div class="-mx-4 mt-16 grid max-w-2xl grid-cols-1 gap-y-10 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-3
        xl:mx-0 xl:gap-x-8">
            @foreach($messages as $message)
                <section class="md:col-span-1 rounded-3xl px-6 sm:px-8 bg-white py-8 lg:order-none">
                    <h3 class="mt-2 font-display text-2xl text-gray-900">{!! $message['word'] !!}
                        <audio id="wordAudio{{ $loop->index }}" src="{{ Storage::url($message['word_audio']) }}" preload="none"></audio>
                        <span>
                            <button onclick="document.getElementById('wordAudio{{ $loop->index }}').play()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463
                                    8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0
                                    01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806
                                    8.756 3.63 8.25 4.51 8.25H6.75z" />
                                </svg>
                            </button>
                        </span>
                    </h3>
                    <p class="mt-2 mb-4 text-lg text-gray-900">   {!! $message['explanation'] !!}</p>
                    <livewire:language-sherpa.word-examples.show :wire:key="$loop->index" word="{{ $message['word'] }}" topic="{{ $topic }}"
                         example="{{ $message['example'] }}" exampleIndex="{{ $loop->index }}"
                         exampleAudioSrc="{{ $message['example_audio'] }}" />
                    <a href="/register" class="mt-8 inline-block px-4 py-2 bg-blue-400 text-white font-base rounded-full
                    hover:bg-blue-500" aria-label="Get started with the Starter plan for $9">Mark as learned</a>
                </section>
            @endforeach
            <!-- Additional plan sections go here -->
        </div>
    </section>
    <!-- End pricing block -->

    <!-- Call to action -->
    <section id="get-started-today" class="relative overflow-hidden bg-blue-400 py-32">
        <img class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" src="path_to_background_image.jpg" alt="" width="2347" height="1244" />
        <div class="relative">
            <div class="mx-auto max-w-lg text-center">
                <h2 class="font-display text-4xl tracking-tight text-white sm:text-4xl">Ready to test yourself?!</h2>
                <p class="mt-4 text-2xl tracking-tight text-white">Once you've learned all 3 words, click the button below to test your knowledge.</p>
                <a href="{{ route('language-sherpa.test', ['words' => json_encode($words), 'language' => $language, 'topic' => $topic])}}" class="inline-block px-8 py-4 mt-10 text-gray-900 font-semibold bg-white rounded-full hover:bg-blue-700">Test my knowledge now</a>
            </div>
        </div>
    </section>
<!-- End call to action -->

</main>
</x-layouts.app>
