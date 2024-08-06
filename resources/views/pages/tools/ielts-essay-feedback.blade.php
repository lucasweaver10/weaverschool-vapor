<x-layouts.app>
  <x-slot name="title">
    IELTS Writing Essay AI Grader Tool - Score and Feedback
  </x-slot>
  <x-slot name="description">
    AI generated band score and feedback on your IELTS writing essay.
  </x-slot>
<x-layouts.guest>

<div class="grid grid-cols-3 px-12 mt-5">
    <div class="col-span-3 sm:col-span-2">
        <div class="px-4 lg:mx-24 mb-12">
            <!-- Header Section -->
            <div class="mb-2">
                <h1 class="text-4xl font-bold text-gray-800">IELTS Writing Essay AI Feedback</h1>
            </div>

            <!-- Informational Text -->
            <div class="text-xl text-gray-700 italic mb-6">
                <p>These results are AI-generated and should not be considered as an official IELTS score. They're intended to provide a general idea of your writing proficiency before your IELTS Writing Exam. For more precise feedback, <a href="mailto:lucas@weaverschool.com" class="text-teal-500 hover:text-teal-600">contact me</a> for access to an experienced teacher.</p>
            </div>
        </div>

        <div class="px-4 lg:px-0 lg:mx-24">
            <!-- Feedback Section -->
            <div class="font-bold text-2xl text-gray-800 mb-4">Feedback</div>
            <div class="mb-5 text-lg prose prose-teal">
                @if(session('feedback'))
                    @foreach (session('feedback') as $text)
                        <p>{!! $text !!}</p>
                    @endforeach
                @else
                    <p class="text-gray-600">There's no feedback at this time. Please return to the grading page and submit your essay.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-span-3 sm:col-span-1">
        <div class="bg-black p-5 rounded-xl mb-5">
            <div class="text-white text-3xl font-bold text-center mb-4">Get the score you need on your IELTS writing exam</div>
            <div><img src="https://we-public.s3.eu-north-1.amazonaws.com/images/pages/lucas+weaver+founder+the+weaver+school.png"
                      alt="lucas weaver founder of online language school the weaver school" class="w-full
                             object-center object-cover rounded-xl mt-5 sm:mt-0">
            </div>
            <div class="mt-5 text-white mx-5">
                <p>Don't get stuck having to take the IELTS exam more than once because you failed the writing section.</p>
                <p class="mt-5 mb-1">With my IELTS writing course you get:</p>
                <ul class="list-disc list-inside">
                    <li>23 video lessons</li>
                    <li>Essay templates and examples</li>
                    <li>Access to the AI essay grader free for 1 year</li>
                    <li>Bonus access to my "Master English Writing Fluency" course</li>
                </ul>
                <a href="/{{ session('locale') }}/english/courses/online/ielts-writing" role="button">
                    <div class="bg-teal-400 hover:bg-teal-300 text-white text-center text-2xl font-bold rounded-lg mt-4 py-3 px-3 w-full">Learn more</div>
                </a>
            </div>
        </div>
    </div>
</div>
<section class="sm:px-24 py-12 bg-teal-500 mt-5 text-white">
    <div class="sm:mx-0 lg:mx-24">
        <div class="grid grid-cols-3">
            <div class="col-span-3 sm:col-span-1">
                <img class="h-64 rounded-lg mx-auto" src="/images/pages/ielts/lucas%20and%20lisette%20ielts%20celebration.jpg">
            </div>
            <div class="col-span-3 sm:col-span-2 mx-12">
                <div class="text-3xl font-bold mb-4 mt-12 sm:mt-0">
                    Want to get a 7.5 on your IELTS essay like Lisette?
                </div>
                <p class="mb-12 text-2xl">Lisette was able to do a Master's Degree in English at a university in the Netherlands after taking my course.
                    <strong><em>You can get the score you need too!</em></strong>
                </p>
                <a role="button" href="/{{ session('locale') }}/english/courses/online/ielts-writing"
                   class="text-2xl font-bold bg-white hover:bg-gray-100 text-black rounded-lg py-3 px-3 ">
                    View course
                </a>
            </div>
        </div>
    </div>
</section>

</x-layouts.guest>
</x-layouts.app>
