<div class="mt-8 flow-root">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Example</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Vocabulary Word</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Grammar Topic</th>            
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Attach</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @if($lesson->writtenExamples)
                @foreach($lesson->writtenExamples as $example)
                    <tr>
                        <td class="whitespace-nowrap truncate py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $example->example }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">@foreach($example->vocabularyWords as $word){{ $word->word ?? '' }},@endforeach</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">@foreach($example->grammarTopics as $topic){{ $topic->title ?? '' }},@endforeach</td>
                        {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $example->speakingTopic->title ?? '' }}</td> --}}
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a> --}}
                        </td>
                    </tr>
                @endforeach
            @endif

              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="text-right mt-3">
      <div x-show="editMode === false">
        <livewire:admin.lessons.written-examples.create :lesson="$lesson" class="mb-4" />
      </div>
        {{-- <x-forms.edit-button alpineFunction="editMode=true" text="Edit" />
        <x-forms.submit-button livewireFunction="storeWrittenExamples" text="Add" /> --}}
        <svg wire:loading="storeWrittenExamples"  wire:loading.class="animate-spin" class="mr-3 fill-current" width="24" height="24" viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"><path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" opacity=".25"/>
          <path d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z">
          <animateTransform attributeName="transform" type="rotate" dur="0.75s" values="0 12 12;360 12 12" repeatCount="indefinite"/></path></svg>
    </div>
    <x-alerts.success />
</div>