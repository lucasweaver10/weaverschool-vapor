<x-layouts.app>
    <x-slot name="title">
        Corrected Essay | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Corrected Essay
        </x-slot>
        <div class="max-w-xl mx-auto mt-6 pb-1 bg-white shadow-lg rounded-lg overflow-visible">
            <div class="p-6">
                <div class="mt-8">
                    <h3 class="text-3xl font-bold mb-2">Corrected Version:</h3>
                    <div class="text-gray-600 text-xl prose prose-xl">{!! Str::of($correction->content)->markdown() !!}</div> <!-- Assuming feedback is safe to render as HTML -->
                </div>
            </div>
        </div>
        <div class="flex my-10">
            <div class="mx-auto space-x-8">
                <a class="text-teal-700 hover:text-teal-500 font-bold mx-auto" href="/{{ session('locale') }}/dashboard/essays/corrections">Back to all corrections</a>
                <a href="/{{ session('locale') }}/dashboard/essays/create" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-4 mr-12">
                    Submit new essay
                </a>
            </div>
        </div>
    </x-dashboard.index>

</x-layouts.app>
