<x-layouts.app>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>
    <x-slot name="description">
        {{ strip_tags(substr($post->content, 0, 157)) }}...
    </x-slot>
    <x-slot name="image">
        {{ $post->featured_image }}
    </x-slot>
<x-layouts.guest>
<div class="min-w-screen bg-gray-100 dark:bg-gray-900 blog">
    <x-heroes.blog.show :post="$post"/>

    <div class="grid md:grid-cols-4 mx-8 pb-4 md:mx-16">
        <div class="prose prose-xl md:prose-2xl dark:prose-invert col-span-4 sm:col-span-3 sm:pt-5 pb-12 sm:pr-16">
        @if($post->product_id === 2001)
            <x-cta.blog.flashcards.automated-creation />
        @else
            <x-cta.blog.learning-paths.thai.ordering-street-food />
        @endif
        
            {!! $post->content !!}
        </div>
        <div class="col-span-4 md:col-span-1">
            <div class="mt-12 sm:pt-5 sm:mt-0 sticky top-5">
                <livewire:newsletter-subscribers.create />
            </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 dark:bg-gray-900 flex flex-wrap px-8 sm:pr-16 pt-8">
        <div class="w-full md:w-1/4 lg:w-1/4 pr-8 lg:pr-12 lg:pl-8">
            <img src="{{ $post->author->image }}" class="mx-auto h-40 w-40 rounded-lg xl:w-56 xl:h-56 object-cover" alt="{{ $post->author->first_name . ' ' . $post->author->last_name }} from the Weaver School">
        </div>
        <div class="w-full pr-5 mt-4 sm:mt-0 mb-12 md:w-3/4 lg:w-1/2 prose prose-xl md:prose-2xl dark:prose-invert">
            {!! $post->author->about !!}
        </div>
    </div>

    <!-- CTA -->
    @guest
    <x-cta.visitor />
    @else
    <x-cta.user />
    @endguest
    <!-- End CTA -->

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BlogPosting",
          "headline": {!! json_encode($post->title) !!},
            "image": [
            {!! json_encode($post->featured_image) !!}
            ],
            "datePublished": {!! json_encode(($post->published_at)->toIso8601String()) !!},
            "dateModified": {!! json_encode(($post->updated_at)->toIso8601String()) !!},
            "author": [{
            "@type": "Person",
            "name": {!! json_encode($post->author->first_name . ' ' . $post->author->last_name) !!},
            "url": {!! json_encode(config('app.url')) !!}
                }]
            }
    </script>
</div>
</x-layouts.guest>
</x-layouts.app>
