<div  x-data="{ editMode: @entangle('editMode').live }">
    <div class="px-4 py-3 mb-5 bg-white sm:rounded-lg shadow overflow-hidden">
        <div x-show="editMode === false" class="mt-2 mb-4">
          <h3 class="mb-2">{{ $assignment->title }}</h3>
          <p>{!! $assignment->content !!}</p>
          <p class="text-muted text-sm">{{ $assignment->registration->user->first_name }} {{ $assignment->registration->user->last_name }}</p>
        </div>
        <div x-show="editMode === true">
            <label for="assignment_title" class="form-label">Title:</label>
            <input class="form-control mb-2" id="assignment_title" wire:model.live="title"
                   type="text" style="width: 20rem;" value="{{ $assignment->title }}">
            <label for="assignment_content" class="form-label">Content:</label>
            <p class="text-xs">You can use <a href="https://www.w3schools.com/html/html_formatting.asp" target="blank">html</a> to add special formatting to your content.</p>
            <textarea rows="4" wire:model="content" id="content" class="mb-2 shadow-sm focus:ring-indigo-500 focus:border-blue-400 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
{{--            <livewire:trix :value="$content"/>--}}
{{--            <livewire:easy-mde :value="$content" />--}}
            <label for="due_date" class="form-label">Due Date:</label>
            <input wire:model.blur="selectedDate" x-data x-ref="input"
                   x-init="
                       picker = new Pikaday({ field: $refs.input, format: 'D/M/YYYY', toString(date, format)
                          {
                          // you should do formatting based on the passed format,
                          // but we will just return 'D/M/YYYY' for simplicity
                          const day = date.getDate();
                          const month = date.getMonth() + 1;
                          const year = date.getFullYear();
                          return `${year}-${month}-${day}`;
                          }
                      })
                      picker.setDate('{{$dueDate}}');
                   "
                   class="form-control mb-2" type="text" id="datepicker" style="width: 20rem;" autocomplete="off">
            <script src="pikaday.js"></script>
            <label for="file" class="form-label mt-3">Add attachments:</label>
            <div class="input-group mt-1 mb-3">
                <input type="file" wire:model.live="attachments">
                <div wire:loading wire:target="attachments">Working...</div>
            </div>
        </div>
        <div x-show="editMode === false" class="border-t border-gray-200">
          <p class="small mt-3">Assigned {{ $assignment->created_at->diffForHumans() }} @if($assignment->completed) | Status: Complete @else | Due {{ $assignment->due_date }}@endif</p>
        </div>
        <dl>
            @if (count($assignment->attachments) != 0)
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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
                                    <a target="blank" href="/api/attachments/{{$attachment->filename}}" class="text-blue-400 hover:text-blue-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
            @endif
            @if($assignment->status === 'open')
                <button x-show="editMode === false" wire:click="edit" class="btn btn-primary float-right mt-3">Edit</button>
                <button x-show="editMode === true" @click="editMode = !editMode" class="btn btn-danger float-left mt-3">Cancel</button>
                <button x-show="editMode === true" wire:click="update" class="btn btn-primary float-right mt-3">Save</button>
            @endif


            @if ($assignment->status === 'completed')
                @if(count($assignment->completedHomeworks) != 0)
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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

            @if(count($assignment->gradedHomeworks) > 0)
                <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="">
                    Graded Homework
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                        @foreach ($assignment->gradedHomeworks as $gradedHomework)
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: solid/paper-clip -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                        {{ $gradedHomework->filename }}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a target="blank" href="/api/graded-homework/{{$gradedHomework->filename}}" class="text-blue-400 hover:text-blue-500">
                                    Download
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    </dd>
                </div>
            @endif

            @unless($assignment->status === 'open')
                <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="mb-3">
                        Upload Graded Homework
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:graded-homework-uploader :assignmentId="$assignment->id" />
                    </dd>
                </div>
            @endunless

            @if ($assignment->status !== 'open')
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="">
                Score and Feedback
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if ($assignment->score == null)
                    <livewire:myteacher.courses.assignments.scores.create :assignmentId="$assignment->id" />
                </dd>
                @else
                    <div>
                        <div x-show="editMode === false">
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
                            <button wire:click="edit" class="btn btn-primary float-right mt-3">Edit</button>
                        </div>
                        <div x-show="editMode === true">
                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                                Score
                            </label>
                            <div class="mt-1 mb-4 flex rounded-md shadow-sm">
                                <input type="text" wire:model.live="score" id="score" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                    block w-full rounded-lg sm:text-sm border-gray-300" placeholder="{{ $assignment->score }}"></input>
                            </div>
                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                                Feedback
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <textarea id="feedback" wire:model.live="feedback" rows="3" class="shadow-sm focus:ring-indigo-500
                                    focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="{{ $assignment->feedback }}">
                                </textarea>
                            </div>
                                <button wire:click="cancel" class="btn btn-light float-left mt-3">Cancel</button>
                                <button wire:click="updateGrade" class="btn btn-primary float-right mt-3">Update</button>
                        </div>
                            <x-alerts.success>
                            </x-alerts.success>
                    </div>
                @endif
                </dd>
            </div>
            @endif
            <x-alerts.success>
            </x-alerts.success>
        </dl>
    </div>
</div>
