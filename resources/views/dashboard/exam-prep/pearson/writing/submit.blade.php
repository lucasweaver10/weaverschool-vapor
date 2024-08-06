<x-layouts.app>
    <x-slot name="title">
        Submit an Essay | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Submit an Essay
        </x-slot>
        <div x-data="{
            subscriptionOverlayVisible: false,
            productId: null,
            showOverlay(id) {
                this.productId = id;
                $dispatch('upgrade-clicked', {id: this.productId});
            },
            exam: 'IELTS Academic',
            task: 'Task One',
            image_url: ''       
        }"
        x-on:overlay-opened.window="subscriptionOverlayVisible = true">          
        
        <!-- Enhanced Subscription Section -->        
        @unless(auth()->user()->hasSubscriptionLevel(auth()->id(), 'essays'))                
            <x-cta.upgrades.exam-prep.pro />
        @endunless

        <!-- Essay Submission Section -->
        <section class="mt-12 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
            <div class="grid grid-cols-1">
                <div class="col-span-1">
                    <div class="">                        
                        <p class="mb-0">Submit your essay topic and content for AI-generated feedback and scoring. Essay analysis takes between 30 seconds to 1 minute on average.</p>
                    </div>
                    <div class="bg-gray-200 shadow-xl rounded-lg py-1 px-5 mb-12 mt-12">
                        <form action="/essay-submissions/handle" method="POST">
                        @csrf
                            <input type="hidden" name="type" value="Pearson">
                            <input type="hidden" name="exam" value="PTE">
                            <input type="hidden" name="task" value="One">                            

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
    
    <x-alerts.success />
    <x-alerts.error />
    
    </div>
    </x-dashboard.index>
</x-layouts.app>
