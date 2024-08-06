<x-layouts.app>
  <x-slot name="title">
    PTE Writing Checker AI Tool
  </x-slot>
  <x-slot name="description">
      This PTE essay writing checker AI tool will improve your band scores for Task 1 and Task 2 by showing you exactly
       how you can improve your PTE essays.
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
                    <p class="text-3xl font-semibold mb-4">You must be logged in to use the AI PTE Writing Checker Tool.</p>
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
                        <h1 class="mb-2 text-4xl font-bold">PTE Writing Checker AI Tool</h1>
                        <p class="mb-6">Submit your PTE essay and topic for AI-generated feedback and scoring.</p>
                    </div>
                    <form action="/essay-submissions/handle" method="POST" class="my-8 bg-white shadow-lg rounded-lg p-6">
                        @csrf

                        <input type="hidden" name="type" value="Pearson">
                        <input type="hidden" name="exam" value="PTE">
                        <input type="hidden" name="task" value="One">

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
            <h2><strong>AI PTE Writing Checker Tool to help you improve</strong></h2>
            <img src="{{ asset('/images/pages/ielts/ielts writing essay ai feedback.png') }}" alt="PTE writing essay ai feedback" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>The <strong>#1 thing you can do to prepare</strong> for the writing section of the PTE writing section is to <strong>take practice tests</strong>. But what good are these tests if you don't know what your scores are?</p>
            <p>You can take an PTE preparation course, or hire a private tutor, but these options aren't possible for everyone. You might have an English-speaking friend who can check your writing, but they might not have the right experience with grading academic essays.</p>
            <p>That's why I created this PTE writing checker tool built with AI so that <strong>you can write as many practice essays as you want</strong> and still get quality scores and feedback to help you track your progress.</p>
            <h2><strong>Discover Your Current PTE Writing Level</strong></h2>
            <p>This AI PTE grader tool only needs you to submit the essay topic you're writing about and the content of your essay. Then, it analyzes your writing using <strong>the same criteria as the official graders of the PTE exam</strong>.</p>
            <p>The responses won't be exactly like the responses for the actual PTE exam every single time, but they will be more than close enough to help you <strong>improve your PTE essays to pass your exam</strong> the first time you take it.</p>
            <p>With each PTE essay you submit, it will analyze everything about your essay:</p>
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
            <p>If you incorrectly used some vocabulary, it will point that out to you, and tell you the correct way to write it on your actual PTE test. It will judge how well your sample essays match with the expected task response, as it has been trained on previous mock tests and sample essays from other PTE students.</p>
            <h2><strong>Personalized Feedback for Improvement</strong></h2>
            <img src="{{ asset('/images/pages/ielts/save your ielts writing essay submissions.png') }}" alt="save your PTE writing essay submissions" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>Normally getting personalized feedback for this amount of PTE essays would cost you a lot of money. But with this PTE writing grader tool, you can get personalized feedback on your PTE essay every single time you write one, for <strong>only $5 a month</strong>.</p>
            <p>Submit as many writing tasks as you want and get a band score and analysis of your essay, including suggestions for improving your writing and score every single time.</p>
            <p>Whether you're struggling with Task 1 or Task 2, it can help you <strong>improve all the weak points in your writing</strong> that might be holding you back on your writing task submissions.</p>
            <h2><strong>Targeted Guidance to Boost Your Score</strong></h2>
            <img src="{{ asset('/images/pages/ielts/corrected ielts essay example.png') }}" alt="corrected PTE essay example" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>While it may not be a 100% perfect replacement for an actual British Council examiner sitting at your kitchen table helping grade your essays every night, it's certainly a great tool to <strong>help you score higher on your PTE essay</strong>.</p>
            <p>By giving targeted guidance on the points that you can improve according to the official PTE writing rubric, you can get the higher score on your PTE essay that you need.</p>
            <p>The process of getting high scores on your PTE writing section takes a lot of time and practice on your part. By offering you this AI PTE writing checker tool, I want to make sure that you get as many opportunities to get help with that hard work as you can.</p>
            <h2><strong>Efficiency and Convenience at Your Fingertips</strong></h2>
            <p><strong>You can try the PTE essay grader tool for FREE twice</strong> before you need to purchase the paid version of the tool, just so you can make sure it works for you, and to make sure you're confident about using it on your writing task practice before paying any money.</p>
            <p>I've had so many PTE academic students tell me this helped them a ton, not only with their PTE writing score but also with their writing skills in general.</p>
            <h2><strong>Take Control of Your PTE Writing Journey</strong></h2>
            <img src="{{ asset('/images/pages/ielts/ielts writing score progress tracking dashboard.png') }}" alt="PTE writing score progress tracking dashboard" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>Whether you need to take the PTE academic or the general training version of the exam, this tool can help you improve your scores. </p>
            <p>The biggest difficulty for PTE students is usually that the essay is not all about your English skills, it's about your academic writing skills. You need to be able to write effectively, with clear and organized arguments that the examiners can easily understand. </p>
            <p>Hitting the word count, using the right vocabulary, appropriate cohesive devices, and having proper spelling, are just a few of the details you need to keep track of as you prepare for your PTE writing exam.</p>
            <p>But if you use this AI PTE writing grader tool, you won't have to keep track of it alone.</p>
            <p>Not only will you get personalized feedback, but <strong>you can save your essay submissions and see how your scores have changed over time</strong>. You can also look back to see the progress you've made or remind yourself of the feedback from the tool.</p>
            <p>Take advantage of the technology available and give this tool a shot to prepare for your PTE essay. You'll be happy you did, and <strong>your future self will thank you later after you've passed your PTE exam on your first try</strong>.</p>
        </div>
    </section>
    <section class="flex">
        <div class="px-12 mx-auto mt-24 mb-12 prose prose-xl w-full">
            <h2>Acing the PTE Academic Essay: Key Strategies and Insights</h2>
            <p>The <strong>PTE Academic Essay</strong> is a critical component of <a href="https://www.pearsonpte.com/">the Pearson Test of English (PTE) Academic</a>, designed to assess a candidate's ability to write an essay in response to a prompt using correct English while organizing their ideas logically. This task measures writing skills in an academic context and is crucial for those looking to study in English-speaking environments. Here's what students need to know to excel:</p>
            <ul>
                <li><strong>Understanding the Essay Format:</strong> The PTE Essay is a 200-300 word written response to a single prompt. Candidates need to develop their argument coherently and persuasively.</li>
                <li><strong>Recognized Internationally:</strong> Success in the PTE Essay is highly valued by universities and employers worldwide as evidence of strong writing and critical thinking skills.</li>
            </ul>
            <h3>Essential Focus Areas for Success in the PTE Academic Essay</h3>
            <p>Effective strategies to excel in the PTE Academic Essay include:</p>
            <ul>
                <li><strong>Structure and Organization:</strong> Essays should have a clear structure, including an introduction, body paragraphs, and a conclusion. Each section should logically flow from one to the next, clearly outlining the candidate’s argument.</li>
                <li><strong>Clarity of Argument:</strong> It's essential to respond directly to the essay prompt with a clear thesis statement and develop arguments that are supported by detailed and relevant examples.</li>
                <li><strong>Vocabulary and Language Use:</strong> A wide range of vocabulary and grammatical structures should be used effectively to articulate points. The use of advanced vocabulary and varied sentence structures can enhance the sophistication of the essay.</li>
                <li><strong>Time Management:</strong> With a limited time to plan, write, and review the essay, effective time management is crucial. Practicing under timed conditions can help improve efficiency and ensure that candidates can produce a complete and polished essay within the allotted time.</li>
                <li><strong>Critical Thinking and Analysis:</strong> Demonstrating the ability to think critically about complex topics and analyze different perspectives is key. This includes evaluating the prompt’s statement, presenting counterarguments, and weaving personal insights into the discussion.</li>
            </ul>
            <p>Mastering the PTE Academic Essay requires not just linguistic skills but also the ability to organize thoughts rapidly and express them compellingly within a structured format. This challenge mirrors real-world academic writing tasks, making it a valuable exercise for future studies.</p>
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
                            How does the PTE Writing Checker AI Tool work?
                        </dt>
                        <dd class="mt-2 mb-4 text-base">
                            Our AI analyzes your essays based on PTE criteria including grammar, vocabulary, and coherence, providing scores and actionable feedback to help improve your writing skills.
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
