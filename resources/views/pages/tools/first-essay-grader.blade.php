<x-layouts.app>
  <x-slot name="title">
    B2 First Writing Checker AI Tool
  </x-slot>
  <x-slot name="description">
      This B2 First essay writing checker AI tool will improve your band scores for Task 1 and Task 2 by showing you exactly
       how you can improve your B2 First essays.
  </x-slot>
<x-layouts.guest>
    <div x-data="{
            subscriptionOverlayVisible: false,
            showSubscriptionOverlay() {
            this.subscriptionOverlayVisible = true;
            $dispatch('upgrade-clicked');
            },
        }">
        @guest
            <!-- Guest Section -->
            <section class="bg-teal-500 py-12 px-3 md:px-0">
                <div class="text-center text-white">
                    <p class="text-3xl font-semibold mb-4">You must be logged in to use the AI B2 First Writing Checker Tool.</p>
                    <p class="mb-8">Create an account or log in to submit your essays for feedback.</p>
                    <a href="/register" class="bg-white hover:bg-teal-300 text-teal-700 font-bold py-2 px-6 mr-3 rounded">Register</a>
                    <a href="/login" class="bg-teal-700 hover:bg-teal-600 text-white font-bold py-2 px-6 rounded">Log in</a>
                </div>
            </section>
        @else
            <!-- Subscription Section -->
            <!-- Enhanced Subscription Section -->
            @if(!auth()->user()->subscribedToProduct(1001))
                <section class="bg-teal-700 py-12">
                    <div class="text-center text-white">
                        <p class="text-3xl font-semibold mb-4">Unlock Unlimited Submissions for  @lang('currency.symbol'){{ $product->prices->where('type', 'Recurring')->first()->localized_amount }}/mo</p>
                        <p class="text-xl font-semibold mb-8">You have {{ max(0, 4 - count(auth()->user()->essaySubmissions ?? [])) }} free submissions left.</p>
                        <button @click="showSubscriptionOverlay()" class="bg-teal-300 hover:bg-teal-500 text-white font-bold py-2 px-6 rounded">Upgrade Now</button>
                    </div>
                </section>
            @endif

        @endguest

        <!-- Essay Submission Section -->
        <section class="bg-gray-100 pt-12 pb-3 px-12 sm:px-24 md:px-36 lg:px-64">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="text-gray-900">
                        <h1 class="mb-2 text-4xl font-bold">B2 First Writing Checker AI Tool</h1>
                        <p class="mb-6">Submit your B2 First essay and topic for AI-generated feedback and scoring.</p>
                    </div>
                    <form action="/essay-submissions/handle" method="POST" class="my-8 bg-white shadow-lg rounded-lg p-6">
                        @csrf

                        <input type="hidden" name="type" value="Cambridge">
                        <input type="hidden" name="exam" value="B2 First">
                        

                        <!-- Topic Input -->
                        <label for="topic" class="block text-sm font-medium text-gray-700 leading-6">Topic</label>
                        <textarea id="topic" name="topic" rows="4" class="mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('topic') }}</textarea>

                        <!-- Essay Input -->
                        <label for="essay" class="block text-sm font-medium text-gray-700 leading-6">Essay</label>
                        <textarea id="essay" name="essay_content" rows="10" class="mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('essay') }}</textarea>

                        <!-- Submit Button -->
                        <div x-data="{ loading: false }">
                            <button x-show="!loading" @click="loading = true" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Submit</button>
                            <div x-cloak x-show="loading"><img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5"></div>
                        </div>
                    </form>
                </div>
            </div>
        </section>



    <section class="flex">
        <div class="px-12 mx-auto mt-24 mb-12 prose prose-xl w-full">
            <h2><strong>AI B2 First Writing Checker Tool to help you improve</strong></h2>
            <img src="{{ asset('/images/pages/ielts/ielts writing essay ai feedback.png') }}" alt="B2 First writing essay ai feedback" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>The <strong>#1 thing you can do to prepare</strong> for the writing section of the B2 First writing section is to <strong>take practice tests</strong>. But what good are these tests if you don't know what your scores are?</p>
            <p>You can take an B2 First preparation course, or hire a private tutor, but these options aren't possible for everyone. You might have an English-speaking friend who can check your writing, but they might not have the right experience with grading academic essays.</p>
            <p>That's why I created this B2 First writing checker tool built with AI so that <strong>you can write as many practice essays as you want</strong> and still get quality scores and feedback to help you track your progress.</p>
            <h2><strong>Discover Your Current B2 First Writing Level</strong></h2>
            <p>This AI B2 First grader tool only needs you to submit the essay topic you're writing about and the content of your essay. Then, it analyzes your writing using <strong>the same criteria as the official graders of the B2 First exam</strong>.</p>
            <p>The responses won't be exactly like the responses for the actual B2 First exam every single time, but they will be more than close enough to help you <strong>improve your B2 First essays to pass your exam</strong> the first time you take it.</p>
            <p>With each B2 First essay you submit, it will analyze everything about your essay:</p>
            <ul>
                <li><p>sentence structure</p></li>
                <li><p>use of appropriate transition words</p></li>
                <li><p>strength of your arguments</p></li>
                <li><p>cohesion of your arguments and support</p></li>
                <li><p>spelling mistakes</p></li>
                <li><p>grammatical range</p></li>
                <li><p>grammar accuracy</p></li>
                <li><p>lexical resource</p></li>
                <li><p>vocabulary usage</p></li>
            </ul>
            <p>It will also tell you how well-organized your essay is, and what you can do to improve that organization.</p>
            <p>If you incorrectly used some vocabulary, it will point that out to you, and tell you the correct way to write it on your actual B2 First test. It will judge how well your sample essays match with the expected task response, as it has been trained on previous mock tests and sample essays from other B2 First students.</p>
            <h2><strong>Personalized Feedback for Improvement</strong></h2>
            <img src="{{ asset('/images/pages/ielts/save your ielts writing essay submissions.png') }}" alt="save your B2 First writing essay submissions" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>Normally getting personalized feedback for this amount of B2 First essays would cost you a lot of money. But with this B2 First writing grader tool, you can get personalized feedback on your B2 First essay every single time you write one, for <strong>only $5 a month</strong>.</p>
            <p>Submit as many writing tasks as you want and get a band score and analysis of your essay, including suggestions for improving your writing and score every single time.</p>
            <p>Whether you're struggling with Task 1 or Task 2, it can help you <strong>improve all the weak points in your writing</strong> that might be holding you back on your writing task submissions.</p>
            <h2><strong>Targeted Guidance to Boost Your Score</strong></h2>
            <img src="{{ asset('/images/pages/ielts/corrected ielts essay example.png') }}" alt="corrected B2 First essay example" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>While it may not be a 100% perfect replacement for an actual British Council examiner sitting at your kitchen table helping grade your essays every night, it's certainly a great tool to <strong>help you score higher on your B2 First essay</strong>.</p>
            <p>By giving targeted guidance on the points that you can improve according to the official B2 First writing rubric, you can get the higher score on your B2 First essay that you need.</p>
            <p>The process of getting high scores on your B2 First writing section takes a lot of time and practice on your part. By offering you this AI B2 First writing checker tool, I want to make sure that you get as many opportunities to get help with that hard work as you can.</p>
            <h2><strong>Efficiency and Convenience at Your Fingertips</strong></h2>
            <p><strong>You can try the B2 First essay grader tool for FREE twice</strong> before you need to purchase the paid version of the tool, just so you can make sure it works for you, and to make sure you're confident about using it on your writing task practice before paying any money.</p>
            <p>I've had so many B2 First academic students tell me this helped them a ton, not only with their B2 First writing score but also with their writing skills in general.</p>
            <h2><strong>Take Control of Your B2 First Writing Journey</strong></h2>
            <img src="{{ asset('/images/pages/ielts/ielts writing score progress tracking dashboard.png') }}" alt="B2 First writing score progress tracking dashboard" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>Whether you need to take the B2 First academic or the general training version of the exam, this tool can help you improve your scores. </p>
            <p>The biggest difficulty for B2 First students is usually that the essay is not all about your English skills, it's about your academic writing skills. You need to be able to write effectively, with clear and organized arguments that the examiners can easily understand. </p>
            <p>Hitting the word count, using the right vocabulary, appropriate cohesive devices, and having proper spelling, are just a few of the details you need to keep track of as you prepare for your B2 First writing exam.</p>
            <p>But if you use this AI B2 First writing grader tool, you won't have to keep track of it alone.</p>
            <p>Not only will you get personalized feedback, but <strong>you can save your essay submissions and see how your scores have changed over time</strong>. You can also look back to see the progress you've made or remind yourself of the feedback from the tool.</p>
            <p>Take advantage of the technology available and give this tool a shot to prepare for your B2 First essay. You'll be happy you did, and <strong>your future self will thank you later after you've passed your B2 First exam on your first try</strong>.</p>
        </div>
    </section>
    <section class="flex">
        <div class="px-12 mx-auto mt-24 mb-12 prose prose-xl w-full">
            <h2>Understanding the B2 First Exam: Proof of Advanced English Proficiency</h2>
            <p>The <strong>B2 First Exam</strong>, previously known as the First Certificate in English (FCE), is a significant step for learners aiming to demonstrate they can use everyday written and spoken English for work or study purposes. It tests the ability to operate at an upper intermediate level and is recognized by educational institutions and employers worldwide. Here's what makes the B2 First pivotal for English learners:</p>
            <ul>
                <li><strong>Practical Language Skills:</strong> <a href="https://www.cambridgeenglish.org/exams-and-tests/first/">The B2 First Exam</a> assesses the language skills needed to communicate confidently in an English-speaking environment.</li>
                <li><strong>Global Recognition:</strong> A passing score indicates that a candidate has the language skills necessary to live and work independently in an English-speaking country or study on courses taught in English.</li>
            </ul>
            <h3>Key Focus Areas for Writing Success in the B2 First Exam</h3>
            <p>Passing the writing section of the B2 First Exam requires a focus on several specific areas:</p>
            <ul>
                <li><strong>Clarity and Coherence:</strong> Students must be able to construct clear, well-planned texts about familiar subjects. This includes logically ordering ideas and using cohesive devices effectively, such as linking words and conjunctions.</li>
                <li><strong>Appropriate Register and Style:</strong> It's crucial to match the style and register to the task, whether writing an informal email or a formal essay. Understanding the differences in tone and structure between these forms is key.</li>
                <li><strong>Vocabulary Range and Precision:</strong> A broad vocabulary and the ability to use it appropriately are essential. Test takers should be comfortable employing expressions, idioms, and phrasal verbs that are commonly used by native speakers at this level.</li>
                <li><strong>Grammatical Accuracy:</strong> Students should demonstrate good control over a range of grammatical structures. Minor errors might be present but should not impede communication.</li>
                <li><strong>Responding to Task Requirements:</strong> Understanding and addressing all parts of the exam question is crucial. This involves developing relevant points fully and appropriately according to the task type.</li>
            </ul>
            <p>The B2 First Exam not only tests language proficiency but also assesses how effectively candidates can communicate their thoughts and ideas in writing. Excelling in this exam paves the way for more advanced studies and professional opportunities in English-speaking environments.</p>
        </div>
    </section>

    <section class="bg-teal-700 text-white py-12 mb-12 rounded-xl mx-5 md:mx-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
                Frequently Asked Questions
            </h2>
            <div class="mt-6 pt-6">
                <dl class="md:grid md:grid-cols-2 md:gap-8">
                    <div class="pr-10">
                        <dt class="text-lg leading-6 font-bold">
                            How does the B2 First Writing Checker AI Tool work?
                        </dt>
                        <dd class="mt-2 mb-4 text-base">
                            Our AI analyzes your essays based on B2 First criteria including grammar, vocabulary, and coherence, providing scores and actionable feedback to help improve your writing skills.
                        </dd>
                    </div>
                    <div>
                        <dt class="text-lg leading-6 font-bold">
                            Can I try the tool before subscribing?
                        </dt>
                        <dd class="mt-2 mb-4 text-base">
                            Yes, you can submit two essays for free to experience how the tool works before deciding on a subscription for unlimited submissions.
                        </dd>
                    </div>
                    <div class="pr-10">
                        <dt class="text-lg leading-6 font-bold">
                            Why does the tool cost money to use after 4 submissions?
                        </dt>
                        <dd class="mt-2 mb-4 text-base">
                            It costs me money every time I use an AI provider to analyze an essay. The subscription fee helps cover these costs and allows me to continue offering this service. I pay for the first two submissions for you
                            to make sure you like the tool before you pay for it. 
                        </dd>
                    </div>
                    <div>
                        <dt class="text-lg leading-6 font-bold">
                            How soon will I receive feedback on my essays?
                        </dt>
                        <dd class="mt-2 mb-4 text-base">
                            It takes between 30 seconds and a minute for the AI to analyze your essay and provide feedback and scores.
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="flex mt-5">
                <a href="/register" class="bg-white text-teal-700 font-bold text-xl px-5 py-2 rounded-lg hover:bg-teal-300 mx-auto">Register</a>
            </div>
        </div>
    </section>

    <x-alerts.success />
    <x-alerts.error />
    @auth
        <livewire:overlays.subscriptions.create :productId="1001"/>
    @endauth

    </div>
</x-layouts.guest>
</x-layouts.app>
