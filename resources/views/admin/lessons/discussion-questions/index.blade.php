<x-layouts.app>
<x-alerts.success />
    <div x-data="{editMode: false}" class="p-20">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="title">
                        Discussion Questions
                    </label>
                    <div x-show="editMode === false">
                        <!-- Livewire component for creating discussion questions -->
                        <livewire:admin.lessons.discussion-questions.index :lesson="$lesson" class="mb-4"/>
                    </div>
                    <div x-show="editMode === true">
                        <div class="mt-8 flow-root">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Question</th>
                                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Vocabulary Word</th>
                                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Grammar Topic</th>
                                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Speaking Topic</th>                                          
                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Attach</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                            @if($lesson->discussionQuestions)
                                                @foreach($lesson->discussionQuestions as $question)                                                
                                                    <livewire:admin.lessons.discussion-questions.edit :lesson="$lesson" :question="$question" wire:key="{{ $index }}"/>                                            
                                                @endforeach                                                
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>            

                        <button @click.prevent="editMode = false" class="inline-flex justify-center py-2 px-4 ml-2 mt-4 border border-transparent
                        shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-red-500">
                            Stop Editing
                        </button>
                    </div>
                </div>
    </div>
</x-layouts.app>