<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.5.x/dist/css/glide.core.min.css">
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.5.x"></script>

<style>
    .glide__bullet--active {
        background: #FFFFFF;
    }
</style>

<div
    x-data="{
        init() {
            new Glide(this.$refs.glide, {
                perView: 1,
                640: {
                    perView: 1,
                },
            }).mount()
        },
    }"
>
    <div x-ref="glide" class="glide block relative px-12">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @foreach($testimonials as $testimonial)
                    <li class="glide__slide flex flex-col items-center justify-center pb-6 md:px-36">
                        <div class="w-full px-3 mb-5 italic">"{{ $testimonial->content }}"</div>
                        <span class="text-center text-4xl font-extrabold mb-2 inline-flex">- {{ $testimonial->name }}
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0
                                1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745
                                3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0
                                01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296
                                3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0
                                013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="glide__arrows pointer-events-none absolute inset-0 flex items-center justify-between" data-glide-el="controls">
            <!-- Previous Button -->
            <button
                class="glide__arrow glide__arrow--left pointer-events-auto disabled:opacity-50"
                data-glide-dir="<"
            >
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </span>
                <span class="sr-only">Skip to previous slide page</span>
            </button>

            <!-- Next Button -->
            <button
                class="glide__arrow glide__arrow--left pointer-events-auto disabled:opacity-50"
                data-glide-dir=">"
            >
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </span>
                <span class="sr-only">Skip to next slide page</span>
            </button>
        </div>

        <!-- Bullets -->
        <div class="glide__bullets flex w-full items-center justify-center gap-1" data-glide-el="controls[nav]">
            <button class="glide__bullet h-3 w-3 rounded-full bg-gray-300 transition-colors" data-glide-dir="=0"></button>
            <button class="glide__bullet h-3 w-3 rounded-full bg-gray-300 transition-colors" data-glide-dir="=1"></button>
            <button class="glide__bullet h-3 w-3 rounded-full bg-gray-300 transition-colors" data-glide-dir="=2"></button>
            <button class="glide__bullet h-3 w-3 rounded-full bg-gray-300 transition-colors" data-glide-dir="=3"></button>
            <button class="glide__bullet h-3 w-3 rounded-full bg-gray-300 transition-colors" data-glide-dir="=4"></button>
            <button class="glide__bullet h-3 w-3 rounded-full bg-gray-300 transition-colors" data-glide-dir="=5"></button>
        </div>
    </div>
</div>
