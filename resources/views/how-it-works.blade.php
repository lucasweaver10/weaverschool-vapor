<!-- How it works -->

<div class="max-w-2xl mx-auto py-5 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl  lg:grid lg:grid-cols-2 lg:gap-x-8">
  <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
      <div class="group relative">
          <h2 class="text-5xl tracking-tight font-extrabold mb-4">@lang('courses/thai/index.how_it_works_title')</h2>
          <p class="text-xl">@lang('courses/thai/index.hiw_1')</p>
          <p class="text-xl">@lang('courses/thai/index.hiw_2')</p>
          <p class="text-xl">@lang('courses/thai/index.hiw_3')</p>
          <p class="text-xl">@lang('courses/thai/index.hiw_4')</p>
          <p class="text-xl">@lang('courses/thai/index.hiw_5')</p>
          <p class="text-xl">@lang('courses/thai/index.hiw_6')</p>
          @if (Auth::check())
              <a href="/dashboard" id="how-it-works-view-dashboard-button" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent
                  text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">
                  @lang('courses/thai/index.dashboard_button')
              </a>
          @else
              <a href="/register" id="how-it-works-create-account-button" onclick="fathom.trackGoal('CLICKED-HOW-IT-WORKS-CREATE-ACCOUNT-BUTTON', 0);" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent
              text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">
                  @lang('courses/thai/index.create_account_button')
              </a>
          @endif
      </div>
  </div>
  <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
      <div class="aspect-w-1 aspect-h-7 rounded-lg overflow-hidden">
          <img src="{{ asset('/images/online-language-learning-2023.jpeg') }}" class="w-full h-full object-center object-cover"
               alt="private lessons The Weaver School">
      </div>
  </div>
</div>

<!-- End how it works -->
