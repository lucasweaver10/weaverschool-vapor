<div class="relative">
    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
    <div class="mx-auto">
        <div class="relative sm:overflow-hidden sm:py-32 mb-5">
            <div class="absolute inset-0">
                <img class="lazy h-full w-full object-cover" data-src="{{ $guide->featured_image }}" alt="{{ $guide->title }}">
                <div class="absolute inset-0 bg-gray-500 mix-blend-multiply"></div>
            </div>
            <div class="relative px-4 pt-16 sm:px-6 sm:pt-24 lg:pt-32 lg:px-8">
                <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    <span class="block text-white">{{ $guide->title }}</span>
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">Published: {{ $guide->published_at->format("M j, Y")  }} | By: {{ $guide->author->first_name }} {{ $guide->author->last_name }}</p>
            </div>
        </div>
    </div>
</div>
