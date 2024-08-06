<div
    x-data="{     
        topic: $wire.entangle('topic'),
        type: $wire.entangle('type'),
        topicAndTypeSet: $wire.entangle('topicAndTypeSet'),
        thesisInstructions: $wire.entangle('thesisInstructions'),
        thesisOne: $wire.entangle('thesisOne'),
        thesisTwo: $wire.entangle('thesisTwo'),
        thesisThree: $wire.entangle('thesisThree'),
        thesisFeedbackOne: $wire.entangle('thesisFeedbackOne'),
        thesisFeedbackTwo: $wire.entangle('thesisFeedbackTwo'),
        topicAndTypeProcessing: $wire.entangle('topicAndTypeProcessing'),
        thesisInstructionsProcessing: $wire.entangle('thesisInstructionsProcessing'),
        thesisFeedbackOneProcessing: $wire.entangle('thesisFeedbackOneProcessing'),
        thesisFeedbackTwoProcessing: $wire.entangle('thesisFeedbackTwoProcessing'),
        thesisFeedbackOneGenerated: $wire.entangle('thesisFeedbackOneGenerated'),
        thesisFeedbackTwoGenerated: $wire.entangle('thesisFeedbackTwoGenerated'),
        thesisThreeProcessed: $wire.entangle('thesisThreeProcessed')
    }"
    class="prose prose-2xl dark:prose-invert mx-auto"
