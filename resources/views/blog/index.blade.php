<x-layouts.app>
    <x-slot name="title">
    The Weaver School Blog
    </x-slot>
    <x-slot name="description">
    Learn more about language courses and improving your language skills with the The Weaver School blog.
    </x-slot>
<x-layouts.guest>
    <div class="relative bg-gray-50 dark:bg-gray-900 px-4 pt-4 pb-20 sm:px-6 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="absolute inset-0">
            <div class="h-full bg-gray-50 dark:bg-gray-900"></div>
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl">Everything you need to know about online language learning</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-900 dark:text-gray-100 sm:mt-4">Learn how to use online language lessons to become fluent in the language you need.</p>
            </div>
            <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                @foreach ($posts as $post)
                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg mb-2">
                    <div class="flex-shrink-0">
                        <img class="lazy h-48 w-full object-cover" data-src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                    </div>


                    <div class="flex flex-1 flex-col justify-between bg-white p-6">
                        <div class="flex-1">
                            <a href="/blog/{{ $post->slug }}" class="mt-2 block">
                                <div class="text-2xl font-semibold text-teal-900 hover:text-teal-600">{{ $post->title }}</div>
                            </a>
                                <div class="mt-3 font-base text-black">{{ strip_tags(html_entity_decode($post->preview)) }}...</div>

                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">{{ $post->author->first_name . $post->author->last_name }}</span>
                                    <img class="h-10 w-10 rounded-full" src="{{ $post->author->image }}" alt="{{ $post->author->first_name . ' ' . $post->author->last_name }} from the Weaver School">
                                </a>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline unstyled">{{ $post->author->first_name . ' ' . $post->author->last_name }}</a>
                                </div>
                                <div class="flex space-x-1 text-sm text-gray-500 mt-0">
                                    <time datetime="{{ $post->published_at }}">{{ $post->published_at->format("M, j, Y") }}</time>
                                    <span aria-hidden="true">&middot;</span>
{{--                                    <span>{{ round(str_word_count($post->content)/238) }} min read</span>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
    </div>
</x-layouts.guest>
</x-layouts.app>
