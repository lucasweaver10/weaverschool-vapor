<div
    x-data="{
        thesis: $wire.thesis,
        thesisSaved: $wire.entangle('thesisSaved'),
        thesisReason1: $wire.entangle('thesisReason1'),
        thesisReason2: $wire.entangle('thesisReason2'),
        thesisReasonsSaved: $wire.entangle('thesisReasonsSaved'),
        thesisReasonsFeedback: $wire.entangle('thesisReasonsFeedback'),
        thesisReasonsFeedbackGenerating: $wire.entangle('thesisReasonsFeedbackGenerating'),
        thesisReasonsFeedbackGenerated: $wire.entangle('thesisReasonsFeedbackGenerated'),
        topicSentence1InstructionGenerating: $wire.entangle('topicSentence1InstructionGenerating'),         
        topicSentence1InstructionGenerated: $wire.entangle('topicSentence1InstructionGenerated'),
        topicSentence1Instruction: $wire.entangle('topicSentence1Instruction'),
        topicSentence1: $wire.entangle('topicSentence1'),
        topicSentence1Feedback: $wire.entangle('topicSentence1Feedback'),
        topicSentence1FeedbackGenerating: $wire.entangle('topicSentence1FeedbackGenerating'), 
        topicSentence1FeedbackGenerated: $wire.entangle('topicSentence1FeedbackGenerated'),
        topicSentence1Saved: $wire.entangle('topicSentence1Saved'),
        topicSentence2InstructionGenerating: $wire.entangle('topicSentence2InstructionGenerating'),        
        topicSentence2InstructionGenerated: $wire.entangle('topicSentence2InstructionGenerated'),
        topicSentence2Instruction: $wire.entangle('topicSentence2Instruction'),
        topicSentence2: $wire.entangle('topicSentence2'),
        topicSentence2Feedback: $wire.entangle('topicSentence2Feedback'),
        topicSentence2FeedbackGenerating: $wire.entangle('topicSentence2FeedbackGenerating'), 
        topicSentence2FeedbackGenerated: $wire.entangle('topicSentence2FeedbackGenerated'),
        topicSentence2Saved: $wire.entangle('topicSentence2Saved'),
        topic1Reason1: $wire.entangle('topic1Reason1'),
        topic1Reason2: $wire.entangle('topic1Reason2'),
        topic1ReasonsFeedback: $wire.entangle('topic1ReasonsFeedback'),
        topic1ReasonsFeedbackGenerating: $wire.entangle('topic1ReasonsFeedbackGenerating'),
        topic1ReasonsFeedbackGenerated: $wire.entangle('topic1ReasonsFeedbackGenerated'),
        topic1ReasonsSaved: $wire.entangle('topic1ReasonsSaved'),
        topic1ExampleInstructionsGenerating: $wire.entangle('topic1ExampleInstructionsGenerating'),
        topic1ExampleInstructions: $wire.entangle('topic1ExampleInstructions'),
        topic1ExampleInstructionsGenerated: $wire.entangle('topic1ExampleInstructionsGenerated'),
        topic1Example: $wire.entangle('topic1Example'),
        topic1ExampleSaved: $wire.entangle('topic1ExampleSaved'),
        topic1ExampleFeedback: $wire.entangle('topic1ExampleFeedback'),
        topic1ExampleFeedbackGenerating: $wire.entangle('topic1ExampleFeedbackGenerating'),
        topic1ExampleFeedbackGenerated: $wire.entangle('topic1ExampleFeedbackGenerated'),
        topic2Reason1: $wire.entangle('topic2Reason1'),
        topic2Reason2: $wire.entangle('topic2Reason2'),
        topic2ReasonsFeedback: $wire.entangle('topic2ReasonsFeedback'),
        topic2ReasonsFeedbackGenerating: $wire.entangle('topic2ReasonsFeedbackGenerating'),
        topic2ReasonsFeedbackGenerated: $wire.entangle('topic2ReasonsFeedbackGenerated'),
        topic2ReasonsSaved: $wire.entangle('topic2ReasonsSaved'),        
        topic2Example: $wire.entangle('topic2Example'),
        topic2ExampleSaved: $wire.entangle('topic2ExampleSaved'),
        topic2ExampleFeedback: $wire.entangle('topic2ExampleFeedback'),
        topic2ExampleFeedbackGenerating: $wire.entangle('topic2ExampleFeedbackGenerating'),
        topic2ExampleFeedbackGenerated: $wire.entangle('topic2ExampleFeedbackGenerated'),
    }"

    class="prose prose-2xl dark:prose-invert"
