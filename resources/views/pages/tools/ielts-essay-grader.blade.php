<x-layouts.app>
  <x-slot name="title">
    IELTS Writing Checker AI Tool
  </x-slot>
  <x-slot name="description">
      The IELTS writing checker AI tool will improve your band scores for IELTS Writing Task 1 and Task 2 by giving you detailed feedback and analysis on how you can improve your essays.
  </x-slot>
<x-layouts.guest>
    <div x-data="{
            subscriptionOverlayVisible: false,
            showSubscriptionOverlay() {
            this.subscriptionOverlayVisible = true;
            $dispatch('upgrade-clicked');
            },
            exam: 'IELTS Academic',
            task: 'Task One',
            image_url: ''  
        }">
        @guest
            <!-- Guest Section -->
            <section class="bg-teal-500 py-12 px-3 md:px-0">
                <div class="text-center text-white">
                    <p class="text-3xl font-semibold mb-4">You must be logged in to use this tool.</p>
                    <p class="mb-8">Create an account or log in to submit your essays for feedback.</p>
                    <a href="/register" class="bg-white hover:bg-teal-300 text-teal-700 font-bold py-2 px-6 mr-3 rounded">Register</a>
                    <a href="/login" class="bg-teal-700 hover:bg-teal-600 text-white font-bold py-2 px-6 rounded">Log in</a>
                </div>
            </section>
        @else            
            <!-- Enhanced Subscription Section -->             
            @unless(auth()->user()->hasSubscriptionLevel(auth()->id(), 'essays'))                
                <x-cta.upgrades.exam-prep.pro />
            @endunless

        @endguest

        <!-- Essay Submission Section -->
        <section class="bg-gray-100 dark:bg-gray-900 dark:prose-invert pt-12 pb-3 px-12 sm:px-24 md:px-36 lg:px-64">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="text-gray-900 dark:text-gray-200">
                        <h1 class="mb-2 text-4xl font-bold">IELTS Writing Checker AI Tool</h1>
                        <p class="mb-6">Submit your essay and let our IELTS Writing Checker AI generate detailed analysis, feedback, and a personalized band score.</p>
                    </div>
                    <div class="bg-gray-200 shadow-xl rounded-lg py-1 px-5 mb-12 mt-12">
                        <form action="/essay-submissions/handle" method="POST">
                        @csrf
                            <!-- Hidden type filed -->
                            <input type="hidden" name="type" value="IELTS">                            

                            <div class="mt-8">
                                <label for="exam" class="block text-sm font-medium text-gray-700 leading-6">Exam</label>
                                <select id="exam" name="exam" class="mt-2 mb-4 w-full block rounded-md text-gray-900 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">
                                    <option value="IELTS Academic" {{ old('exam') === 'IELTS Academic' ? 'selected' : '' }}>IELTS Academic</option>
                                    <option value="IELTS General" {{ old('exam') === 'IELTS General' ? 'selected' : '' }}>IELTS General</option>
                                </select>        
                            </div>

                            <div class="mt-8">
                                <label for="task" class="block text-sm font-medium text-gray-700 leading-6">Task</label>
                                <select id="task" x-model="task" name="task" class="mt-2 mb-4 w-full block rounded-md text-gray-900 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">
                                    <option value="Task One" {{ old('task') === 'Task One' ? 'selected' : '' }}>Task One</option>
                                    <option value="Task Two" {{ old('task') === 'Task Two' ? 'selected' : '' }}>Task Two</option>
                                </select>        
                            </div>

                            <div x-cloak x-show="task == 'Task One' " class="mt-8"  x-data="{ image_url: '', popoverVisible: false }" @image-url-generated.window="image_url = $event.detail.imageUrl">                                                        
                                <label for="featured_image" class="block text-sm font-medium text-gray-700 leading-6">Image URL 
                                    <div class="group relative inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" @click="popoverVisible = !popoverVisible" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mb-1 inline-flex cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                        </svg>
                                        <!-- Popover element -->
                                        <div x-cloak x-show="popoverVisible" class="opacity-0 group-hover:opacity-100 absolute left-full top-0 ml-2 w-48 p-2 bg-white shadow-lg border border-gray-300 rounded-md z-10 transition-opacity duration-300 ease-in-out">
                                            <p class="text-gray-700 text-sm">Enter the <a href="https://support.google.com/websearch/answer/118238?hl=en&co=GENIE.Platform%3DDesktop">image url</a> of your Task One visual, or upload an image file below.</p>
                                        </div>
                                    </div>
                                </label>                            
                                <input type="text" name="image_url" x-bind:value="image_url" id="image_url" class="mt-2 mb-4 w-full block rounded-md text-gray-900 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">
                                @error('image_url')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror                                                    
                                <livewire:image-uploader />
                            </div>

                            <!-- Topic Input -->
                            <label for="topic" class="block text-sm font-medium text-gray-700 leading-6 mt-8">Topic</label>
                            <textarea id="topic" name="topic" rows="2" class="text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('topic') }}</textarea>
                            @error('topic')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Essay Input -->
                            <label for="essay" class="block text-sm font-medium text-gray-700 leading-6 mt-8">Essay</label>
                            <textarea id="essay" name="essay_content" rows="4" class="text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('essay') }}</textarea>
                            @error('essay')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <div class="flex justify-end mt-8 mb-4">
                                <div x-data="{ loading: false }">
                                    <button x-show="!loading" @click="loading = true" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 rounded">Submit</button>
                                    <div x-cloak x-show="loading">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>



    <section class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-24 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2><strong>A powerful AI tool to help you improve your IELTS Writing scores</strong></h2>
            <x-hero-video src="https://www.youtube.com/embed/pyTMnfBxBko?si=tt0_DuOnNj2nm-Si" />
            <img src="{{ asset('/images/pages/ielts/ielts writing essay ai feedback.png') }}" alt="ielts writing essay ai feedback" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>The <strong>#1 thing you can do to prepare</strong> for the writing section of the IELTS writing section is to <strong>take practice tests</strong>. But what good are these tests if you don't know what your scores are?</p>
            <p>You can take an IELTS preparation course, or hire a private tutor, but these options aren't possible for everyone. You might have an English-speaking friend who can check your writing, but they might not have the right experience with grading academic essays.</p>
            <p>That's why I created this IELTS writing checker tool built with AI so that <strong>you can write as many practice essays as you want</strong> and still get quality scores and feedback to help you track your progress.</p>
            <h2><strong>Discover Your Current IELTS Writing Level</strong></h2>
            <p>This AI IELTS grader tool only needs you to submit the essay topic you're writing about and the content of your essay. Then, it analyzes your writing using <strong>the same criteria as the official graders of the IELTS exam</strong>.</p>
            <p>The responses won't be exactly like the responses for the actual IELTS exam every single time, but they will be more than close enough to help you <strong>improve your IELTS essays to pass your exam</strong> the first time you take it.</p>
            <p>With each IELTS essay you submit, it will analyze everything about your essay:</p>
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
            <p>If you incorrectly used some vocabulary, it will point that out to you, and tell you the correct way to write it on your actual IELTS test. It will judge how well your sample essays match with the expected task response, as it has been trained on previous mock tests and sample essays from other IELTS students.</p>
            <h2><strong>Personalized Feedback for Improvement</strong></h2>
            <img src="{{ asset('/images/pages/ielts/save your ielts writing essay submissions.png') }}" alt="save your ielts writing essay submissions" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>Normally getting personalized feedback for this amount of IELTS essays would cost you a lot of money. But with this IELTS writing grader tool, you can get personalized feedback on your IELTS essay every single time you write one, for <strong>only $5 a month</strong>.</p>
            <p>Submit as many writing tasks as you want and get a band score and analysis of your essay, including suggestions for improving your writing and score every single time.</p>
            <p>Whether you're struggling with Task 1 or Task 2, it can help you <strong>improve all the weak points in your writing</strong> that might be holding you back on your writing task submissions.</p>
            <h2><strong>Targeted Guidance to Boost Your Score</strong></h2>
            <img src="{{ asset('/images/pages/ielts/corrected ielts essay example.png') }}" alt="corrected ielts essay example" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>While it may not be a 100% perfect replacement for an actual British Council examiner sitting at your kitchen table helping grade your essays every night, it's certainly a great tool to <strong>help you score higher on your IELTS essay</strong>.</p>
            <p>By giving targeted guidance on the points that you can improve according to the official IELTS writing rubric, you can get the higher score on your IELTS essay that you need.</p>
            <p><a href="https://weaverschool.com/blog/understanding-ielts-band-scores">The process of getting high scores on your IELTS writing section</a> takes a lot of time and practice on your part. By offering you this AI tool, I want to make sure that you get as many opportunities to get help with that hard work as you can.</p>
            <h2><strong>Efficiency and Convenience at Your Fingertips</strong></h2>
            <p><strong>You can try the IELTS essay grader tool for 7 days</strong> before your card will be charged, just so you can make sure it works for you, and to make sure you're confident about using it on your writing task practice before paying any money.</p>
            <p>I've had so many IELTS academic students tell me this helped them a ton, not only with their IELTS writing score but also with their writing skills in general.</p>
            <h2><strong>Can you Trust AI to Give Accurate IELTS Scores?</strong></h2>            
            <p>Our AI algorithm has been trained on thousands of IELTS essays, and as a result, the scores are very close to what a real examiner would give.</p>
            <p>Because Generateive AI uses a "large langauge model", it's very well suited to doing language related tasks. It can judge your Task Response, Lexical Resource, use of appropriate transition words, and give you detailed feedback and a band score.</p>
            <p>The best part is, since the IELTS criteria is all publicly available, your essay can be checked against the same criteria that the official IELTS examiners use to grade your essays.</p>
            <h2><strong>Take Control of Your IELTS Writing Journey</strong></h2>
            <img src="{{ asset('/images/pages/ielts/ielts writing score progress tracking dashboard.png') }}" alt="ielts writing score progress tracking dashboard" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>Whether you need to take the IELTS academic or the general training version of the exam, this tool can help you improve your scores. </p>
            <p>The biggest difficulty for IELTS students is usually that the essay is not all about your English skills, it's about your academic writing skills. You need to be able to write effectively, with clear and organized arguments that the examiners can easily understand. </p>
            <p>Hitting the word count, using the right vocabulary, appropriate cohesive devices, and having proper spelling, are just a few of the details you need to keep track of as you prepare for your IELTS writing exam.</p>
            <p>But if you use this AI IELTS writing grader tool, you won't have to keep track of it alone.</p>
            <p>Not only will you get personalized feedback, but <strong>you can save your essay submissions and see how your scores have changed over time</strong>. You can also look back to see the progress you've made or remind yourself of the feedback from the tool.</p>
            <p>Take advantage of the technology available and give this tool a shot to prepare for your IELTS essay. You'll be happy you did, and <strong>your future self will thank you later after you've passed your IELTS exam on your first try</strong>.</p>
        </div>
    </section>

    <section id="ielts-writing-checker-task-1" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS Writing Checker Task 1</h2>
            <p>Our IELTS Writing Checker tool provides specialized analysis for your Task 1 Essays for the IELTS exam.</p>
            <p>When you submit an essay, you will choose which task the essay is for. If you choose Task 1, you will then be asked to enter an image url for the image you wrote your essay about.</p>
            <p>Our AI will first analyze the visual in the image you provide, whether it's a chart, diagram, graph, table, or some other format. Then, it will analyze the accuracy your essay based on the visual you provided.</p>
            <p>This is crucial because on your Task One essay, you're not only scored on your use of English within the essay, but you're also graded on how well you responded to the topic, and how accurately you responded to the visual you were given, and how you represented the data.</p>
            <p>If a tool only analyzes your English use, it's missing the key components of what it should be grading in your essay.</p>
            <img src="{{ asset('/images/pages/ielts/ielts writing checker task 1.png') }}" alt="ielts writing checker task 1" class="w-full h-auto mb-8 rounded-lg mx-auto">            
            <h3>Feedback for Task 1 Essays</h3>
            <p>Just like with your Task 2 essays, our AI will give you detailed feedback and analysis of your essay. It will grade you on all four components of the IELTS Band scoring system, and give you a score for each one.</p>
            <p>While these scores are not 100% accurate, they give you solid grasp of what you're doing well already, and what you still need to work on with your IELTS writing.</p>            
        </div>
    </section>

    <section id="ielts-writing-checker-task-2" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS Writing Checker Task 2</h2>
            <p>Task Two feedback and analysis is in-depth and detailed. Sometimes almost too much. One of my struggles has been getting the AI to recognize when an essay is already good, and not giving too much feedback.</p>
            <p>With this in mind, it's good practice not to take the feedback too literally. Focus on the points the AI says you can improve, but remember, perfection is not the goal with IELTS writing.</p>
            <p>Most students struggle with writing essays in the structured format that the IELTS examiners want to see, and when aiming for higher scores, combining this with a high-level use of English.</p>
            <p>The problem for most students: you don't know what you don't know. In other words, you don't know what your essay is missing because you can't see it for yourself.</p>
            <p>Our tool takes this problem away from you, showing you all the possible ways you could improve to make an ideal essay for your topic. However, you will most likely never be able to write an essay as good as the AI can.</p>
            <p>That's why the goal is to have perfect essays, but to improve your essays in ways you can learn from, making sure you improve your essay writing skills over time.
            <img src="{{ asset('/images/pages/ielts/ielts writing checker task 2.png') }}" alt="ielts writing checker task 2" class="w-full h-auto mb-8 rounded-lg mx-auto">            
            <h3>Getting high scores on Task 2</h3>
            <p>Eventually, after using the tool for a while, you will start to recognize the areas you can improve in while you're writing your essays.</p>
            <p>With the improvement points from the AI in your mind, you'll be able to write essays in a way that satisfies the scoring criteria the first time you write it.</p>            
        </div>
    </section>

    <section id="ielts-academic" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS Academic Writing</h2>
            <p>When you submit a new essay for checking, you will choose if you're taking IELTS Academic or IELTS General.</p>
            <p>If you choose IELTS Academic, your essay will be graded based on the academic criteria, which are different from the General criteria.</p>
            <p>This makes sure you're writing essays that meet the scoring requirements of your specific exam, and make sure you score the highest possible band score.</p>
            
        </div>
    </section>

    <section id="ielts-general" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS General Writing</h2>
            <p>If you choose IELTS General as your exam, your essays will be graded based on the General criteria, which are different from the Academic criteria.</p>
            <p>The general essays are a bit simpler, and more straightforward than academic essays. Because of this, your AI feedback will be more focused on your general use of English,
            rather than you're academic writing skills.</p>
            <p>This is helpful to you if you're a general test taker, because you don't need to waste time improving all the points of feedback you would get for the academic exam.</p>            
        </div>
    </section>

    <section class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>Mastering IELTS Writing: Strategies for Success</h2>
            <p>The <strong>IELTS Writing</strong> section is a key part of the <a href="https://ielts.org/about-ielts">International English Language Testing System (IELTS)</a> and is designed to assess a wide range of writing skills. The writing section is divided into two tasks: Task 1, which requires candidates to describe a chart, graph, or diagram, and Task 2, which is an essay response to an argument or problem. Here's how to approach each task to achieve a high score:</p>
            <ul>
                <li><strong>Task Diversity:</strong> Task 1 and Task 2 require distinctly different styles of writing. Task 1 focuses on the ability to organize, present and possibly compare data. Task 2 assesses the ability to construct a clear, relevant argument on a given topic.</li>
                <li><strong>Global Recognition:</strong> Success in the IELTS Writing tasks is crucial for academic and professional opportunities worldwide, as this test is widely recognized by educational institutions, employers, and government immigration agencies.</li>
            </ul>
            <h3>Focus Areas for Each IELTS Writing Task</h3>
            <p>To excel in the IELTS Writing tasks, candidates should concentrate on the following areas:</p>
            <ul>
                <li><strong>Coherence and Cohesion:</strong> Essays and reports should be well-organized with clear, logical progression using cohesive devices such as linking words, pronouns and conjunctions.</li>
                <li><strong>Task Response and Relevance:</strong> Responses must directly address the prompts. In Task 1, this means accurately summarizing and comparing data as needed. In Task 2, it involves developing a relevant argument that addresses all parts of the prompt.</li>
                <li><strong>Lexical Resource:</strong> A wide range of vocabulary needs to be used correctly and appropriately. For both tasks, the ability to paraphrase and avoid repetition by employing synonyms effectively is crucial.</li>
                <li><strong>Grammatical Range and Accuracy:</strong> Demonstrating control over grammatical structures with accurate usage is essential. Complex sentence structures should be used flexibly and accurately.</li>
                <li><strong>Planning and Review:</strong> Time management is critical, allowing enough time to plan responses, write them out, and review for any possible errors or improvements. This planning ensures that writing remains on topic and maintains a high standard throughout.</li>
            </ul>
            <p>The IELTS Writing section demands thorough preparation and a strategic approach to writing. By focusing on these key areas, candidates can significantly enhance their performance and increase their overall band score.</p>
        </div>
    </section>

    <section class="dark:bg-gray-900 py-12">
    <div class="bg-teal-700 text-white py-12 rounded-xl mx-5 md:mx-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
                Frequently Asked Questions
            </h2>
            <div class="mt-6 pt-6">
                <dl class="md:grid md:grid-cols-2 md:gap-8">
                    <div class="pr-10">
                        <dt class="text-lg leading-6 font-bold">
                            How does the IELTS Writing Checker AI Tool work?
                        </dt>
                        <dd class="mt-2 mb-4 text-base">
                            Our AI analyzes your essays based on IELTS criteria including grammar, vocabulary, and coherence, providing scores and actionable feedback to help improve your writing skills.
                        </dd>
                    </div>                                     
                    <div>
                        <dt class="text-lg leading-6 font-bold">
                            How soon will I receive feedback on my essays?
                        </dt>
                        <dd class="mt-2 mb-4 text-base">
                            It takes between 30 seconds and one minute for the AI to analyze your essay and provide feedback and scores.
                        </dd>
                    </div>
                    <div>
                        <dt class="text-lg leading-6 font-bold">
                            How much does the tool cost?
                        </dt>
                        <dd class="mt-2 mb-4 text-base">
                            The tool costs $5 per month, and you can cancel with two clicks.
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="flex mt-5">
                <a href="/register" class="bg-white text-teal-700 font-bold text-xl px-5 py-2 rounded-lg hover:bg-teal-300 mx-auto">Register</a>
            </div>
        </div>
    </div>
    </section>

    <x-alerts.success />
    <x-alerts.error />    

    </div>
</x-layouts.guest>
</x-layouts.app>
