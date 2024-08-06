<div class="px-4 py-3 mb-5 bg-white sm:rounded-lg shadow overflow-hidden" x-data="{ completed: @entangle('completed').live }">
    <div class="mt-2 mb-4">
      <h3 class="mb-2">{{ $assignment->title }}</h3>
      <p>{{ $assignment->content }}</p>
      <p class="text-muted text-sm">{{ $assignment->registration->user_name }}</p>
    </div>
    <div class="border-t border-gray-200">
      <p class="small mt-3 mb-5">Assigned {{ $assignment->created_at->diffForHumans() }} @if($assignment->completed) | Status: Complete @else | Due {{ $assignment->due_date }}@endif</p>
    </div>
    <dl>
        @if (count($assignment->attachments) != 0)
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="">
                Attachments
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                        @foreach ($assignment->attachments as $attachment)
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: solid/paper-clip -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 flex-1 w-0 truncate">
                                    {{ $attachment->filename }}
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a target="blank" href="/api/attachments/{{$attachment->filename}}"" class="text-blue-400 hover:text-blue-500">
                                Download
                                </a>
                            </div>
                            </li>
                        @endforeach
                    </ul>
                </dd>
            </div>
        @endif

        @if ($assignment->status === 'completed')
            @if($assignment->completedHomeworks)
                <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="">
                    Completed Homework
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                        @foreach ($assignment->completedHomeworks as $homework)
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: solid/paper-clip -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                        {{ $homework->filename }}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a target="blank" href="/api/homework/{{$homework->filename}}" class="text-blue-400 hover:text-blue-500">
                                    Download
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    </dd>
                </div>
            @endif
        @endif

        @if ($assignment->status !== 'open')
        <div wire:poll.visible class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="">
            Score and Feedback
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            @if ($assignment->score == null)

                <label for="company-website" class="block text-sm font-medium text-gray-700">
                    Score
                </label>
                <div class="mt-1 mb-4 flex rounded-md shadow-sm">
                <input type="text" wire:model.live="score" id="score" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-lg sm:text-sm border-gray-300" />
                </div>
                <label for="company-website" class="block text-sm font-medium text-gray-700">
                    Feedback
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <textarea id="feedback" wire:model.live="feedback" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="" ></textarea>
                </div>
                <button wire:click="save" class="btn btn-primary float-right mt-3">Save</button>
            </dd>
            @else
                <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <p>Score: {{ $assignment->score }}</p>
                        </div>
                    </li>
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <p>Feedback: {{ $assignment->feedback }}</p>
                        </div>
                    </li>
                </ul>
            @endif
            </dd>

        </div>
        @endif
        <x-alerts.success>
        </x-alerts.success>
    </dl>
</div>