>
    
    <!-- Thesis Statement Input -->
    <div x-cloak x-show="!thesisSaved" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">                 
            <div class="col-span-1">
                <div class="">                        
                    <h3 class=""><strong>Thesis Statement</strong></h3>
                    <p class="">In the text area below, enter the thesis statement you want to create an outline from.</p>                    
                    <!-- Essay Input -->
                    <label for="thesis" class="block text-sm font-medium leading-6">Thesis Statement</label>
                    <textarea id="thesis" wire:model='thesis' rows="4" class="mt-2 mb-4 w-full block rounded-md text-lg text-gray-900 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                    {{-- @error('thesis')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}
                    <!-- Submit Button -->
                    <button type="button" wire:click='saveThesis' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Save</button>
                </div>                                   
            </div>
        </div>
    </div>            
    
    <!-- Thesis Statement Instructions Intro Section -->
    <div x-cloak x-show="thesisSaved" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <h2 class="prose dark:prose-invert">How to Create an Academic Essay Outline</h2>                        
                    <p class="">Now that you've written your thesis statement, it's time to create an <strong>outline</strong> that will help you write the rest of your paper.</p>
                    <p class="">An outline is a direct and clear <strong>map of your essay</strong>. 
                    It shows what each paragraph will contain, in what order paragraphs will appear, and how all the points fit together as a whole. </p>
                    <p class="">To start, we need to come up with two reasons to support the stance we take in our thesis statement. We'll use these reasons to create our body paragraphs.</p>                    
                </div>
            </div>
        </div>
    </div>

    <!-- Thesis statement section -->    
    <div x-cloak x-show="thesisSaved" class="mt-4 mb-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                        
                    <p class=""><strong>Your Thesis Statement:</strong></p>
                    <p class="p-5 rounded-lg bg-gray-200 text-gray-900"><em>{{ $this->thesis }}</em></p>                                            
                </div>
            </div>
        </div>
    </div>

    <div x-cloak x-show="thesisSaved" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="mt-8">
                    <h3>Thesis Statement Supporting Reasons</h3>
                    <!-- Thesis reasons inputs -->
                    <div x-cloak x-show="!thesisReasonsSaved" class="">
                        <p class="">Come up with two reasons to support your thesis statement and enter them below:</p>                        
                        <!-- Thesis Reason #1 Input -->
                        <label for="thesisReason1" class="block text-sm font-medium leading-6">Reason #1</label>
                        <textarea id="thesisReason1" wire:model="thesisReason1" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                        {{-- @error('thesisReason1')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror --}}

                        <!-- Thesis Reason #2 Input -->
                        <label for="thesisReason2" class="block text-sm font-medium leading-6">Reason #2</label>
                        <textarea id="thesisReason2" wire:model="thesisReason2" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                        {{-- @error('thesisReason2')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror                           --}}

                        <!-- Submit Button -->
                        <div>
                            <button type="button" x-show="!thesisReasonsSaved" wire:click="saveThesisReasons" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Save</button>
                            {{-- <div x-cloak x-show="topicAndTypeProcessing"><img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5"></div> --}}
                        </div>
                    </div>
                    <!-- Saved Thesis reasons -->
                    <div x-cloak x-show="thesisReasonsSaved" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">                        
                        <div class="mb-4"><em>1. {{ $this->thesisReason1 }}</em></div>
                        <div class="mb-4"><em>2. {{ $this->thesisReason2 }}</em></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thesis Reasons Feedback Instructions Section -->
    <div x-cloak x-show="thesisReasonsSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <h4>Making sure they support the thesis statement</h4>
                    <p>Now that you've written your reasons, we need to make sure they directly support your thesis statement.</p> 
                    <p>If they don't, you may need to revise your thesis statement or reasons.</p>
                    <p>Click the button below to let AI check your reasons against your thesis statement.</p>
                    <button type="button" x-show="!thesisReasonsFeedbackGenerating && !thesisReasonsFeedbackGenerated" wire:click='generateThesisReasonsFeedback' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Thesis Reasons Feedback -->
    <div x-cloak x-show="thesisReasonsFeedback || thesisReasonsFeedbackGenerating" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                        
                    <p class=""><strong>Feedback:</strong></p>
                    <div x-cloak x-show="thesisReasonsFeedback" class="">{!! Str::of($this->thesisReasonsFeedback)->markdown() !!}</div>                    
                    <div x-cloak x-show="thesisReasonsFeedbackGenerating" class="">Please wait while your instructions are generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </div>

    <!-- Thesis Reasons Feedback Instructions Section -->
    <section x-cloak x-show="thesisReasonsFeedbackGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <h3>Turning reasons into topic sentences</h3>
                    <p>Now that you have reasons that directly support your thesis statement, we need to turn them into <strong>topic sentences</strong>
                    so that we can repeat the same steps we just took to create body paragraphs.</p>
                    <h4>What is a topic sentence?</h4>
                    <p>Topic sentences reveal the <em><strong>main point of a paragraph</strong></em>. They show the relationship of each paragraph to the essay's thesis, 
                     and tell your reader what to expect in the paragraph that follows.</p>
                    <p>Topic sentences also make it clear right away <strong>why the points they're making are important to the essay's main ideas</strong>.</p>                     
                    <p>Click the button below to let AI walk you through the process of creating topic sentences for your body paragraphs using your two reasons above.</p>
                    <button type="button" x-show="!topicSentence1InstructionGenerating && !topicSentence1InstructionGenerated" wire:click='generateTopicSentence1Instruction' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Instructions</button>
                </div>
            </div>
            <div x-cloak x-show="topicSentence1InstructionGenerating || topicSentence1Instruction" class="col-span-1">
                <div class="">                        
                    <p class=""><strong>Topic Sentence 1 Instructions:</strong></p>
                    <div x-cloak x-show="topicSentence1Instruction" class="">{!! Str::of($this->topicSentence1Instruction)->markdown() !!}</div>                    
                    <div x-cloak x-show="topicSentence1InstructionGenerating" class="">Please wait while your instructions are generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 1 -->
    <section x-cloak x-show="topicSentence1InstructionGenerated" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div x-cloak x-show="!topicSentence1FeedbackGenerating && !topicSentence1FeedbackGenerated" class="col-span-1">
                <div class="">
                    <div class="px-5 py-2 mb-4 rounded-lg bg-gray-200 text-gray-900">                        
                        <div class="mb-4"><em>1. {{ $this->thesisReason1 }}</em></div>
                    </div>
                    <p>Now follow the steps above and create your own topic sentence. When you're finished, click the "Get Feedback" button below
                    to get feedback from our AI.</p>
                    <label for="topicSentence1" class="block text-sm font-medium leading-6 mt-5">Topic Sentence</label>
                    <textarea id="topicSentence1" wire:model="topicSentence1" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                    {{-- @error('topicSentence1')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}
                    <button type="button" wire:click='generateTopicSentence1Feedback' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
                </div>
            </div>
            <div x-cloak x-show="topicSentence1FeedbackGenerating || topicSentence1FeedbackGenerated" class="col-span-1">
                <div class="">
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <p class=""><strong>Your Topic Sentence:</strong></p>                        
                        <div class="mb-4"><em>{{ $this->topicSentence1 }}</em></div>                    
                    </div>
                </div>
            </div>        
        </div>
    </section>

    <!-- Topic Sentence 1 Feedback -->
    <section x-cloak x-show="topicSentence1FeedbackGenerating || topicSentence1FeedbackGenerated" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <p class=""><strong>Feedback:</strong></p>
                    <div x-cloak x-show="topicSentence1Feedback" class="">{!! Str::of($this->topicSentence1Feedback)->markdown() !!}</div>                    
                    <div x-cloak x-show="topicSentence1FeedbackGenerating" class="">Please wait while your instructions are generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Final Topic Sentence 1 -->
    <section x-cloak x-show="topicSentence1FeedbackGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div x-show="!topicSentence1Saved" class="col-span-1">
                <div class="">                    
                    <p>Make any needed adjustments to your topic sentence and then save the final version here.</p>
                    <label for="topicSentence1" class="block text-sm font-medium leading-6 mt-5">Topic Sentence</label>
                    <textarea id="topicSentence1" wire:model="topicSentence1" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                    {{-- @error('topicSentence1')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}
                    <button type="button" wire:click='saveTopicSentence1' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Save</button>
                </div>
            </div>        
        </div>
        <div x-show="topicSentence1Saved" class="col-span-1">
            <div class="">
                <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                    <p class=""><strong>Your Topic Sentence:</strong></p>                        
                    <div class="mb-4"><em>{{ $this->topicSentence1 }}</em></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 2 Instructions Section -->
    <section x-cloak x-show="topicSentence1Saved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <h3>Topic Sentence #2</h3>
                    <p>Now we need to repeat the same process we just did for Reason #2 and create our 2nd topic sentence
                    for our 2nd body paragraph.</p>
                    <p>Click the button below to let AI walk you through the process of creating your 2nd topic sentence</p>                    
                    <button x-show="!topicSentence2InstructionGenerating && !topicSentence2InstructionGenerated" wire:click='generateTopicSentence2Instruction' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Instructions</button>
                </div>
            </div>
            <div x-cloak x-show="topicSentence2InstructionGenerating || topicSentence2Instruction" class="col-span-1">
                <div class="">                        
                    <p class=""><strong>Topic Sentence 2 Instructions:</strong></p>
                    <div x-cloak x-show="topicSentence2Instruction" class="">{!! Str::of($this->topicSentence2Instruction)->markdown() !!}</div>                    
                    <div x-cloak x-show="topicSentence2InstructionGenerating" class="">Please wait while your instructions are generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 2 -->
    <section x-cloak x-show="topicSentence2InstructionGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div x-show="!topicSentence2FeedbackGenerating && !topicSentence2FeedbackGenerated" class="col-span-1">
                <div class="">
                    <div class="px-5 py-2 mb-4 rounded-lg bg-gray-200 text-gray-900">                        
                        <div class="mb-4"><em>2. {{ $this->thesisReason2 }}</em></div>
                    </div>                    
                    <p>Now follow the steps above and create your 2nd topic sentence. When you're finished, click the "Get Feedback" button below
                    to get feedback from our AI.</p>
                    <label for="topicSentence2" class="block text-sm font-medium leading-6 mt-5">Topic Sentence</label>
                    <textarea id="topicSentence2" wire:model="topicSentence2" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('topicSentence2') }}</textarea>
                    {{-- @error('topicSentence2')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}
                    <button x-show="!topicSentence2FeedbackGenerating && !topicSentence2FeedbackGenerated" wire:click='generateTopicSentence2Feedback' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
                </div>
            </div> 
            <div x-cloak x-show="topicSentence2FeedbackGenerating || topicSentence2FeedbackGenerated" class="col-span-1">
                <div class="">
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <p class=""><strong>Your Topic Sentence:</strong></p>                        
                        <div class="mb-4"><em>{{ $this->topicSentence2 }}</em></div>                    
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- Topic Sentence 2 Feedback -->
    <section x-cloak x-show="topicSentence2FeedbackGenerating || topicSentence2FeedbackGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <p class=""><strong>Feedback:</strong></p>
                    <div x-cloak x-show="topicSentence2Feedback" class="">{!! Str::of($this->topicSentence2Feedback)->markdown() !!}</div>                    
                    <div x-cloak x-show="topicSentence2FeedbackGenerating" class="">Please wait while your instructions are generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Final Topic Sentence 2 -->
    <section x-cloak x-show="topicSentence2FeedbackGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div x-cloak x-show="!topicSentence2Saved" class="col-span-1">
                <div class="">                    
                    <p>Make any needed adjustments to your topic sentence and then save the final version here.</p>
                    <label for="topicSentence2" class="block text-sm font-medium  leading-6 mt-5">Topic Sentence</label>
                    <textarea id="topicSentence2" wire:model="topicSentence2" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('topicSentence2') }}</textarea>
                    {{-- @error('topicSentence2')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}
                    <button wire:click='saveTopicSentence2' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Save</button>
                </div>                
            </div>
            <div x-cloak x-show="topicSentence2Saved" class="col-span-1">
                <div class="">
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <p class=""><strong>Your 2nd Topic Sentence:</strong></p>                        
                        <div class="mb-4"><em>{{ $this->topicSentence2 }}</em></div>                    
                    </div>
                </div>
            </div>        
        </div>
    </section>

    <!-- Topic Sentence 1 2 Reasons -->
    <section x-cloak x-show="topicSentence2Saved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <h3>Supporting Your Topic Sentences</h3>
                    <p>Now that we have our two topic sentences for our two body paragraphs, we need to <strong>come up with reasons to support our topic sentences</strong>.</p>
                    <p>Repeating the steps we did earlier, give two new reasons to support your claim in Topic Sentence #1.</p>
                    <p class="text-base mb-4"><em>(We’re repeating the same process as above, except instead of creating two reasons for your thesis statement, you’re now creating two reasons for Topic Sentence #1)</em></p>
                </div>
            </div>
            <div class="col-span-1">
                <div class="mb-8">
                    <p class=""><strong>Topic Sentence 1:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>{{ $this->topicSentence1 }}</em></div>                        
                    </div>
                </div>
            </div>
            <div x-cloak x-show="!topic1ReasonsFeedbackGenerating && !topic1ReasonsFeedbackGenerated" class="col-span-1">
                <label for="topic1Reason1" class="block text-sm font-medium leading-6">Reason #1</label>
                <textarea id="topic1Reason1" wire:model="topic1Reason1" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                <label for="topic1Reason2" class="block text-sm font-medium leading-6">Reason #2</label>
                <textarea id="topic1Reason2" wire:model="topic1Reason2" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                <button wire:click='generateTopic1ReasonsFeedback' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
            </div>
            <div x-cloak x-show="topic1ReasonsFeedbackGenerating || topic1ReasonsFeedbackGenerated" class="col-span-1">
                <div class="mb-8">
                    <p class=""><strong>Your reasons:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>1. {{ $this->topic1Reason1 }}</em></div>                        
                        <div class="mb-4"><em>2. {{ $this->topic1Reason2 }}</em></div>
                    </div>
                </div>
            </div>            
        </div> 
    </section>

    <!-- Topic Sentence 1 Reasons Feedback -->
    <section x-cloak x-show="topic1ReasonsFeedback || topic1ReasonsFeedbackGenerating" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                        
                    <p class=""><strong>Feedback:</strong></p>
                    <div x-cloak x-show="topic1ReasonsFeedback" class="">{!! Str::of($this->topic1ReasonsFeedback)->markdown() !!}</div>                    
                    <div x-cloak x-show="topic1ReasonsFeedbackGenerating" class="">Please wait while your feedback is generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Save final Topic Sentence 1 Reasons -->
    <section x-cloak x-show="topic1ReasonsFeedbackGenerated && !topic1ReasonsSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                    
                    <p>Make any needed adjustments to your reasons and then save the final version here.</p>
                    <label for="topic1Reason1" class="block text-sm font-medium leading-6">Reason #1</label>
                    <textarea id="topic1Reason1" wire:model="topic1Reason1" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                    <label for="topic1Reason2" class="block text-sm font-medium leading-6">Reason #2</label>
                    <textarea id="topic1Reason2" wire:model="topic1Reason2" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                    <button wire:click='saveTopic1Reasons' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Save</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 1 Reasons Saved -->
    <section x-cloak x-show="topic1ReasonsSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                    
                    <p class=""><strong>Your Topic Sentence 1 Reasons:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>1. {{ $this->topic1Reason1 }}</em></div>
                        <div class="mb-4"><em>2. {{ $this->topic1Reason2 }}</em></div>
                    </div>
                </div>
            </div>        
            <div class="col-span-1">
                <div class="">
                    <h3>Providing Examples</h3>                    
                    <p>Now that you have your reasons, we need to come up with an <strong>example</strong> that supports those reasons.</p>
                    <p>Providing clear reasons and examples are important to your scoring on your IELTS essay.</p>
                    <p>For Task Achievement, Providing relevant reasons and clear examples demonstrates that you have understood the question and are capable of developing your argument.</p>
                    <p>For Coherence and Cohesion, reasons and examples play a key role in linking ideas together, enhancing the flow of the essay.</p> 
                    <p>Using examples effectively can also help structure paragraphs, each centered around one main idea supported by specific points.</p>
                    <p>Click the button below to let AI walk you through the process of creating examples for your reasons.</p>
                    <button x-show="!topic1ExampleInstructionsGenerating && !topic1ExampleInstructionsGenerated" wire:click='generateTopic1ExampleInstructions' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Instructions</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 1 Example Instructions -->
    <section x-cloak x-show="topic1ExampleInstructionsGenerating || topic1ExampleInstructionsGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div id="body-paragraph-1-example-instructions" class="">                    
                    <p><strong>Example Instructions:</strong></p>
                    <div x-cloak x-show="topic1ExampleInstructionsGenerated">{!! Str::of($this->topic1ExampleInstructions)->markdown() !!}</div>
                    <div x-cloak x-show="topic1ExampleInstructionsGenerating" class="">Please wait while your instructions are generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 1 Example -->
    <section x-cloak x-show="topic1ExampleInstructionsGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div x-show="!topic1ExampleFeedbackGenerating && !topic1ExampleFeedbackGenerated" class="col-span-1">
                <div class="">                    
                    <p>Now follow the steps above and create your own example. When you're finished, click the "Get Feedback" button below
                    to get feedback from our AI.</p>
                    <label for="topic1Example" class="block text-sm font-medium leading-6 mt-5">Example</label>
                    <textarea id="topic1Example" wire:model="topic1Example" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('topic1Example') }}</textarea>
                    {{-- @error('topic1Example')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}
                    <button wire:click='generateTopic1ExampleFeedback' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
                </div>
            </div>  
            <div x-cloak x-show="topic1ExampleFeedbackGenerating || topic1ExampleFeedbackGenerated" class="col-span-1">
                <div class="">                    
                    <p class=""><strong>Topic Sentence 1 Example:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>{{ $this->topic1Example }}</em></div>                        
                    </div>
                </div>
            </div>      
        </div>
    </section>

    <!-- Topic Sentence 1 Example Feedback -->
    <section x-cloak x-show="topic1ExampleFeedbackGenerating || topic1ExampleFeedbackGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <p class=""><strong>Feedback:</strong></p>
                    <div x-cloak x-show="topic1ExampleFeedback" class="">{!! Str::of($this->topic1ExampleFeedback)->markdown() !!}</div>                    
                    <div x-cloak x-show="topic1ExampleFeedbackGenerating" class="">Please wait while your feedback is generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Save final Topic Sentence 1 Example -->
    <section x-cloak x-show="topic1ExampleFeedbackGenerated && !topic1ExampleSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                    
                    <p>Make any needed adjustments to your example and then save the final version here.</p>
                    <label for="topic1Example" class="block text-sm font-medium leading-6">Example</label>
                    <textarea id="topic1Example" wire:model="topic1Example" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>                    
                    <button role="button" wire:click='saveTopic1Example' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Save</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 1 Example Saved -->
    <section x-cloak x-show="topic1ExampleSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                    
                    <p class=""><strong>Your Topic Sentence 1 Example:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>{{ $this->topic1Example }}</em></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 2 Reasons -->
    <section x-cloak x-show="topic1ExampleSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <h3>Body Paragraph 2</h3>
                    <p>Great work so far, you're almost finished! Now that we've finished with Body Paragraph 1, we need to repeat the same process we just did for Body Paragraph 2.</p>
                    <p>Come up with two new reasons to support your claim in Topic Sentence #2.</p>                                        
                </div>
            </div>
            <div class="col-span-1">
                <div class="mb-8">
                    <p class=""><strong>Topic Sentence 2:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>{{ $this->topicSentence2 }}</em></div>                        
                    </div>
                </div>
            </div>

            <div x-cloak x-show="!topic2ReasonsFeedbackGenerating && !topic2ReasonsFeedbackGenerated" class="col-span-1">
                <label for="topic2Reason1" class="block text-sm font-medium leading-6">Reason #1</label>
                <textarea id="topic2Reason1" wire:model="topic2Reason1" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                <label for="topic2Reason2" class="block text-sm font-medium leading-6">Reason #2</label>
                <textarea id="topic2Reason2" wire:model="topic2Reason2" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                <button wire:click='generateTopic2ReasonsFeedback' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
            </div>
            <div x-cloak x-show="topic2ReasonsFeedbackGenerating || topic2ReasonsFeedbackGenerated" class="col-span-1">
                <div class="mb-8">
                    <p class=""><strong>Your reasons:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>1. {{ $this->topic1Reason1 }}</em></div>                        
                        <div class="mb-4"><em>2. {{ $this->topic1Reason2 }}</em></div>
                    </div>
                </div>
            </div>      
        </div> 
    </section>

    <!-- Topic Sentence 2 Reasons Feedback -->
    <section x-cloak x-show="topic2ReasonsFeedback || topic2ReasonsFeedbackGenerating" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                        
                    <p class=""><strong>Feedback:</strong></p>
                    <div x-cloak x-show="topic2ReasonsFeedback" class="">{!! Str::of($this->topic2ReasonsFeedback)->markdown() !!}</div>                    
                    <div x-cloak x-show="topic2ReasonsFeedbackGenerating" class="">Please wait while your feedback is generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Save final Topic Sentence 2 Reasons -->
    <section x-cloak x-show="topic2ReasonsFeedbackGenerated && !topic2ReasonsSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                    
                    <p>Make any needed adjustments to your reasons and then save the final version here.</p>
                    <label for="topic2Reason1" class="block text-sm font-medium leading-6">Reason #1</label>
                    <textarea id="topic2Reason1" wire:model="topic2Reason1" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                    <label for="topic2Reason2" class="block text-sm font-medium leading-6">Reason #2</label>
                    <textarea id="topic2Reason2" wire:model="topic2Reason2" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                    <button wire:click='saveTopic2Reasons' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Save</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 2 Reasons Saved -->
    <section x-cloak x-show="topic2ReasonsSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                    
                    <p class=""><strong>Your Topic Sentence 2 Reasons:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>1. {{ $this->topic2Reason1 }}</em></div>
                        <div class="mb-4"><em>2. {{ $this->topic2Reason2 }}</em></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 2 Example -->
    <section x-cloak x-show="topic2ReasonsSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <h3>Providing Examples</h3>                    
                <p>Now, just like you did for Body Paragraph 1, come up with an example to support your reasons in Body Paragraph 2.</p>
                <p><a href="#body-paragraph-1-example-instructions">Refer back to the instructions for Body Paragraph 1</a> if you need help.</p>
                <p>When you're finished, click the "Get Feedback" button to get AI feedback on this exmaple.</p>                    
            </div>
            <div x-show="!topic2ExampleFeedbackGenerating && !topic2ExampleFeedbackGenerated" class="col-span-1">
                <div class="">                    
                    <label for="topic2Example" class="block text-sm font-medium leading-6 mt-5">Example</label>
                    <textarea id="topic2Example" wire:model="topic2Example" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('topic2Example') }}</textarea>
                    {{-- @error('topic1Example')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}
                    <button wire:click='generateTopic2ExampleFeedback' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
                </div>
            </div>
            <div x-cloak x-show="topic2ExampleFeedbackGenerating || topic2ExampleFeedbackGenerated" class="col-span-1">
                <div class="">                    
                    <p class=""><strong>Topic Sentence 1 Example:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>{{ $this->topic1Example }}</em></div>                        
                    </div>
                </div>
            </div>      
        </div>
    </section>

    <!-- Topic Sentence 2 Example Feedback -->
    <section x-cloak x-show="topic2ExampleFeedbackGenerating || topic2ExampleFeedbackGenerated" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <p class=""><strong>Feedback:</strong></p>
                    <div x-cloak x-show="topic2ExampleFeedback" class="">{!! Str::of($this->topic2ExampleFeedback)->markdown() !!}</div>                    
                    <div x-cloak x-show="topic2ExampleFeedbackGenerating" class="">Please wait while your feedback is generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Save final Topic Sentence 2 Example -->
    <section x-cloak x-show="topic2ExampleFeedbackGenerated && !topic2ExampleSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                    
                    <p>Make any needed adjustments to your example and then save the final version here.</p>
                    <label for="topic2Example" class="block text-sm font-medium leading-6">Example</label>
                    <textarea id="topic2Example" wire:model="topic2Example" rows="2" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"></textarea>
                    {{-- @error('topic2Example')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}
                    <button wire:click='saveTopic2Example' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Save</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Topic Sentence 2 Example Saved -->
    <section x-cloak x-show="topic2ExampleSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                    
                    <p class=""><strong>Your Topic Sentence 2 Example:</strong></p>
                    <div class="px-5 py-2 rounded-lg bg-gray-200 text-gray-900">
                        <div class="mb-4"><em>{{ $this->topic2Example }}</em></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section x-cloak x-show="topic2ExampleSaved" class="mt-8 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">
                    <h2>Your Outline</h2>                    
                    <p>Now after all that work, you have a completed outline for your essay.</p>
                    <p>Here's how it looks:</p>
                    <div class="px-8 py-2 mb-8 rounded-lg bg-gray-200 text-gray-900">
                        <p>Thesis statement:</p>
                        <p>{{ $this->thesis }}</p>
                        <p>Body Paragraph 1:</p>
                        <p>{{ $this->topicSentence1 }}</p>
                        <p>1. {{ $this->topic1Reason1 }}</p>
                        <p>2. {{ $this->topic1Reason2 }}</p>
                        <p>{{ $this->topic1Example }}</p>
                        <p>Body Paragraph 2:</p>
                        <p>{{ $this->topicSentence2 }}</p>
                        <p>1. {{ $this->topic2Reason1 }}</p>
                        <p>2. {{ $this->topic2Reason2 }}</p>
                        <p>{{ $this->topic2Example }}</p>
                    </div>
                    <p><strong>Great work!</strong> All you need to do now is turn the points in your outline into full sentences.</p>
                     <p>Using this outline creation process, you can learn to write well-structured academic essays that make sure you score highly on Task Achievement and Coherence & Cohesion.</p>
                    <p>Repeat this process as many times as you need until you feel comfortable writing essays like this witout using an outline.</p>                                        
                </div>
            </div>
        </div>
    </section>



</div>
