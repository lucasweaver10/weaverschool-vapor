<x-layouts.app>
    <x-slot name="title">
        Speaking Practice Exam Feedback | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Speaking Practice Exam Feedback
        </x-slot>
        <div class="max-w-5xl mx-auto mt-6 overflow-visible prose-xl">
            <div class="p-6">
                <div class="flex items-center pb-4">
                    <div class="flex-1">
                        <span class="text-2xl font-bold mr-2">Exam:</span>
                        <span class="inline">{{ $submission->test->title }}</span>
                    </div>
                </div>
                <div class="mt-4">                    
                    <div class="text-4xl font-bold mb-4">Overall Exam Score:</div>
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="text-2xl py-2 px-4 border-b border-gray-200">Criterion</th>
                                <th class="text-2xl py-2 px-4 border-b border-gray-200">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">Overall</td>
                                <td class="py-2 px-4 border-b border-gray-200 font-bold">{{ $averageScores['overall'] }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">Relevance</td>
                                <td class="py-2 px-4 border-b border-gray-200 font-bold">{{ $averageScores['relevance'] }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">Pronunciation</td>
                                <td class="py-2 px-4 border-b border-gray-200 font-bold">{{ $averageScores['pronunciation'] }}</td>
                            </tr>                                
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">Lexical Resource</td>
                                <td class="py-2 px-4 border-b border-gray-200 font-bold">{{ $averageScores['lexical_resource'] }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">Grammar</td>
                                <td class="py-2 px-4 border-b border-gray-200 font-bold">{{ $averageScores['grammar'] }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">Fluency & Coherence</td>
                                <td class="py-2 px-4 border-b border-gray-200 font-bold">{{ $averageScores['fluency_coherence'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-16">
                    <div class="text-4xl font-bold mb-8">Question by Question Breakdown:</div>
                    @foreach($submission->questionSubmissions as $questionSubmission)                        
                    @unless(!$questionSubmission->evaluation)
                    <div x-data="{ open: false }" class="mb-4">
                        <div @click="open = !open" class="cursor-pointer text-3xl font-bold mt-4 mb-4 flex justify-between items-center">
                            {{ $loop->iteration }}. {{ $questionSubmission->question->text }}
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 15l-7-7-7 7"></path>
                            </svg>
                        </div>
                        <div x-show="open" x-collapse>
                            @php
                                $evaluation = json_decode($questionSubmission->evaluation);
                            @endphp
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b border-gray-200">Criterion</th>
                                        <th class="py-2 px-4 border-b border-gray-200">Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">Overall</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $evaluation->overall }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">Relevance</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $evaluation->relevance }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">Pronunciation</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $evaluation->pronunciation }}</td>
                                    </tr>                                
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">Lexical Resource</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $evaluation->lexical_resource }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">Grammar</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $evaluation->grammar }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">Fluency & Coherence</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $evaluation->fluency_coherence }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div x-data="{ open: false }" class="mt-12">
                                <div @click="open = !open" class="cursor-pointer text-2xl font-bold flex justify-between items-center mb-4">
                                    <span>Sentences:</span>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 15l-7-7-7 7"></path>
                                    </svg>
                                </div>
                                <div x-show="open" x-collapse>
                                    @foreach ($evaluation->sentences as $sentence)
                                        <div x-data="{ openSentence: false }" class="mb-4 p-4 rounded-lg">
                                            <div @click="openSentence = !openSentence" class="cursor-pointer text-xl font-bold flex justify-between items-center">
                                                <span>{{ $sentence->sentence }}</span>
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path x-show="!openSentence" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    <path x-show="openSentence" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 15l-7-7-7 7"></path>
                                                </svg>
                                            </div>
                                            <div x-show="openSentence" x-collapse>
                                                <table class="min-w-full mb-4 mt-4">
                                                    <thead>
                                                        <tr>
                                                            <th class="py-2 px-4 border-b border-gray-200">Sentence</th>
                                                            <th class="py-2 px-4 border-b border-gray-200">Pronunciation Score</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="py-2 px-4">{{ $sentence->sentence }}</td>
                                                            <td class="py-2 px-4">{{ $sentence->pronunciation }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="mt-2">
                                                    <h5 class="text-xl font-bold mb-4">Details:</h5>
                                                    <table class="min-w-full">
                                                        <thead>
                                                            <tr>
                                                                <th class="py-2 px-4 border-b border-gray-200">Word</th>
                                                                <th class="py-2 px-4 border-b border-gray-200">Pronunciation</th>
                                                                <th class="py-2 px-4 border-b border-gray-200">Level</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($sentence->details as $detail)
                                                                <tr>
                                                                    <td class="py-2 px-4 @unless($loop->last) border-b border-gray-200 @endunless">{{ $detail->word }}</td>
                                                                    <td class="py-2 px-4 @unless($loop->last) border-b border-gray-200 @endunless">{{ $detail->pronunciation }}</td>
                                                                    <td class="py-2 px-4 @unless($loop->last) border-b border-gray-200 @endunless">{{ $detail->level }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-8 mb-12">
                                <h4 class="text-2xl font-bold mb-2">Transcript:</h4>
                                <p>"{{ $evaluation->transcription }}"</p>
                            </div>
                        </div>
                    </div>
                    @endunless
                    @endforeach
                </div>
            </div>            
        </div>
        <div class="flex my-10">
            <div class="mx-auto space-x-8">
                <a class="text-teal-700 dark:text-teal-500 hover:text-teal-500 dark:hover:text-teal-300 font-bold mx-auto" href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.feedback.index', ['locale' => session('locale', 'en')])}}">Back to all Submissions</a>
                <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.index', ['locale' => session('locale', 'en')])}}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-4 mr-12">
                    Take Another Practice Exam
                </a>
            </div>
        </div>
    </x-dashboard.index>
</x-layouts.app>
