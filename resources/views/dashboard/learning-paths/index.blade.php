<x-layouts.app>
    <x-slot name="title">
        Learning Paths
    </x-slot>
    <x-slot name="description">
        Customized language learning paths to learn the language you need.
    </x-slot>
    <x-layouts.dashboard.show>
        <div class="bg-gray-900 min-h-screen flex flex-col items-center px-4 py-10">
            <div class="mb-8 sm:mb-12 grid grid-cols-4 justify-between items-center">
                <div class="col-span-3">
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-100 mr-8">My Learning Paths</h1>
                </div>
                <div class="col-span-1 justify-end flex">
                    <a href="{{ route('learning-paths.create', ['locale' => session('locale')])}}" class="bg-teal-500 hover:bg-teal-600 text-white text-sm font-bold ml-auto sm:ml-36 py-2 px-2 rounded-lg focus:outline-none focus:shadow-outline">Create +</a>
                </div>
            </div>
            <div class="w-full max-w-4xl mx-auto -mt-4">
                <x-banners.upgrades.pro />
            </div>
            <div class="flex flex-col items-stretch mx-auto gay-y-10">
                @forelse ($learningPaths as $path)
                <!-- Neumorphism Card for Single Learning Path with Image -->
                <div class="relative bg-gray-800 hover:bg-gray-700 rounded-lg overflow-hidden shadow-lg my-4 w-full max-w-4xl mx-auto transition duration-300 ease-in-out transform hover:scale-105">

                    @php $buildProgress = $path->calculateBuildProgress($path->id); @endphp
                    @unless($buildProgress == 100)
                    <!-- Overlay with progress bar -->
                    <div class="absolute top-0 left-0 w-full h-full bg-gray-900 bg-opacity-90 flex items-center justify-center">
                        <div class="flex flex-col items-center">
                            <p class="text-teal-500 text-3xl font-bold mb-8 shadow-lg">Building your learning path...</p>
                            <div class="w-full h-6 bg-gray-700 rounded-sm">
                                <div class="h-full bg-teal-500" style="width: {{ $buildProgress }}%;"></div>
                            </div>
                            <a href="{{ route('learning-paths.show', ['locale' => session('locale'), 'learningPathId' => $path->id ])}}"
                                class="mt-12 px-3 py-2 rounded-lg bg-teal-700 text-white font-semibold hover:bg-teal-800 transition ease-in-out duration-150">
                                Preview
                            </a>
                        </div>
                    </div>
                    @endunless

                    <div class="flex flex-col sm:flex-row">
                        <!-- Image on the left -->
                        <div class="w-full sm:w-1/3">
                            @php
                                $vocabularyWord = $path->vocabularyWords->first();
                                if ($vocabularyWord) {
                                    $firstImage = $vocabularyWord->getMedia('images')->first();
                                    if ($firstImage) {
                                        $imageUrl = $firstImage->getUrl('medium');
                                    } else {
                                        $imageUrl = asset('images/weaver_school_learning_path_fallback_image.webp');
                                    }
                                } else {
                                    $imageUrl = asset('images/weaver_school_learning_path_fallback_image.webp');
                                }
                            @endphp
                            <img data-src="{{ $imageUrl }}"
                                alt="{{ $path->getTranslation('title', session('locale', 'en')) }}"
                                class="lazy object-cover w-full h-full rounded-l-lg">
                        </div>
                        <!-- Content on the right -->
                        <div class="flex-1 p-5 flex flex-col justify-between">
                            <div>
                                <a href="{{ route('learning-paths.show', ['locale' => session('locale'), 'learningPathId' => $path->id ])}}">
                                    <h2 class="text-3xl font-bold text-teal-400 mb-4">{{ $path->getTranslation('title', session('locale', 'en')) }}</h2>
                                </a>
                                <p class="text-gray-200 mb-8">{{ $path->getTranslation('description', session('locale', 'en')) }}</p>
                            </div>
                            <div class="self-end mb-2"> <!-- Align button to the end of the flex container -->
                                <a href="{{ route('learning-paths.show', ['locale' => session('locale'), 'learningPathId' => $path->id ])}}" class="px-3 py-2 rounded-lg bg-teal-500 text-white font-semibold hover:bg-teal-600 transition ease-in-out duration-150">Learn</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center">
                    <p class="text-gray-600 dark:text-gray-200 mb-12">No learning paths found. Start by creating a new one.</p>
                    <a href="/learning-paths/new" class="mt-12 sm:mt-16 bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-5 rounded-full focus:outline-none focus:shadow-outline">
                        Create
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-5 h-5 mb-1">
                            <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <div class="flex justify-center items-center">

                </div>
                @endforelse
            </div>
        </div>
    </x-layouts.dashboard.show>
</x-layouts.app>
