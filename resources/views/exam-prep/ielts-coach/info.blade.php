<x-layouts.app>      
    <x-slot name="title">
        AI IELTS Coach from the Weaver School
    </x-slot>
    <x-slot name="description">
        Get your personal AI IELTS Coach to easily pass your IELTS Exam. Complete with interactive AI tools and practice tests to help you improve your speaking and writing scores.
    </x-slot>
<x-layouts.guest>
<main>
    <!-- hero -->
<div class="bg-gray-900 pt-20 pb-16 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-gray-100 sm:text-7xl">
        Pass your IELTS exam easily with your personal
        <span class="relative whitespace-nowrap font-bold text-teal-400 animate-pulse">
            <svg
                aria-hidden="true"
                viewBox="0 0 418 42"
                class="absolute top-2/3 left-0 h-[0.58em] w-full fill-teal-500/70"
                preserveAspectRatio="none"
            >
                <path d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004
                25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92
                39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874
                4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187
                3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787
                1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203
                1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371
                2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z" />
            </svg>
            <span class="relative">AI IELTS Coach</span>
        </span>
        
    </h1>
    <p class="mx-auto mt-10 max-w-4xl text-2xl tracking-tight text-slate-200">
        Prepare for your IETLS exam with interactive AI tools and practice tests to help you improve your <strong><a href="#speaking">speaking</a></strong> and <strong><a href="#writing">writing</a></strong> skills.
    </p>
    <x-hero-video src="https://www.youtube.com/embed/pyTMnfBxBko?si=tt0_DuOnNj2nm-Si" />
    {{-- <img class="w-2/3 sm:w-2/3 h-auto mx-auto my-16 rounded-xl shadow-xl border border-gray-700" src="/images/pages/learning-paths/language-learning-paths-index.jpg" alt="language learning paths for customized language learning"></img> --}}
    <div class="mt-10 flex justify-center gap-x-6 sm:gap-x-8">
        <a href="{{ route('exam-prep.ielts-coach.speaking.info', ['locale' => session('locale', 'en')]) }}" role="button" class="bg-violet-400 hover:bg-violet-500 py-3 px-4 rounded-lg text-2xl font-semibold text-white mr-2">Learn More</a>
        @guest
            <x-buttons.subscriptions.trial-pro
                text="Try Pro for Free"                    
                class="bg-teal-200 hover:bg-teal-300 text-teal-900 font-bold py-3 px-6 rounded"
            />        
        @else
            @if(!auth()->user()->hasSubscriptionLevel(auth()->id(), 'essays'))
                <x-buttons.subscriptions.trial-pro
                    text="Try Pro for Free"                    
                    class="bg-teal-200 hover:bg-teal-300 text-teal-900 font-bold py-3 px-6 rounded"
                /> 
            @else
                <a href="/billing" role="button" class="bg-teal-200 hover:bg-teal-300 py-3 px-4 rounded-lg text-2xl font-semibold text-teal-900">Upgrade</a>        
            @endif
        @endguest
    </div>
