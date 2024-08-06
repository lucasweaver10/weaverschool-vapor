<x-layouts.app>
    <x-slot name="title">
        {{ $guide->title }}
    </x-slot>
    <x-slot name="description">
        {{ strip_tags(substr($guide->content, 0, 157)) }}...
    </x-slot>
    <x-slot name="image">
        {{ $guide->featured_image }}
    </x-slot>
<x-layouts.guest>
<div class="min-w-screen bg-gray-100 dark:bg-gray-900 blog">
    <x-heroes.guides.show :guide="$guide"/>

    <div class="grid md:grid-cols-4 mx-8 pb-4 md:mx-16">
        <div class="prose prose-xl md:prose-2xl dark:prose-invert col-span-4 sm:col-span-3 sm:pt-5 pb-12 sm:pr-16">
        <x-cta.blog.learning-paths.thai.ordering-street-food />
            {!! $guide->content !!}
        </div>
        <div class="col-span-4 md:col-span-1">
            <div class="mt-12 sm:pt-5 sm:mt-0 sticky top-5">
                <div class="mb-4 dark:text-gray-300">Get our monthly newsletter full of learning tips straight to your inbox</div>
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                <script>
                    hbspt.forms.create({
                        region: "na1",
                        portalId: "2144262",
                        formId: "c86d9ef9-b284-4553-bbcb-cc8f3c835473"
                    });
                </script>                
                @if($guide->product_id)
                    <!-- Insert blade component with $productId as a variable -->
                    <x-blog.sidebar.ctas.flashcards-app :productId="$guide->product_id"/>
                @endif
            </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 dark:bg-gray-900 flex flex-wrap px-8 sm:pr-16 pt-8">
        <div class="w-full md:w-1/4 lg:w-1/4 pr-8 lg:pr-12 lg:pl-8">
            <img src="{{ $guide->author->image }}" class="mx-auto h-40 w-40 rounded-lg xl:w-56 xl:h-56 object-cover" alt="{{ $guide->author->first_name . ' ' . $guide->author->last_name }} from the Weaver School">
        </div>
        <div class="w-full pr-5 mt-4 sm:mt-0 mb-12 md:w-3/4 lg:w-1/2 prose prose-xl md:prose-2xl dark:prose-invert">
            {!! $guide->author->about !!}
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
          "headline": {!! json_encode($guide->title) !!},
            "image": [
            {!! json_encode($guide->featured_image) !!}
            ],
            "datePublished": {!! json_encode(($guide->published_at)->toIso8601String()) !!},
            "dateModified": {!! json_encode(($guide->updated_at)->toIso8601String()) !!},
            "author": [{
            "@type": "Person",
            "name": {!! json_encode($guide->author->first_name . ' ' . $guide->author->last_name) !!},
            "url": {!! json_encode(config('app.url')) !!}
                }]
            }
    </script>
</div>
</x-layouts.guest>
</x-layouts.app>
