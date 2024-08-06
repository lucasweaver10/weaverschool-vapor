<div>
    <p class="mt-2 mb-4 text-lg text-gray-900">For example: {!! $this->example !!}
        <audio id="exampleAudio{{ $this->exampleIndex }}" src="{{ Storage::url($this->exampleAudioSrc) }}" preload="none"></audio>
        <span>
            <button onclick="document.getElementById('exampleAudio{{ $this->exampleIndex }}').play()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463
                    8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0
                    01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25
                    12c0-.83.112-1.633.322-2.396C2.806
                    8.756 3.63 8.25 4.51 8.25H6.75z" />
                </svg>
            </button>
        </span>
    </p>
    <button wire:click="getNewExample" wire:loading.attr="disabled" class="mt-8 inline-block px-4 py-2 bg-blue-400 text-white font-base rounded-full
        hover:bg-blue-500" aria-label="Get started with the Starter plan for $9">
        <span wire:loading wire:target="getNewExample" class="mr-2">
            <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
        </span>
        <span wire:loading.remove>
            Get another example
        </span>
    </button>
</div>
