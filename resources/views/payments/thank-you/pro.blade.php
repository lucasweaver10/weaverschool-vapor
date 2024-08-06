<x-layouts.app>
<x-slot name="title">
  Thank you for your payment | The Weaver School
</x-slot>
<x-slot name="description">
  Thank you for your payment
</x-slot>
<x-layouts.squeeze-dark>
@if(config('app.env') === 'production')
    <script>
        fbq('track', 'Subscribe');
    </script>
@endif
<div x-data="{
        subscriptionOverlayVisible: false,
        productId: null,
        showOverlay(id) {
            this.productId = id;
            $dispatch('upgrade-clicked', {id: this.productId});
        }       
    }"
    x-on:overlay-opened.window="subscriptionOverlayVisible = true">   

    <section class="bg-teal-700 py-16">
        <div class="text-center text-white">
            <h2 class="text-3xl font-bold mb-4">Payment Successful</h2>
            <p class="text-xl font-semibold">Thank you for your payment.</p>           
        </div>
    </section>

    <section class="mt-12 p-6">
        <div class="text-center">
            <h3 class="text-4xl font-semibold text-gray-900 mb-6">Congratulations on unlocking the power of Weaver School Pro</h3>
            <p class="text-xl text-gray-700 mb-6">You now have access to: <strong>unlimited essay submissions</strong>, the Pro version of our <strong><a class="text-teal-600 hover:text-teal-900" target="_blank" href="/flashcards">AI flashcards tool</a></strong>, and access to <strong><a href="/{{ session('locale')}}/english/courses/online" class="text-teal-600 hover:text-teal-900" target="_blank">ALL of our courses</a></strong>.</p>
            <div class="flex justify-center items-center">
                <a href="{{ route('dashboard.essays.create', ['locale' => session('locale')]) }}" class="bg-teal-300 hover:bg-teal-500 text-gray-700 hover:text-white font-bold py-2 px-6 rounded-lg mr-4">Submit an Essay</button>
                <a href="/flashcards/explore/sets" class="bg-white hover:bg-teal-100 text-teal-700 hover:text-teal-900 font-semibold py-2 px-6 rounded-lg border border-2 border-teal-300 hover:border-teal-500">Explore Flashcards</a>
            </div>
        </div>
    </section>

    <div class="flex">
    <div class="grid grid-cols-3 px-24 mt-8 mx-auto gap-x-8">
      <div class="col-span-1 p-2 rounded-lg border-2 border-teal-400">
        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="/images/flashcards/ielts-academic-flashcards.jpg" alt="Instant Feedback">
      </div>
      <div class="col-span-1 p-2 rounded-lg border-2 border-teal-400">
        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="/images/pages/ielts/unlimited-essay-submissions.png" alt="Detailed Reports">
      </div>
      <div class="col-span-1 p-2 rounded-lg border-2 border-teal-400">
        <img class="lg:h-48 md:h-36 min-h-24 w-full object-cover object-center" src="/images/pages/ielts/master ielts writing courses.jpg" alt="Personalized Improvement Plans">
      </div>
    </div>
    </div>  

    <x-alerts.success />
    <x-alerts.error />
</div>
</x-layouts.squeeze-dark>
</x-layouts.app>