</div>
<!-- End hero -->

    <!-- Speaking Container -->
    <div class="dark:bg-gray-200">
        <div class="dark:bg-gray-200 container sm:mx-auto px-8">
            <div class="md:flex-nowrap pt-16 text-5xl sm:pb-8 font-bold" id="speaking"><h2 class="text-center">Speaking Coach</h2></div>
            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-16">
                <!-- Column 1 -->
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">PRACTICE TESTS</span>
                    <h2 class="text-4xl font-bold mt-4">Practice Your Speaking</h2>
                    <p class="mt-3">Practice your skills for the IELTS Speaking Section by taking practice tests with real audio questions and recording your own answers.</p>                    
                    <p class="mt-4">Easily take practice tests and record your answers on your smartphone.</p>
                </div>
                <!-- Column 2 -->
                <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                    <img src="/images/pages/ielts/ielts speaking coach take test.jpg" alt="ielts speaking practice tests" class="rounded-lg max-w-full h-auto">                
                </div>
            </div>
             <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-8">
                <!-- Column 1 -->
                <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-8">
                    <img src="/images/pages/ielts/ielts speaking coach sentence overview.jpg" alt="ielts speaking test ai answer analysis" class="rounded-lg max-w-full h-auto">                
                </div>
                <!-- Column 2 -->        
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">ANSWER ANALYSIS</span>
                    <h2 class="text-4xl font-bold mt-4">Get an Accurate Band Score</h2>
                    <p class="mt-3">Receive an overall band score for your practice exam, as well as scores for each question so you can see where you need to improve.</p>                                       
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-16">
                <!-- Column 1 -->
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">PRONOUNCATION EVALUATION</span>
                    <h2 class="text-4xl font-bold mt-4">Improve Your Pronouncation</h2>
                    <p class="mt-3">Get a personalized evaluation for your pronouncation of each word in your answers so you can see which words you need to improve to pass your exam.</p>                                        
                </div>
                <!-- Column 2 -->
                <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                    <img src="/images/pages/ielts/ielts speaking coach word breakdown.jpg" alt="ielts speaking ai pronouncation evaluation" class="rounded-lg max-w-full h-auto">                
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-16">
                <!-- Column 1 -->
                <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                    <img src="/images/pages/ielts/ielts speaking coach questions.jpg" alt="pratice all sections of the ielts speaking exam" class="rounded-lg max-w-full h-auto">                
                </div>                
                <!-- Column 2 -->
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">ALL EXAM SECTIONS AVAILABLE</span>
                    <h2 class="text-4xl font-bold mt-4">Practice Parts 1, 2, & 3 of the Speaking Section</h2>
                    <p class="mt-3">Each practice exam is complete with all the required questions for each part of the IELTS Speaking section, so you can speak confidently on each section.</p>                                        
                </div>
            </div>
        </div>
    </div>
    <!-- End Speaking Container -->

    <!-- Writing Container -->
    <div class="dark:bg-gray-200 sm:pb-16">
        <div class="container sm:mx-auto px-8">
            <div class="md:flex-nowrap pt-16 sm:pb-8 text-5xl font-bold" id="writing"><h2 class="text-center">Writing Coach</h2></div>
            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-8">
                <!-- Column 1 -->
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">ESSAY EVALUATION</span>
                    <h2 class="text-4xl font-bold mt-4">Task One & Two Essay Analysis</h2>
                    <p class="mt-3">Submit your essay topic and your completed practice essay and receive a band score and comprehensive analysis of your essay.</p>
                    </p>
                    <p class="mt-4">You'll get reasons for your score, as well as feedback on how you can improve your essay scores.</p>
                </div>
                <!-- Column 2 -->
                <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                    
                    <img src="/images/pages/ielts/ielts writing essay ai feedback.png" alt="ielts writing ai analysis" class="rounded-lg max-w-full h-auto">                
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-16">
                <!-- Column 1 -->
                <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                    <img src="/images/pages/ielts/ielts writing checker task 1.png" alt="ai ielts writing checker for task 1 essays" class="rounded-lg max-w-full h-auto">                
                </div>
                <!-- Column 2 -->            
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">IMAGE RECOGNITION</span>
                    <h2 class="text-4xl font-bold mt-4">Task One Visual Recognition</h2>
                    <p class="mt-3">Submit an image with your essay submission and get accurate feedback on your Task One essay based on the image you submit.</p>
                    </p>
                    <p class="mt-4">Just enter an image url or upload a file.</p>
                </div>
            </div>            

            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-8">
                <!-- Column 1 -->
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">THESIS STATEMENTS</span>
                    <h2 class="text-4xl font-bold mt-4">Learn to Write High-Scoring Thesis Statements</h2>
                    <p class="mt-3">The number one thing you can do to improve your IELTS essays in all 4 scoring criteria is learning how to write a good thesis statement.</p>
                    </p>
                    <p class="mt-4">Your IELTS AI Coach will teach you how to write a thesis statement from an IELTS essay topic and how to use it to score more points.</p>
                </div>
                <!-- Column 2 -->
                <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                    <img src="/images/pages/ielts/ai ielts coach thesis statements.jpg" alt="ielts thesis statement trainer" class="rounded-lg max-w-full h-auto">                
                </div>
            </div>

            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-8">
                <!-- Column 1 -->
                <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-8">
                    <img src="/images/pages/ielts/ai ielts coach writing outlines.jpg" alt="tool for writing ielts outlines" class="rounded-lg max-w-full h-auto">                
                </div>
                <!-- Column 2 -->        
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">OUTLINES</span>
                    <h2 class="text-4xl font-bold mt-4">Create Task Two Outlines</h2>
                    <p class="mt-3">Learn step-by-step how to create a Task Two essay outline that will help you write essays that score more points.</p>
                    </p>
                    <p class="mt-4">Let your AI IELTS Coach teach you step by step how to write a Task Two outline that you can turn into a full essay, getting
                    real-time feedback in each step.</p>
                </div>
            </div>

            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-8">
                <!-- Column 1 -->
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">GET PREPARED</span>
                    <h2 class="text-4xl font-bold mt-4">Complete IELTS Writing Preparation</h2>
                    <p class="mt-3">Don't just check your essays. Learn how to write high-scoring essays before you check their score.</p>
                    </p>
                    <p class="mt-4">Take advantage of complete IELTS writing exam preparation with personalized AI feedback and coaching on your writing.</p>
                </div>
                <!-- Column 2 -->
                <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                    <img src="/images/pages/ielts/ai ielts coach writing feedback.jpg" alt="complete ielts writing preparation" class="rounded-lg max-w-full h-auto">                
                </div>
            </div>

            <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-8">
                <!-- Column 1 -->
                <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                    <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">INTRODUCTIONS</span>
                    <h2 class="text-4xl font-bold mt-4">Learn to Write Better Introductions</h2>
                    <p class="mt-3">Learn how to write better introductions by rewriting the question using synonyms and practice with your AI IELTS Coach.</p>
                    </p>
                    <p class="mt-4">Improve your Lexical Resource score and get real-time feedback every time you write an introduction.</p>
                </div>
                <!-- Column 2 -->                        
                <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-8">
                    <img src="/images/pages/ielts/ai ielts coach introductions.jpg" alt="improve ielts introductions" class="rounded-lg max-w-full h-auto">                
                </div>
            </div>
        </div>
    </div>
    <!-- End Writing Container -->

    {{-- <div class="bg-gray-900">
        <x-cta.upgrades.ielts-coach-pro />   
    </div> --}}


    <!-- Pricing block -->    
    <x-pricing-block />            
    <!-- End pricing block -->
    
    <!-- FAQ block -->
    <section id="faq" aria-labelledby="faq-title" class="relative overflow-hidden bg-slate-50 py-20 px-8 sm:px-16 sm:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
            <div class="mx-0 max-w-2xl lg:mx-0">
                <h2 id="faq-title" class="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">Frequently
                    asked questions</h2>
                <p class="mt-4 text-lg tracking-tight text-slate-700">If you can’t find what you’re looking for, email
                    me and I'll get back to you ASAP.</p>
            </div>
            <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">How long do I have to stay subscribed to the tool?</h3>
                            <p class="mt-4 text-sm text-slate-700">You can cancel your subscription at any time with just two clicks via Stripe.</p>
                        </li>
                        <!-- Additional FAQ items for the first column go here -->
                    </ul>
                </li>
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">Are there any limits to the ${{ $product->prices->where('type', 'Recurring')->first()->amount }} monthly plan?</h3>
                            <p class="mt-4 text-sm text-slate-700">Our ${{ $product->prices->where('type', 'Recurring')->first()->amount }} plan allows you to submit 20 essays and 5 practice speaking exams per month.</p>
                        </li>
                        <!-- Additional FAQ items for the second column go here -->
                    </ul>
                </li>
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">What if I don't like the tool?</h3>
                            <p class="mt-4 text-sm text-slate-700">We offer a 7-day trial so you'll have plenty of time to see if you like it before your card is charged.</p>
                        </li>
                        <!-- Additional FAQ items for the third column go here -->
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <!-- End FAQ block -->
    <x-alerts.error />
</main>
</x-layouts.guest>
</x-layouts.app>
