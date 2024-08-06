<div>
     <!-- Essay Practice Section -->
    <div 
        x-data="{ topic: $wire.entangle('topic'), introduction: $wire.entangle('introduction'), introductionProcessing: $wire.entangle('introductionProcessing'), introductionFeedbackGenerated: $wire.entangle('introductionFeedbackGenerated'), introductionFeedback: $wire.entangle('introductionFeedback')}"
        x-transition:enter="transition ease-in duration-1000"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100">
        
        <!-- Thesis Statement Instructions Intro Section -->
        <section class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="prose prose-xl dark:prose-invert">
                        <h2>How to Rewrite an Exam Question to Score More Points in Your Intro</h2>                        
                        <p>The first paragraph you'll write for an academic essay is your <strong>introduction</strong>.</p>
                        <p>You should already have a <a href="{{ route('dashboard.essays.practice.thesis', ['locale' => session('locale')])}}">thesis statement</a> now, so now we'll wrap it in an introduction paragraph that gives the reader a good start for reading our essay.</p>
                        <p>An <strong>introduction paragraph</strong> should do <strong>3 things</strong>:</p>
                        <ol class="list-decimal list-inside font-bold">
                            <li>Introduce the topic</li>
                            <li>State your thesis statement</li>
                            <li>Give some background information</li>                            
                        </ol>
                        <p>One mistake many students make is to copy the exam question <strong><em>word for word</em></strong> into their essay.</p> 
                        <p>This is a bad idea because one of the things you're graded on is called <strong>"Lexical Range & Accuracy."</strong></p>
                        <p>That means you need to show the examiner that you can use a wide range of vocabulary and that you can use it accurately. <strong>The more ranged your vocabulary is, the more points you will score</strong>.</p>
                        <p>When taking academic writing exams, our goal is to score as many points as possible.</p>
                        <p>One way to do this is to rewrite the exam question using synonyms.</p>
                        <h3>What is a synonym?</h3>
                        <p>A <strong>synonym</strong> is a word that has the same or nearly the same meaning as another word.</p>
                        <p>For example, the word "big" is a synonym for the word "large."</p>
                        <p>This is one of the things you are tested on in the IELTS exam: <em>Can you understand when different words mean the same thing?</em></p>
                        <p>When you rewrite the exam question using synonyms, you show the examiner that you have a wide range of vocabulary and that you can use it accurately, hence <strong>scoring more points</strong>.</p>
                        <h3>Example</h3>
                        <p>Let's say the exam question is:</p>
                        <blockquote class="border-l-4 border-teal-500 bg-gray-100 text-gray-700 p-4 my-4">
                            <p>Many people believe that it is the responsibility of the government to fight against obesity.</p>
                            <p>To what extent do you agree or disagree with this statement?</p>
                        </blockquote>
                        <p>We can rewrite this question using synonyms like this:</p>
                        <blockquote class="border-l-4 border-teal-500 bg-gray-100 text-gray-700 p-4 my-4">
                            <p>It is a commonly held position that it is the government’s obligation to combat obesity.</p>                            
                        </blockquote>
                        <p>Notice that I took the words <strong>“believe”</strong>, <strong>“responsibility”</strong>, and <strong>“fight”</strong> and replaced them with synonyms.</p>
                        <p>I changed “believe (belief)” to <strong>“commonly held position”</strong>, “responsibility” to <strong>“obligation”</strong>, and “fight” to <strong>“combat.”</strong></p>
                        <h2>Try it Yourself</h2>
                        <p>Now it's your turn. Choose one of the following exam questions and rewrite it using synonyms.</p>
                        <p>When you're finished, click the "Get Feedback" button to let our AI tell you how you did.</p>                        
                    </div>
                     <div class="bg-gray-200 shadow-xl rounded-lg py-5 px-5 mb-12 mt-12">                                        
                        <div class="">
                            <label for="topic" class="block text-sm font-medium text-gray-700 leading-6">Choose a Topic</label>
                            <select id="topic" wire:model.live='topic' class="mt-2 mb-4 py-4 w-full overflow-auto block rounded-md text-gray-900 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">
                                <option value="Most artists earn low salaries and should therefore receive funding from the government in order for them to continue with their work.
                                To what extent do you agree or disagree?">
                                Government funding for artists</option>
                                <option value="Some people think that the best way to improve road safety is to increase the minimum legal age for driving a car or motorbike. To what extent do you agree or disagree?">
                                Road safety and driving age</option>
                                <option value="Some people think that the best way to reduce crime is to give longer prison sentences. Others, however, believe there are better alternative ways of reducing crime. Discuss both views and give your opinion.">
                                Prison sentences and crime reduction</option>
                                <option value="Some of the methods used in advertising are unethical and unacceptable in today’s society. To what extent do you agree with this view?">
                                Ethics of advertising methods</option>
                                <option value="The free movement of goods across national borders has long been a controversial issue. Some people argue that it is necessary for economic growth, while others claim that it damages local industries. Discuss both views and give your own opinion. You should write at least 250 words.">
                                Trade limits and economic growth</option>
                            </select>
                            <label for="topic" class="block text-sm font-medium text-gray-700 leading-6 mt-5">Essay Topic</label>
                            <p class="prose prose-xl mt-3">{{ $this->topic }}</p>        
                        </div>
                        <div>
                            <label for="introduction" class="block text-sm font-medium text-gray-700 leading-6 mt-5">Your Introduction</label>
                            <textarea id="introduction" name="introduction" wire:model='introduction' rows="3" class="mt-4 mb-4 w-full block rounded-md text-gray-900 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                        </div>
                        <div>
                            <button x-show="!introductionProcessing" wire:click="processIntroduction" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Get Feedback</button>
                            <div x-cloak x-show="introductionProcessing"><img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5"></div>
                        </div>
                    </div>
                    <div x-show='introductionFeedbackGenerated' class="prose prose-xl dark:prose-invert">
                        <h2>Feedback:</h2>                        
                        <p>{!! Str::of($this->introductionFeedback)->markdown() !!}</p>
                    </div>
                    <div>
                        <p class="prose prose-xl dark:prose-invert"><em>Repeat this exercise as many times as you like by changing your topic above and entering a new introduction.</em></p>
                    </div>
                </div>
            </div>
        </section>
</div>
