<x-layouts.dashboard.lessons.index :course="$course" :registration="$registration">
    <x-slot name="title">
        Lessons - {{ $course->name }}
    </x-slot>
    <x-slot name="content">

        <ol class="py-4 px-6 divide-y divide-slate-300/30">
            @foreach($registration->course->lessons as $lesson)
                @php $lessonProgress = $registration->lessonProgresses->where('lesson_id', $lesson->id)->first(); @endphp
                    @if($lessonProgress->completed_at !== null)
                        <li class="relative flex flex-col items-center py-3">
                            <div class="w-full flex justify-start items-center text-gray-400">
                                <a class="unstyled font-thin text-2xl" href="{{ route('dashboard.lessons.show', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}">{{ $lesson->title }}
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6 inline-block mb-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </a>
                                <span class="ml-auto text-right">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex w-full ml-1 justify-start text-xs text-gray-400 mt-2 gap-x-8">
                                @isset($lesson->flashcardSet) @if(count($lesson->flashcardSet->flashcards))<a href="{{ route('dashboard.lessons.flashcards.index', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="unstyled">Flashcards</a>@endif @endisset
                                @if(count($lesson->exercises->where('type', 'Guided Practice')) > 0)<a href="{{ route('dashboard.lessons.guided-practice.results', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="unstyled">Guided Practice</a> @endif
                                @if(count($lesson->exercises->where('type', 'Free Practice')) > 0)<a href="{{ route('dashboard.lessons.free-practice.results', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="unstyled">Free Practice</a>@endif
                                @isset($lesson->quiz)<a href="{{ route('dashboard.lessons.quiz.results', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="unstyled">Quiz</a>@endisset
                            </div>
                        </li>
                    @elseif($lessonProgress->started_at && Carbon\Carbon::parse($lessonProgress->started_at)->isPast())
                        <li class="relative flex flex-col items-center py-4">
                            <div class="w-full flex justify-start items-center mb-2">
                                <a class="unstyled text-2xl" @if($registration->status == 'Active') href="{{ route('dashboard.lessons.show', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" @else href=" {{ route('dashboard.payments', ['locale' => session('locale')]) }}" @endif>{{ $lesson->title }}
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6 inline-block mb-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </a>
                                <form class="ml-auto text-right text-sm" action="{{ route('dashboard.lessons.mark-complete', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id, 'experience' => $registration->experience]) }}" method="POST" x-data="{ showModal: false, isChecked: false }">
                                    @csrf
                                    <span class="cursor-pointer" @click="showModal = true, isChecked = true">
                                        Mark complete
                                        <input id="completed" x-model="isChecked" x-bind:checked="isChecked" type="checkbox" class="h-4 w-4 ml-1 rounded border-gray-300 text-black focus:ring-black">
                                    </span>
                                    <div
                                        x-show="showModal == true"
                                        style="display: none"
                                        x-on:keydown.escape.prevent.stop="open = false"
                                        role="dialog"
                                        aria-modal="true"
                                        x-id="['modal-title']"
                                        :aria-labelledby="$id('modal-title')"
                                        class="fixed inset-0 z-10 overflow-y-auto"
                                    >
                                        <!-- Overlay -->
                                        <div x-show="showModal == true" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-75"></div>

                                        <!-- Panel -->
                                        <div
                                            x-show="showModal == true" x-transition
                                            x-on:click="showModal = false"
                                            class="relative flex min-h-screen items-center justify-center p-4"
                                        >
                                            <div
                                                x-on:click.stop
                                                x-trap.noscroll.inert="showModal == true"
                                                class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg text-left"
                                            >
                                                <!-- Title -->
                                                <h2 class="text-3xl font-bold" :id="$id('modal-title')">Confirm</h2>

                                                <!-- Content -->
                                                <p class="mt-2 text-gray-600">Are you sure you want to mark this lesson complete? You can still access the lesson content but this action cannot be undone.</p>

                                                <!-- Buttons -->
                                                <div class="mt-8 flex space-x-2">
                                                    <button type="button" x-on:click="showModal = false, isChecked = false" class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                                                        Cancel
                                                    </button>

                                                    <button type="submit" x-on:click="showModal = false" class="rounded-md text-white border border-gray-200 bg-black px-5 py-2.5">
                                                        Mark Complete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="flex w-full ml-1 justify-start text-xs mt-2 gap-x-8">
                                @isset($lesson->flashcardSet) @if(count($lesson->flashcardSet->flashcards))<a href="{{ route('dashboard.lessons.flashcards.index', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="unstyled">Flashcards</a>@endif @endisset
                                @if(count($lesson->exercises->where('type', 'Guided Practice')) > 0)<a href="{{ route('dashboard.lessons.guided-practice.show', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="unstyled">Guided Practice</a>@endif
                                @if(count($lesson->exercises->where('type', 'Free Practice')) > 0)<a href="{{ route('dashboard.lessons.free-practice.show', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="unstyled">Free Practice</a>@endif
                                @isset($lesson->quiz)<a href="{{ route('dashboard.lessons.quiz.show', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="unstyled">Quiz</a>@endisset
                            </div>
                        </li>
                    @else
                        <li class="relative flex items-center py-3 text-2xl">
                            <div class="min-w-0 flex-1">
                                <span class="text-gray-400">{{ $lesson->title }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                        </li>
                    @endif

            @endforeach
        </ol>
<x-alerts.error />
</x-slot>
</x-layouts.dashboard.courses.show>
