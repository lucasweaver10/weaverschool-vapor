<x-layouts.app>
    <x-slot name="title">
        Quick Notes
    </x-slot>
    <x-slot name="description">
        The Weaver School provides premium online language lessons to students across the world.
    </x-slot>
    <x-layouts.dashboard.show>
        <div class="min-h-screen bg-gray-900 py-8" x-data="{ activeNote: {{ $quickNotes->first()->id }} }">
            <div class="max-w-4xl mx-auto px-4">
                <div class="flex justify-between align-middle mb-8 sm:mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-100">Quick Notes</h2>
                    <span class="flex">
                        <span class="inline-flex bg-violet-600 text-white font-bold px-3 py-1 mr-2 rounded-md shadow-lg hover:bg-violet-700 transition duration-300 ease-in-out">
                            <a href="/quick-notes/new" class="">
                                Add
                            </a>
                        </span>
                        <a href="/flashcards/sets/{{ $flashcardSetId }}" class="bg-teal-400 text-white font-bold px-3 py-1 rounded-md shadow-lg hover:bg-teal-500 transition duration-300 ease-in-out">Study</a>
                    </span>
                </div>
                @if($quickNotes->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">                    
                    @foreach($quickNotes as $quickNote)
                        <div @click="activeNote = {{ $quickNote->id }}" :class="{'bg-zinc-600 border-2 border-teal-300 shadow-2xl scale-105': activeNote === {{ $quickNote->id }}}" class="bg-zinc-800 rounded-lg overflow-hidden shadow-lg transform transition-transform duration-300 ease-in-out cursor-pointer">
                            <div class="p-6 border-l-4 border-teal-400">
                                <p class="text-white text-xl">
                                    {{ $quickNote->text }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                    @foreach($quickNotes as $quickNote)
                        <div x-cloak x-show="activeNote === {{ $quickNote->id }}" class="mt-6 p-6 bg-teal-900 rounded-md shadow-xl border border-teal-400">                    
                            <div class="text-white text-xl">{!! $quickNote->explanation->text ?? 'No explanation for this quick note' !!}</div>
                        </div>
                    @endforeach 
                @endif        
            </div>
        </div>


    </x-layouts.dashboard.show>
</x-layouts.app>