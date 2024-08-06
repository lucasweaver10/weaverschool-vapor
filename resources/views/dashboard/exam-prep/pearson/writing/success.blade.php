<x-layouts.app>
<x-slot name="title">
    Essay Submission Successful | {{ config('app.name') }}
</x-slot>
<x-dashboard.index>
    {{-- <x-slot name="title">
        Essay Submission Successful
    </x-slot> --}}
<div x-data="{
        subscriptionOverlayVisible: false,
        productId: null,
        showOverlay(id) {
            this.productId = id;
            $dispatch('upgrade-clicked', {id: this.productId});
        }       
    }"
    x-on:overlay-opened.window="subscriptionOverlayVisible = true">   

    
    @if(auth()->user()->subscribed('pro') || auth()->user()->subscribed('essays'))

    <section class="bg-teal-700 py-12 rounded-lg">
        <div class="text-center text-white">
            <h2 class="text-3xl font-bold mb-4">Submission processing...</h2>
            <p class="text-xl font-semibold">You will receive a notification as soon as your essay has been graded.</p>            
        </div>
    </section>

    @else
    
     <section class="bg-teal-900 pt-8 pb-8 px-8 mt-8 mb-8 rounded-lg">
        <div class="text-center text-white">
            <div class="text-lg font-semibold mt-2 mb-8">You have {{ max(0, 2 - count(auth()->user()->essaySubmissions ?? [])) }} trial submissions left...</div>
            <p class="text-3xl md:text-4xl font-semibold mb-8 text-teal-100">Subscribe to Weaver School Pro</p>
            <p class="text-xl mb-12 sm:px-8">Submit 20 Essays and 5 Speaking Tests for @lang('currency.symbol'){{ $pro->prices->where('billing_period', 'Monthly')->first()->localized_amount }} per month. <br>Or, start with Basic and get 10 essays per month for @lang('currency.symbol'){{ $basic->prices->where('billing_period', 'Monthly')->first()->localized_amount }}.</p>                    
            <div class="grid grid-cols-1 sm:grid-cols-2 justify-center items-center sm:px-8">                        
                <a target="_blank" href="{{ route('subscription-checkout', ['type' => 'basic', 'id' => '3001']) }}" class="bg-teal-400 hover:bg-teal-500 text-white font-bold py-2 px-6 rounded mb-4 sm:mb-0 sm:mr-4">Start with Basic</a>
                <x-buttons.subscriptions.trial-pro
                    text="Try Pro for Free"                    
                    class="bg-teal-200 hover:bg-teal-300 text-teal-900 font-bold py-2 px-6 rounded"
                />
        </div>
    </section>

    <section class="relative dark:bg-gray-900 py-12 px-6 mt-12 flex rounded-lg">
        <div class="max-w-4xl mx-auto">
            {{-- <div class="absolute left-16 top-0 bottom-0 w-0.5 bg-indigo-200" aria-hidden="true"></div> --}}
            <div class="ml-10">
                <!-- Step 1 -->
                <div class="flex relative items-center mb-8">
                    {{-- <div class="absolute left-4 top-4 -ml-px mt-0.5 h-full w-0.5 bg-indigo-200" aria-hidden="true"></div> --}}
                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-teal-400 text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold">Create free account</p>
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="flex items-center mb-8">
                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-teal-400 text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold">Submit a trial essay</p>
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="flex items-center mb-8">
                    <div class="h-10 w-10 rounded-full bg-amber-400 flex items-center justify-center text-white">
                        <!-- Replace with any icon or number -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                          <path d="M18 1.5c2.9 0 5.25 2.35 5.25 5.25v3.75a.75.75 0 0 1-1.5 0V6.75a3.75 3.75 0 1 0-7.5 0v3a3 3 0 0 1 3 3v6.75a3 3 0 0 1-3 3H3.75a3 3 0 0 1-3-3v-6.75a3 3 0 0 1 3-3h9v-3c0-2.9 2.35-5.25 5.25-5.25Z" />
                        </svg>


                    </div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold">Today: Unlock Weaver School Pro</p>
                    </div>
                </div>
                <!-- Step 4 -->
                <div class="flex items-center mb-8">
                    <div class="h-10 w-10 rounded-full bg-teal-400 flex items-center justify-center text-white">
                        <!-- Replace with any icon or number -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                          <path d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                          <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z" clip-rule="evenodd" />
                        </svg>

                    </div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold">Day 27: Renewal Reminder</p>
                    </div>
                </div>
                <!-- Step 5 -->
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-teal-400 flex items-center justify-center text-white">
                        <!-- Replace with any icon or number -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                        </svg>

                    </div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold">Day 30: Subscription Renews</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <x-cta.upgrades.ielts-coach-pro />    

    <div class="container sm:mx-auto px-8 dark:prose-invert">
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">IMAGE RECOGNITION</span>
                <h2 class="text-4xl font-bold mt-4">Task One Visual Recognition</h2>
                <p class="mt-3">Submit an image with your essay submission and get accurate feedback on your Task One essay based on the image you submit.</p>
                </p>
                <p class="mt-4">Just enter an image url or upload a file.</p>
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                <img src="/images/pages/ielts/ielts writing checker task 1.png" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
        </div>

        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-8">
                <img src="/images/pages/ielts/ai ielts coach introductions.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
            <!-- Column 2 -->        
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">INTRODUCTIONS</span>
                <h2 class="text-4xl font-bold mt-4">Learn to Write Better Introductions</h2>
                <p class="mt-3">Learn how to write better introductions by rewriting the question using synonyms and practice with your AI Exam Coach.</p>
                </p>
                <p class="mt-4">Improve your Lexical Resource score and get real-time feedback every time you write an introduction.</p>
            </div>
        </div>

        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">THESIS STATEMENTS</span>
                <h2 class="text-4xl font-bold mt-4">Learn to Write High-Scoring Thesis Statements</h2>
                <p class="mt-3">The number one thing you can do to improve your essays in all 4 scoring criteria is learning how to write a good thesis statement.</p>
                </p>
                <p class="mt-4">Your AI Coach will teach you how to write a thesis statement from an essay topic and how to use it to score more points.</p>
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                <img src="/images/pages/ielts/ai ielts coach thesis statements.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
        </div>

         <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-8">
                <img src="/images/pages/ielts/ai ielts coach writing outlines.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
            <!-- Column 2 -->        
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">OUTLINES</span>
                <h2 class="text-4xl font-bold mt-4">Create Task Two Outlines</h2>
                <p class="mt-3">Learn step-by-step how to create a Task Two essay outline that will help you write essays that score more points.</p>
                </p>
                <p class="mt-4">Let your AI Coach teach you step by step how to write an essay outline that you can turn into a full essay, getting
                 real-time feedback in each step.</p>
            </div>
        </div>

        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">GET PREPARED</span>
                <h2 class="text-4xl font-bold mt-4">Complete Writing Preparation</h2>
                <p class="mt-3">Don't just check your essays. Learn how to write high-scoring essays before you check their score.</p>
                </p>
                <p class="mt-4">Take advantage of complete writing exam preparation with personalized AI feedback and coaching on your writing.</p>
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">                
                <img src="/images/pages/ielts/ai ielts coach writing feedback.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 prose prose-xl dark:prose-invert mx-auto mt-8 gap-x-8">
        <div class="col-span-1">
            <h2 class="text-2xl text-center font-medium title-font mt-5 mb-2">Write Better Essays</h2>
            <p class="leading-relaxed text-xl text-center">Your AI Coach will teach you how to write better essays. From Thesis Statements, to Body Paragraphs, you'll get customized explanations and get real-time feedback on your actual writing.</p>
        </div>
        <div class="col-span-1">
            <h2 class="text-2xl text-center font-medium title-font mt-5 mb-2">Unlimited Submissions</h2>
            <p class="leading-relaxed text-xl text-center">Submit as many completed essays as you want and get 100% customized AI feedback and correction for each one.</p>
        </div>
        <div class="col-span-1">
            <h2 class="text-2xl text-center font-medium title-font mt-5 mb-2">Create Outlines</h2>
            <p class="leading-relaxed text-xl text-center">Let your AI Coach walk you through the process of creating an outline for your essays until you master the process yourself.</p>
        </div>
    </div>

    <x-cta.upgrades.ielts-coach-pro />    

    @endif

    <div class="container mx-auto px-8 py-8 mt-6 mb-8">
    <div class="flex flex-wrap float-right justify-center items-stretch">
        <a href="{{ route('dashboard.exam-prep.pearson.writing.feedback.index', ['locale' => session('locale', 'en')])}}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-6 rounded-lg mr-4">Go to Writing Feedback</a>         
    </div>
    </div>

    <x-alerts.success />
    <x-alerts.error />
    {{-- @auth        
        <livewire:overlays.subscriptions.create />
    @endauth --}}

</div>
</x-dashboard.index>
</x-layouts.app>