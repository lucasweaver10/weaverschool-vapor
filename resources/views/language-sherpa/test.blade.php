<x-layouts.app title="Online English courses | The Weaver School">
    <x-slot name="title">
        Learn new vocabulary with your Language Sherpa from the Weaver School
    </x-slot>
    <x-slot name="description">
        Learn new vocabulary with your Language Sherpa
    </x-slot>
    <script src="https://cdn.tailwindcss.com"></script>
<div x-data="{ showAnswers: false}">
<main>
    <!-- Pricing block -->
    <section id="pricing" aria-label="Pricing" class="bg-black py-20 sm:py-32">
        <div class="md:text-center">
            <h2 class="font-display text-3xl tracking-tight text-white sm:text-5xl">
           Test yourself!
            </h2>
            <p class="mt-4 text-xl text-white mx-auto">
            </p>
        </div>
        <div class="-mx-4 mt-16 grid max-w-3xl grid-cols-1 gap-y-10 sm:mx-auto lg:-mx-8 lg:max-w-none md:grid-cols-3 lg:justify-center
        xl:mx-0 xl:gap-x-8">
            <section class="md:col-span-1"></section>
            <section class="md:col-span-1 rounded-3xl px-6 sm:px-8 bg-white py-8 lg:order-none">
            @foreach($tests as $test)
            <p>{!! $test !!}</p>
                <div class="mt-4 text-center">
                    <button @click="showAnswers = true" class="btn bg-blue-400 text-white rounded-lg px-3 py-2">Show Answers</button>
                </div>
            @endforeach
                <div x-cloak x-show="showAnswers">
                    @foreach($correctAnswers as $correctAnswer)
                        {!! $correctAnswer !!}
                    @endforeach
                </div>
            </section>
            <section class="md:col-span-1"></section>
            <!-- Additional plan sections go here -->
        </div>
    </section>
    <!-- End pricing block -->

    <!-- Call to action -->
    <section id="get-started-today" class="relative overflow-hidden bg-blue-400 py-32">
        <img class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" src="path_to_background_image.jpg" alt="" width="2347" height="1244" />
        <div class="relative">
            <div class="mx-auto max-w-lg text-center">
                <h2 class="font-display text-4xl tracking-tight text-white sm:text-4xl">Ready to test yourself?!</h2>
                <p class="mt-4 text-2xl tracking-tight text-white">Once you've learned all 3 words, click the button below to test your knowledge.</p>
                <a href="/register" class="inline-block px-8 py-4 mt-10 text-gray-900 font-semibold bg-white rounded-full hover:bg-blue-700">Try it free</a>
            </div>
        </div>
    </section>
<!-- End call to action -->

</main>
</div>
</x-layouts.app>
