<div class="group fixed bottom-0 w-full z-5 mt-2">
    <div class="bg-teal-800 flex">
        <div class="max-w-screen-xl mx-auto py-4 px-3 sm:px-6 lg:px-8">
            <div class="sm:pr-16 text-center sm:px-16 align-middle">
                <p class="font-medium text-white flex">
                    @if (Auth::check())
                        <span class="mr-4 my-auto text-sm sm:text-lg">
                            You have {{ Auth::user()->getDaysLeftInTrial() }} days left of your trial.
                        </span>
                    @endif
                    <span class="block lg:mt-0 sm:mb-0 sm:ml-2 sm:inline-block my-auto">
                       <a href="{{ route('subscription-checkout', ['pro', 5001])}}" class="bg-amber-300 group-hover:bg-amber-400 shadow-sm border border-1 border-yellow-600 rounded-lg text-green-700 py-1 px-3">
                          Upgrade
                       </a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
