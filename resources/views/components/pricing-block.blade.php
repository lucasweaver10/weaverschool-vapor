<div class="bg-white dark:bg-gray-900 py-16 sm:py-16 rounded-lg">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-4xl sm:text-center">
      <h2 class="text-base font-semibold leading-7 text-teal-600 dark:text-teal-200">Pricing</h2>
      <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">Choose the right plan for&nbsp;you</p>
    </div>
    <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 dark:text-gray-100 sm:text-center">Choose a Weaver School monthly subscription that works best for your needs.</p>
    <div class="mt-20 flow-root">
      <div class="isolate -mt-16 grid max-w-sm grid-cols-1 gap-y-16 sm:mx-auto lg:-mx-8 lg:mt-0 lg:max-w-none lg:grid-cols-3 lg:divide-x lg:divide-y-0 xl:-mx-4">
        <div class="pt-16 lg:px-8 lg:pt-0 xl:px-14">
          <h3 id="tier-basic" class="text-base font-semibold leading-7 text-teal-700 dark:text-teal-200">Basic</h3>
          <p class="mt-6 flex items-baseline gap-x-1">
            <span class="text-5xl font-bold tracking-tight text-gray-900 dark:text-gray-100">${{ $basic->prices->where('billing_period', 'Monthly')->first()->amount }}</span>
            <span class="text-sm font-semibold leading-6 text-gray-00 dark:text-gray-100">/month</span>
            {{-- <p class="mt-3 text-sm leading-6 text-gray-500">$2.99 per month if paid annually</p> --}}
          </p>          
        @guest
            <a href="{{ route('dashboard.subscriptions.trials.create', ['locale' => session('locale', 'en'), 'type' => 'basic', 'id' => $basic->id])}}" aria-describedby="tier-growth" class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Start Trial</a>   
          @else            
            @if(auth()->user()->hasSubscriptionLevel(auth()->id(), 'essays'))   
                <a href="/billing" role="button" class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Manage</a>
            @else
                <a href="{{ route('dashboard.subscriptions.trials.create', ['locale' => session('locale', 'en'), 'type' => 'basic', 'id' => $basic->id])}}" aria-describedby="tier-growth" class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Start Trial</a>
            @endif
          @endguest
          <p class="mt-10 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-100">{{ $basic->description }}</p>
          <ul role="list" class="mt-6 space-y-3 text-sm leading-6 text-gray-600 dark:text-gray-100">
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              10 essay submissions
            </li>
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              Basic access to Flashcards tool
            </li>            
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              Access to Learning Paths created by other users
            </li>            
          </ul>
        </div>
        <div class="pt-16 lg:px-8 lg:pt-0 xl:px-14">
          <h3 id="tier-essential" class="text-base font-semibold leading-7 text-teal-700 dark:text-teal-200">Pro</h3>
          <p class="mt-6 flex items-baseline gap-x-1">
            <span class="text-5xl font-bold tracking-tight text-gray-900 dark:text-gray-100">${{ $pro->prices->where('billing_period', 'Monthly')->first()->amount }}</span>
            <span class="text-sm font-semibold leading-6 text-gray-600 dark:text-gray-100">/month</span>
          </p>
          {{-- <p class="mt-3 text-sm leading-6 text-gray-500">$5.99 per month if paid annually</p> --}}
          @guest
            <x-buttons.subscriptions.trial-pro
                    text="Start Trial"                    
                    class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600"
            />   
          @else
            @if(auth()->user()->hasSubscriptionLevel(auth()->id(), 'essays'))   
                <a href="/billing" role="button" class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Manage</a>
            @else
                <x-buttons.subscriptions.trial-pro
                        text="Start Trial"                    
                        class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600"
                />
            @endif
          @endguest
          <p class="mt-10 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-100">{{ $pro->description }}</p>
          <ul role="list" class="mt-6 space-y-3 text-sm leading-6 text-gray-600 dark:text-gray-100">
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              20 essay submissions
            </li>
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              5 speaking test submissions
            </li>
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              Create 4 Flashcard sets with AI image and audio creation
            </li>
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              Create 3 custom, AI-generated Learning Paths
            </li>            
          </ul>
        </div>
        <div class="pt-16 lg:px-8 lg:pt-0 xl:px-14">
          <h3 id="tier-growth" class="text-base font-semibold leading-7 text-teal-700 dark:text-teal-200">Premium</h3>
          <p class="mt-6 flex items-baseline gap-x-1">
            <span class="text-5xl font-bold tracking-tight text-gray-900 dark:text-gray-100">${{ $premium->prices->where('billing_period', 'Monthly')->first()->amount }}</span>
            <span class="text-sm font-semibold leading-6 text-gray-600 dark:text-gray-100">/month</span>
          </p>
          {{-- <p class="mt-3 text-sm leading-6 text-gray-500">$11.99 per month if paid annually</p>           --}}
          @guest
            <a href="{{ route('dashboard.subscriptions.trials.create', ['locale' => session('locale', 'en'), 'type' => 'premium', 'id' => $premium->id])}}" aria-describedby="tier-growth" class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Start Trial</a>   
          @else            
            @if(auth()->user()->hasSubscriptionLevel(auth()->id(), 'essays'))   
                <a href="/billing" role="button" class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Manage</a>
            @else
                <a href="{{ route('dashboard.subscriptions.trials.create', ['locale' => session('locale', 'en'), 'type' => 'premium', 'id' => $premium->id])}}" aria-describedby="tier-growth" class="mt-10 block rounded-md bg-teal-200 px-3 py-2 text-center text-sm font-semibold leading-6 text-teal-900 shadow-sm hover:bg-teal-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Start Trial</a>
            @endif
          @endguest
          <p class="mt-10 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-100">{{ $premium->description }}</p>
          <ul role="list" class="mt-6 space-y-3 text-sm leading-6 text-gray-600 dark:text-gray-100">
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              50 essay submissions
            </li>
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              10 speaking test submissions
            </li>
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              10 Flashcard sets with AI-generated images and audio, including create from YouTube and Google Chrome extension
            </li>
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              5 custom AI-generated Learning Paths
            </li>
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              Early access to powerful new fine-tuned AI models
            </li>            
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
