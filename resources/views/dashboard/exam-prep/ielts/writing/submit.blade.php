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
    
    <x-alerts.success />
    <x-alerts.error />    

    </div>
    </x-dashboard.index>
</x-layouts.app>
