<section class="mt-12 p-6">
    <div class="text-center">
        <h3 class="text-4xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Unlock the Full Potential of the Weaver School</h3>
        <p class="text-xl text-gray-700 dark:text-gray-200 mb-6">Upgrade to a pro account and get <strong>unlimited essay submissions</strong>, access to our <strong><a class="text-teal-600 dark:text-teal-300 hover:text-teal-900 dark:hover:text-teal-400" target="_blank" href="/flashcards">AI flashcards tool</a></strong>, and <strong><a href="/{{ session('locale')}}/english/courses/online" class="text-teal-600 dark:text-teal-300 hover:text-teal-900 dark:hover:text-teal-400" target="_blank">ALL of our courses</a></strong>.</p>
        <div class="flex justify-center items-center">
            {{-- <button @click="showOverlay(5001)" class="bg-teal-300 hover:bg-teal-500 text-gray-700 hover:text-white font-bold py-2 px-6 rounded-lg mr-4">Upgrade to Pro</button>
            <button @click="showOverlay(1001)" class="bg-white hover:bg-teal-100 text-teal-700 hover:text-teal-900 font-semibold py-2 px-6 rounded-lg border border-2 border-teal-300 hover:border-teal-500">Upgrade Only Essay Grader</button>                 --}}
            <a href="{{ route('subscription-checkout', ['pro', 5001])}}" class="bg-teal-300 hover:bg-teal-500 text-gray-700 hover:text-white font-bold py-2 px-6 rounded-lg mr-4">Upgrade to Weaver School Pro</a>                                
        </div>
    </div>
</section>