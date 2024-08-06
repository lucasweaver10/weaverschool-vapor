<x-layouts.app>      
    <x-slot name="title">
        AI IELTS Speaking Coach from the Weaver School
    </x-slot>
    <x-slot name="description">
        Get your personal AI IELTS Speaking Coach to easily pass your IELTS Speaking Exam. Take IELTS Speaking practice tests and let our AI check your responses and give you scores and feedback.
    </x-slot>
<x-layouts.guest>
<main>
    <!-- hero -->
<div class="bg-gray-900 pt-20 pb-16 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-gray-100 sm:text-7xl">
        Pass your IELTS Speaking exam easily with your personal
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
            <span class="relative">AI IELTS Speaking Coach</span>
        </span>
        
    </h1>
    <p class="mx-auto mt-10 mb-2 max-w-4xl text-2xl tracking-tight text-slate-200">
        Prepare for your IETLS Speaking section with your personal AI IELTS speaking checker.
    </p>
    <x-hero-video src="https://www.youtube.com/embed/kOrzl9HzWWE?si=K64_1g2nzKAmvGnJ"/>
    {{-- <img class="w-2/3 sm:w-2/3 h-auto mx-auto my-16 rounded-xl shadow-xl border border-gray-700" src="/images/pages/learning-paths/language-learning-paths-index.jpg" alt="language learning paths for customized language learning"></img> --}}
    <div class="mt-12 flex justify-center gap-x-6 sm:gap-x-8">
        <a href="{{ route('exam-prep.ielts-coach.speaking.index', ['locale' => session('locale', 'en')]) }}" role="button" class="bg-violet-500 hover:bg-violet-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">View Tests</a>
        <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.index', ['locale' => session('locale', 'en')]) }}" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">Try Now</a>
        {{-- <a href="{{ route('trial-subscription-checkout', ['type' => 'pro', 'id' => '5001']) }}"
            class="bg-teal-500 hover:bg-teal-600 py-3 px-4 rounded-lg text-2xl font-semibold text-white transform hover:scale-110 transition duration-150 ease-in-out">
            Start Trial
        </a> --}}
        {{-- <button @click="showModal = true" role="button" class="bg-teal-200 hover:bg-teal-300 py-3 px-4 rounded-lg text-2xl font-semibold text-teal-900 transform hover:scale-110 transition duration-150 ease-in-out">Join Waiting List</a> --}}
        @guest
        {{-- <a href="/register" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">Try Free</a> --}}
        @else
        {{-- <a href="/flashcards/sets" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">Try Now</a> --}}
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

    <!-- Speaking text content section -->
    <section class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-24 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2><strong>A Powerful AI Tool to Help You Improve Your IELTS Speaking Scores</strong></h2>
            <img src="/images/pages/ielts/ielts speaking coach take test.jpg" alt="IELTS speaking feedback" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>The <strong>#1 thing you can do to prepare</strong> for the speaking section of the IELTS exam is to <strong>take practice tests</strong>. But what good are these tests if you don't know what your scores are?</p>
            <p>You can take an IELTS preparation course or hire a private tutor, but these options aren't possible for everyone. You might have an English-speaking friend who can check your speaking, but they might not have the right experience with grading IELTS speaking tests.</p>
            <p>That's why I created this AI IELTS Speaking Coach tool, so that <strong>you can practice as many speaking tasks as you want</strong> and still get quality scores and feedback to help you track your progress.</p>
            <h2><strong>Discover Your Current IELTS Speaking Level</strong></h2>
            <p>This AI IELTS Speaking Coach tool only needs you to submit your spoken responses. Then, it analyzes your speaking using <strong>the same criteria as the official graders of the IELTS exam</strong>.</p>
            <p>The responses won't be exactly like the responses for the actual IELTS exam every single time, but they will be more than close enough to help you <strong>improve your speaking to pass your exam</strong> the first time you take it.</p>
            <p>With each IELTS speaking practice test you submit, it will analyze everything about your speaking:</p>
            <ul>
                <li><p>pronunciation</p></li>
                <li><p>fluency and coherence</p></li>
                <li><p>lexical resource</p></li>
                <li><p>grammatical range and accuracy</p></li>
            </ul>
            <p>It will also tell you how well-organized your responses are, and what you can do to improve them.</p>
            <p>If you incorrectly use some vocabulary, it will point that out to you and tell you the correct way to say it in your actual IELTS test. It will judge how well your sample responses match the expected task response, as it has been trained on previous mock tests and sample responses from other IELTS students.</p>
            <h2><strong>Personalized Feedback for Improvement</strong></h2>
            <img src="/images/pages/ielts/ielts speaking coach questions.jpg" alt="Save your IELTS speaking practice" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>Normally, getting personalized feedback for this amount of IELTS speaking practice would cost you a lot of money. But with this IELTS Speaking Coach tool, you can get personalized feedback on your speaking tasks every single time you practice, for <strong>only $5 a month</strong>.</p>
            <p>Submit as many speaking tasks as you want and get a band score and analysis of your responses, including suggestions for improving your speaking and score every single time.</p>
            <p>Whether you're struggling with part 1, part 2, or part 3 of the speaking test, it can help you <strong>improve all the weak points in your speaking</strong> that might be holding you back on your speaking test.</p>
            <h2><strong>Targeted Guidance to Boost Your Score</strong></h2>
            <img src="/images/pages/ielts/ielts speaking coach sentence overview.jpg" alt="Corrected IELTS speaking example" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>While it may not be a 100% perfect replacement for an actual British Council examiner sitting with you, it's certainly a great tool to <strong>help you score higher on your IELTS speaking test</strong>.</p>
            <p>By giving targeted guidance on the points that you can improve according to the official IELTS speaking rubric, you can get the higher score on your IELTS speaking test that you need.</p>
            <p><a href="https://weaverschool.com/blog/understanding-ielts-band-scores">The process of getting high scores on your IELTS speaking section</a> takes a lot of time and practice on your part. By offering you this AI tool, I want to make sure that you get as many opportunities to get help with that hard work as you can.</p>
            <h2><strong>Efficiency and Convenience at Your Fingertips</strong></h2>
            <p><strong>You can try the IELTS Speaking Coach tool for 7 days</strong> before your card will be charged, just so you can make sure it works for you, and to make sure you're confident about using it on your speaking practice before paying any money.</p>
            <p>I've had so many IELTS academic students tell me this helped them a ton, not only with their IELTS speaking score but also with their overall speaking skills in English.</p>
            <h2><strong>Can You Trust AI to Give Accurate IELTS Scores?</strong></h2>            
            <p>Our AI algorithm has been trained on thousands of IELTS speaking responses, and as a result, the scores are very close to what a real examiner would give.</p>
            <p>Because Generative AI uses a "large language model," it's very well suited to doing language-related tasks. It can judge your Fluency and Coherence, Lexical Resource, Pronunciation, and Grammatical Range and Accuracy, giving you detailed feedback and a band score.</p>
            <p>The best part is, since the IELTS criteria are all publicly available, your responses can be checked against the same criteria that the official IELTS examiners use to grade your speaking tests.</p>
            <h2><strong>Take Control of Your IELTS Speaking Journey</strong></h2>
            <img src="/images/pages/ielts/ielts speaking coach word breakdown.jpg" alt="IELTS speaking score progress tracking" class="w-full h-auto mb-8 rounded-lg mx-auto">
            <p>Whether you need to take the IELTS academic or the general training version of the exam, this tool can help you improve your scores. </p>
            <p>The biggest difficulty for IELTS students is usually that the speaking test is not all about your English skills; it's about your ability to communicate effectively in English. You need to be able to speak clearly, with well-organized thoughts that the examiners can easily understand.</p>
            <p>Using the right vocabulary, appropriate cohesive devices, and having proper pronunciation are just a few of the details you need to keep track of as you prepare for your IELTS speaking exam.</p>
            <p>But if you use this AI IELTS Speaking Coach tool, you won't have to keep track of it alone.</p>
            <p>Not only will you get personalized feedback, but <strong>you can save your speaking submissions and see how your scores have changed over time</strong>. You can also look back to see the progress you've made or remind yourself of the feedback from the tool.</p>
            <p>Take advantage of the technology available and give this tool a shot to prepare for your IELTS speaking test. You'll be happy you did, and <strong>your future self will thank you later after you've passed your IELTS exam on your first try</strong>.</p>
        </div>
    </section>

    <section id="ielts-speaking-checker-part-1" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS Speaking Checker Part 1</h2>
            <p>Our IELTS Speaking Checker tool provides specialized analysis for your Part 1 responses for the IELTS exam.</p>
            <p>When you submit a response, you will choose which part of the speaking test the response is for. If you choose Part 1, you will then be asked to provide your spoken answer.</p>
            <p>Our AI will analyze your spoken response based on the criteria used by official IELTS examiners. It will grade your pronunciation, fluency, coherence, lexical resource, and grammatical range and accuracy.</p>
            <img src="/images/pages/ielts/ielts speaking coach questions.jpg" alt="IELTS speaking checker part 1" class="w-full h-auto mb-8 rounded-lg mx-auto">            
            <h3>Feedback for Part 1 Responses</h3>
            <p>Just like with your Part 2 and Part 3 responses, our AI will give you detailed feedback and analysis of your speaking. It will grade you on all four components of the IELTS band scoring system and give you a score for each one.</p>
            <p>While these scores are not 100% accurate, they give you a solid grasp of what you're doing well already and what you still need to work on with your IELTS speaking.</p>            
        </div>
    </section>

    <section id="ielts-speaking-checker-part-2" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS Speaking Checker Part 2</h2>
            <p>Part 2 feedback and analysis is in-depth and detailed. Sometimes almost too much. One of my struggles has been getting the AI to recognize when a response is already good and not giving too much feedback.</p>
            <p>With this in mind, it's good practice not to take the feedback too literally. Focus on the points the AI says you can improve, but remember, perfection is not the goal with IELTS speaking.</p>
            <p>Most students struggle with giving structured and detailed responses in the format that the IELTS examiners want to see, and when aiming for higher scores, combining this with a high-level use of English.</p>
            <p>The problem for most students: you don't know what you don't know. In other words, you don't know what your response is missing because you can't see it for yourself.</p>
            <p>Our tool takes this problem away from you, showing you all the possible ways you could improve to make an ideal response for your topic. However, you will most likely never be able to give a response as good as the AI can.</p>
            <p>That's why the goal is not to have perfect responses but to improve your speaking in ways you can learn from, making sure you improve your speaking skills over time.</p>
            <img src="/images/pages/ielts/ielts speaking coach take test.jpg" alt="IELTS speaking checker part 2" class="w-full h-auto mb-8 rounded-lg mx-auto">            
            <h3>Getting High Scores on Part 2</h3>
            <p>Eventually, after using the tool for a while, you will start to recognize the areas you can improve in while you're giving your responses.</p>
            <p>With the improvement points from the AI in your mind, you'll be able to give responses in a way that satisfies the scoring criteria the first time you speak.</p>            
        </div>
    </section>

    <section id="ielts-speaking-checker-part-3" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS Speaking Checker Part 3</h2>
            <p>Part 3 feedback and analysis is in-depth and detailed. Sometimes almost too much. One of my struggles has been getting the AI to recognize when a response is already good and not giving too much feedback.</p>
            <p>With this in mind, it's good practice not to take the feedback too literally. Focus on the points the AI says you can improve, but remember, perfection is not the goal with IELTS speaking.</p>
            <p>Most students struggle with giving structured and detailed responses in the format that the IELTS examiners want to see, and when aiming for higher scores, combining this with a high-level use of English.</p>
            <p>The problem for most students: you don't know what you don't know. In other words, you don't know what your response is missing because you can't see it for yourself.</p>
            <p>Our tool takes this problem away from you, showing you all the possible ways you could improve to make an ideal response for your topic. However, you will most likely never be able to give a response as good as the AI can.</p>
            <p>That's why the goal is not to have perfect responses but to improve your speaking in ways you can learn from, making sure you improve your speaking skills over time.</p>
            <img src="/images/pages/ielts/ielts speaking coach sentence overview.jpg" alt="IELTS speaking checker part 3" class="w-full h-auto mb-8 rounded-lg mx-auto">            
            <h3>Getting High Scores on Part 3</h3>
            <p>Eventually, after using the tool for a while, you will start to recognize the areas you can improve in while you're giving your responses.</p>
            <p>With the improvement points from the AI in your mind, you'll be able to give responses in a way that satisfies the scoring criteria the first time you speak.</p>            
        </div>
    </section>

    <section id="ielts-academic-speaking" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS Academic Speaking</h2>
            <p>When you submit a new speaking task for checking, you will choose if you're taking IELTS Academic or IELTS General.</p>
            <p>If you choose IELTS Academic, your responses will be graded based on the academic criteria, which are different from the General criteria.</p>
            <p>This makes sure you're giving responses that meet the scoring requirements of your specific exam, ensuring you score the highest possible band score.</p>
        </div>
    </section>

    <section id="ielts-general-speaking" class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>IELTS General Speaking</h2>
            <p>If you choose IELTS General as your exam, your responses will be graded based on the General criteria, which are different from the Academic criteria.</p>
            <p>The general responses are a bit simpler and more straightforward than academic responses. Because of this, your AI feedback will be more focused on your general use of English,
            rather than your academic speaking skills.</p>
            <p>This is helpful to you if you're a general test taker, because you don't need to waste time improving all the points of feedback you would get for the academic exam.</p>            
        </div>
    </section>

    <section class="flex dark:bg-gray-900">
        <div class="px-12 mx-auto mt-12 mb-12 prose prose-xl dark:prose-invert w-full">
            <h2>Mastering IELTS Speaking: Strategies for Success</h2>
            <p>The <strong>IELTS Speaking</strong> section is a key part of the <a href="https://ielts.org/about-ielts">International English Language Testing System (IELTS)</a> and is designed to assess a wide range of speaking skills. The speaking section is divided into three parts: Part 1, which requires candidates to answer questions about themselves; Part 2, which requires candidates to speak about a given topic; and Part 3, which is a discussion with the examiner about the topic from Part 2. Here's how to approach each part to achieve a high score:</p>
            <ul>
                <li><strong>Task Diversity:</strong> Part 1, Part 2, and Part 3 require distinctly different styles of speaking. Part 1 focuses on personal information and experiences. Part 2 assesses the ability to speak at length on a given topic. Part 3 involves a more abstract discussion related to the topic in Part 2.</li>
                <li><strong>Global Recognition:</strong> Success in the IELTS Speaking tasks is crucial for academic and professional opportunities worldwide, as this test is widely recognized by educational institutions, employers, and government immigration agencies.</li>
            </ul>
            <h3>Focus Areas for Each IELTS Speaking Task</h3>
            <p>To excel in the IELTS Speaking tasks, candidates should concentrate on the following areas:</p>
            <ul>
                <li><strong>Fluency and Coherence:</strong> Responses should be well-organized with clear, logical progression using cohesive devices such as linking words, pronouns, and conjunctions.</li>
                <li><strong>Task Response and Relevance:</strong> Responses must directly address the prompts. In Part 1, this means answering questions about yourself accurately. In Part 2, it involves developing a relevant monologue that addresses all parts of the prompt. In Part 3, it involves engaging in a discussion that extends the topic from Part 2.</li>
                <li><strong>Lexical Resource:</strong> A wide range of vocabulary needs to be used correctly and appropriately. For all parts, the ability to paraphrase and avoid repetition by employing synonyms effectively is crucial.</li>
                <li><strong>Grammatical Range and Accuracy:</strong> Demonstrating control over grammatical structures with accurate usage is essential. Complex sentence structures should be used flexibly and accurately.</li>
                <li><strong>Pronunciation:</strong> Clear pronunciation with accurate intonation and stress patterns is crucial for effective communication.</li>
            </ul>
            <p>The IELTS Speaking section demands thorough preparation and a strategic approach to speaking. By focusing on these key areas, candidates can significantly enhance their performance and increase their overall band score.</p>
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
                                How does the IELTS Speaking Coach AI Tool work?
                            </dt>
                            <dd class="mt-2 mb-4 text-base">
                                Our AI analyzes your spoken responses based on IELTS criteria including pronunciation, fluency, coherence, lexical resource, and grammatical range and accuracy, providing scores and actionable feedback to help improve your speaking skills.
                            </dd>
                        </div>                                     
                        <div>
                            <dt class="text-lg leading-6 font-bold">
                                How soon will I receive feedback on my responses?
                            </dt>
                            <dd class="mt-2 mb-4 text-base">
                                It takes between 30 seconds and one minute for the AI to analyze your response and provide feedback and scores.
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
    <!-- End speaking text section -->
        

    <!-- Pricing block -->
    <section id="pricing" aria-label="Pricing" class="bg-gray-900 py-16 sm:py-32 px-8 sm:px-0">
        <div class="md:text-center">
            <h2 class="font-display text-3xl tracking-tight text-white sm:text-5xl">
            <span class="relative whitespace-nowrap">
                <svg aria-hidden="true" viewBox="0 0 281 40" class="absolute top-1/2 left-0 h-[1em] w-full fill-teal-400">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M240.172 22.994c-8.007 1.246-15.477 2.23-31.26
                    4.114-18.506 2.21-26.323 2.977-34.487 3.386-2.971.149-3.727.324-6.566 1.523-15.124 6.388-43.775 9.404-69.425
                    7.31-26.207-2.14-50.986-7.103-78-15.624C10.912 20.7.988 16.143.734 14.657c-.066-.381.043-.344 1.324.456
                    10.423 6.506 49.649 16.322 77.8 19.468 23.708 2.65 38.249 2.95 55.821 1.156 9.407-.962 24.451-3.773
                    25.101-4.692.074-.104.053-.155-.058-.135-1.062.195-13.863-.271-18.848-.687-16.681-1.389-28.722-4.345-38.142-9.364-15.294-8.15-7.298-19.232 14.802-20.514
                    16.095-.934 32.793 1.517 47.423 6.96 13.524 5.033 17.942 12.326 11.463 18.922l-.859.874.697-.006c2.681-.026 15.304-1.302 29.208-2.953
                    25.845-3.07 35.659-4.519 54.027-7.978 9.863-1.858 11.021-2.048 13.055-2.145a61.901 61.901 0 0 0 4.506-.417c1.891-.259
                    2.151-.267 1.543-.047-.402.145-2.33.913-4.285 1.707-4.635 1.882-5.202 2.07-8.736 2.903-3.414.805-19.773
                    3.797-26.404 4.829Zm40.321-9.93c.1-.066.231-.085.29-.041.059.043-.024.096-.183.119-.177.024-.219-.007-.107-.079ZM172.299 26.22c9.364-6.058
                    5.161-12.039-12.304-17.51-11.656-3.653-23.145-5.47-35.243-5.576-22.552-.198-33.577 7.462-21.321 14.814 12.012 7.205 32.994
                    10.557 61.531 9.831 4.563-.116 5.372-.288 7.337-1.559Z" />
                </svg>
                <span class="relative">Simple pricing,</span>
            </span>
                ${{ $product->prices->where('type', 'Recurring')->first()->amount }}/month               
            </h2>
            <p class="mt-4 text-xl text-white">Try free for 7 days and then just ${{ $product->prices->where('type', 'Recurring')->first()->amount }}/month after that.</p>
        </div>
        <div class="sm:mt-16 grid max-w-2xl grid-cols-1 gap-y-10 mx-8 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-3
        xl:mx-0 xl:gap-x-8">
            <section class="md:col-span-1"></section>
            <section class="md:col-span-1 rounded-3xl px-6 sm:px-8 bg-white py-8 lg:order-none">
                <h3 class="mt-2 font-bold text-2xl text-gray-900">Monthly</h3>
                <p class="mt-2 mb-4 text-base text-gray-900">${{ $product->prices->where('type', 'Recurring')->first()->amount }}/month for 20 essay submissions and 5 speaking test submissions per month.</p>
                <p class="order-first font-display text-5xl font-light tracking-tight text-gray-900">${{ $product->prices->where('type', 'Recurring')->first()->amount }} @unless(session('locale') == 'en' || session('locale') == 'en-US')<span class="text-4xl">(~@lang('currency.symbol'){{ $product->prices->where('type', 'Recurring')->first()->localized_amount }})</span>@endunless</p>
                <ul role="list" class="order-last mt-10 flex flex-col gap-y-3 text-sm text-gray-900">
                    <li class="flex">
                        <svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-gray-900">
                            <path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0
                            0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5
                            1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                  stroke-width="0"></path>
                            <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></circle>
                        </svg>
                        <span class="ml-4">20 Essay Submissions</span>
                    </li>
                    <li class="flex">
                        <svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-gray-900">
                            <path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0
                            0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5
                            1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                  stroke-width="0"></path>
                            <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></circle>
                        </svg>
                        <span class="ml-4">5 Speaking Test Submissions</span>
                    </li>
                    <!-- Additional list items go here -->
                </ul>
                @guest
                <a href="{{ route('trial-subscription-checkout', ['type' => 'pro', 'id' => '5001' ]) }}" class="mt-8 inline-block px-6 py-3 bg-teal-300 text-gray-900 hover:text-white font-medium rounded-md
                hover:bg-teal-500" aria-label="Get started with the Starter plan for $9">Start trial</a>
                @else
                <a href="{{ route('trial-subscription-checkout', ['type' => 'pro', 'id' => '5001' ]) }}" class="mt-8 inline-block px-6 py-3 bg-teal-300 text-gray-900 hover:text-white font-medium rounded-md
                hover:bg-teal-500" aria-label="Get started with the Starter plan for $9">Start trial</a>
                @endguest
            </section>
            <section class="col-span-1"></section>
            <!-- Additional plan sections go here -->
        </div>
    </section>
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
