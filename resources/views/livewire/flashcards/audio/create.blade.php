<div x-data="{ openPopup: @entangle('openPopup') }">
    <button @click="openPopup = true" class="text-right flex mr-2 text-teal-700 hover:text-teal-900" title="Click to create audio with AI.">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
        </svg>                    
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3 mb-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
        </svg>                                
    </button>
    <div x-cloak x-show="openPopup" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-teal-800 bg-opacity-90 flex items-center justify-center z-50">
        <div class="bg-white max-w-lg mx-auto p-8 rounded-lg shadow-lg text-center">
            <h2 class="text-2xl font-bold mb-4">Choose a Voice</h2>
            <form>
                <div class="mb-4">
                    <select wire:model.change="voiceId" class="form-select block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50">
                        @foreach($this->syntheticVoices as $voice)
                            <option value="{{ $voice->id }}">{{ $voice->language }} - {{ $voice->ssml_gender }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center mt-6">
                    <button type="button" wire:click="createAiFlashcardAudio" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create Audio
                    </button>
                </div>
            </form>
            <div class="mt-4">
                <button @click="openPopup = false" class="text-gray-500 hover:text-gray-700">Cancel</button>
            </div>
        </div>
    </div>
</div>