>
    <!-- Essay Topic Setup Section -->
    <section x-show="!topicAndTypeSet" 
        x-transition:leave="transition ease-out duration-1000"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">                    
                <div class="my-8 bg-white shadow-lg rounded-lg p-6">                        
                    <!-- Essay Type -->
                    <label for="type" class="block text-sm text-gray-900 font-medium leading-6">Type</label>
                    <select id="type" wire:model="type" class="text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">
                        <option value="" {{ old('type') === '' ? 'selected' : '' }}>Select Essay Type</option>
                        <option value="IELTS Academic" {{ old('type') === 'IELTS Academic' ? 'selected' : '' }}>IELTS Academic</option>
                        <option value="IELTS General" {{ old('type') === 'IELTS General' ? 'selected' : '' }}>IELTS General</option>                        
                        <option value="C1 Advanced" {{ old('type') === 'C1 Advanced' ? 'selected' : '' }}>C1 Advanced</option>
                        <option value="C2 Proficiency" {{ old('type') === 'C2 Proficiency' ? 'selected' : '' }}>C2 Proficiency</option>
                        <option value="B2 First" {{ old('type') === 'B2 First' ? 'selected' : '' }}>B2 First</option>
                        <option value="PTE" {{ old('type') === 'PTE' ? 'selected' : '' }}>PTE</option>
                        {{-- <option value="TOEFL" {{ old('type') === 'TOEFL' ? 'selected' : '' }}>TOEFL</option> --}}                                            
                        {{-- <option value="General University" {{ old('type') === 'General University' ? 'selected' : '' }}>General University</option>  --}}
                    </select>
                    
                    <!-- Topic Input -->
                    <label for="topic" class="block text-sm text-gray-900 font-medium leading-6">Topic</label>
                    <textarea id="topic" wire:model="topic" rows="4" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('topic') }}</textarea>
                    @error('topic')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror                        

                    <!-- Submit Button -->
                    <div>
                        <button x-show="!topicAndTypeProcessing" wire:click="setTopicAndType" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Get Started</button>
                        <div x-cloak x-show="topicAndTypeProcessing"><img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Essay Practice Section -->
    <div x-cloak x-show="topicAndTypeSet"
        x-transition:enter="transition ease-in duration-1000"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100">
        
        <!-- Thesis Statement Instructions Intro Section -->
        <section class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="">
                        <h2>How to Write a Thesis Statement for an Academic Essay</h2>                        
                        <p class="">The first step to writing an academic essay is writing your <strong>thesis statement</strong>.</p>
                        <p class="">A thesis statement is usually a single sentence near the beginning of your paper (most often, 
                        at the end of the first paragraph) that presents your argument to the reader.</p>
                        <p class="">The rest of the paper, the body of the essay, gathers and organizes evidence that will 
                        persuade the reader of the logic of your thesis statement.</p>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Essay Topic Section -->
        <section class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="">                        
                        <p class=""><strong>Your topic:</strong></p>
                        <p class="p-5 rounded-lg bg-gray-200 text-gray-900"><em>{{ $this->topic }}</em></p>                                            
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="">                        
                        <p class=""><strong>Instructions:</strong></p>
                        <div x-cloak x-show="thesisInstructions" class="">{!! Str::of($this->thesisInstructions)->markdown() !!}</div>                    
                        <div x-cloak x-show="thesisInstructionsProcessing" class="">Please wait while your instructions are generating... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
                    </div>
                </div>
            </div>
        </section>

        <section x-cloak x-show="thesisInstructions" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div class="col-span-1" x-cloak x-show="!thesisFeedbackOneGenerated">
                    <div x-cloak x-show="!thesisFeedbackOneProcessing" class="">                        
                        <h3 class=""><strong>Try it yourself:</strong></h3>
                        <p class="">In the text area below, write your own thesis statement to get feedback and see if you're on the right track.</p>                    
                        <!-- Essay Input -->
                        <label for="thesis-one" class="block text-sm font-medium leading-6">Thesis Statement</label>
                        <textarea id="thesis-one" wire:model='thesisOne' rows="4" class="mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('thesis') }}</textarea>
                        @error('thesis-one')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <!-- Submit Button -->
                        <button wire:click='generateThesisFeedbackOne' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
                    </div>                                        
                </div>
                <div class="col-span-1" x-cloak x-show="thesisFeedbackOneProcessing || thesisFeedbackOneGenerated">
                    <div class="">                        
                        <p class=""><strong>Your thesis statement:</strong></p>
                        <p class="p-5 rounded-lg bg-gray-200 text-gray-900"><em>{{ $this->thesisOne }}</em></p>                                            
                    </div>
                </div>
                <div x-cloak x-show="thesisFeedbackOneProcessing" class="col-span-1 mt-8">Please wait while your thesis statement is processing... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                    
            </div>
        </section>

        <section x-cloak x-show="thesisFeedbackOne" class="mt-12 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="">                        
                        <p class=""><strong>Feedback:</strong></p>
                        <p>{!! Str::of($this->thesisFeedbackOne)->markdown() !!}</p>
                    </div>
                </div>
            </div>
        </section>

        <section x-cloak x-show="thesisFeedbackOne" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">                 
                <div x-cloak x-show="!thesisFeedbackTwoGenerated" class="col-span-1">
                    <div x-cloak x-show="!thesisFeedbackTwoProcessing" class="">                        
                        <h3 class=""><strong>Try it again:</strong></h3>
                        <p class="">In the text area below, improve your first thesis statement and get feedback on your improvement.</p>                    
                        <!-- Essay Input -->
                        <label for="thesis-two" class="block text-sm font-medium leading-6">Improved Thesis Statement</label>
                        <textarea id="thesis-two" wire:model='thesisTwo' rows="4" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('essay') }}</textarea>
                        @error('thesis-two')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <!-- Submit Button -->
                        <button wire:click='generateThesisFeedbackTwo' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 mb-8 rounded">Get Feedback</button>
                    </div>                    
                    <div x-cloak x-show="thesisFeedbackTwoProcessing" class="col-span-1 mt-8">Please wait while your thesis statement is processing... <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-5 w-5 h-5 mt-4"></div>                                                            
                </div>
                <div x-cloak x-show="thesisFeedbackTwoProcessing || thesisFeedbackTwoGenerated" class="col-span-1">
                    <div class="">                        
                        <p class=""><strong>Your updated thesis statement:</strong></p>
                        <p class="p-5 rounded-lg bg-gray-200 text-gray-900"><em>{{ $this->thesisTwo }}</em></p>                                            
                    </div>
                </div>
            </div>
        </section>
        

        <section x-cloak x-show="thesisFeedbackTwo" class="mt-12 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="">                        
                        <p class=""><strong>Updated Feedback:</strong></p>
                        <p>{!! Str::of($this->thesisFeedbackTwo)->markdown() !!}
                    </div>
                </div>
            </div>
        </section>

        <section x-cloak x-show="thesisFeedbackTwo" class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div x-cloak x-show="!thesisThreeProcessed"  class="col-span-1">
                    <div class="">                        
                        <h3 class=""><strong>Finished Thesis Statement:</strong></h3>
                        <p class="">In the text area below, put in your completed thesis statement. We'll use this for the next steps.</p>                    
                        <!-- Essay Input -->
                        <label for="thesis-three" class="block text-sm font-medium leading-6">Finished Thesis Statement</label>
                        <textarea id="thesis-three" wire:model='thesisThree' rows="4" class="text-lg text-gray-900 mt-2 mb-4 w-full block rounded-md border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">{{ old('essay') }}</textarea>
                        @error('thesis-three')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <div class="mb-8">
                        <button wire:click='processThesisThree' class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Save</button>
                        {{-- <div x-cloak x-show="loading"><img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5"></div> --}}
                    </div>
                </div>
                <div x-cloak x-show="thesisThreeProcessed" class="col-span-1">
                    <div class="">                        
                        <p class=""><strong>Your updated thesis statement:</strong></p>
                        <p class="p-5 rounded-lg bg-gray-200 text-gray-900"><em>{{ $this->thesisTwo }}</em></p>                                            
                    </div>
                    <div class="">                        
                        <h4 class="">Ready for the next step?</h4>
                        <p class="">Now that you have your thesis statement, you're ready to use it to create an outline for your essay.</p>
                        <p class="">Click the button below to get started.</p>                                            
                    </div>
                    <!-- Button -->
                    <div class="mb-8">                
                        <a href="{{ route('dashboard.exam-prep.ielts.writing.practice.task-two-outline', ['locale' => session('locale', 'en')]) }}" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Start Outline</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
    
</div>
