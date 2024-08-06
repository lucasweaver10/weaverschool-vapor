<div x-data="{ isOpen: false, tab: @entangle('tab').live, content: @entangle('content').live, showMobileMenu: false, }">
    <aside class="relative bg-blue-400 h-screen w-72 hidden sm:block top-0">
        {{-- <div class="p-6">
          <a href="/">
            <img class="h-20 mx-auto" src="/images/logos/The Weaver School logo full.png" />
          </a>
        </div> --}}
        <nav class="text-white text-base font-semibold pt-12">
            <a href="#" wire:click="setTab('dashboard')" class="unstyled flex items-center text-white hover:opacity-100 py-1 pl-6 nav-item"
               :class="tab === 'dashboard' ? 'opacity-50' : '' ">
                <i class="fas fa-tachometer-alt mr-3"></i>
                @lang('dashboard/index.dashboard')
            </a>

            @unless($user->profile_complete == 0)
                @if(count($registrations) > 0)
                <a @click="isOpen = !isOpen" href="#" class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item "
                   :class="isOpen ? 'opacity-50' : '' ">
                  <i class="fas fa-sticky-note mr-3"></i>
                    @lang('dashboard/index.courses')
                </a>
                @endif
                <div x-cloak x-show="isOpen" >
                  @foreach ($registrations as $registration)
                    <a wire:click=" setTab({{ $registration->id }}) " href="#" class="unstyled flex items-center active-nav-link
                    text-white hover:opacity-50 py-1 pl-6 nav-item ml-2 mr-2"
                       :class="tab === {{ $registration->id }} ? 'opacity-50' : '' ">
                      <i class="fas fa-sticky-note mr-3"></i>
                      {{ $registration->private_lessons_name ?? $registration->course_name }}
                    </a>
                    <div x-cloak x-show="tab === {{ $registration->id }}" >
                        <div class="pl-6">
                        <a class="unstyled flex items-center active-nav-link hover:opacity-50 text-white py-1 pl-6 nav-item ml-2 mr-2"
                           :class="content === 'assignments' ? 'opacity-50' : '' " href="#" wire:click.prevent="selectContent('assignments') ">Assignments</a>
                        </div>
                        <div class="pl-6">
                            <a class="unstyled flex items-center active-nav-link hover:opacity-50 text-white py-1 pl-6 nav-item ml-2 mr-2"
                               :class="content === 'quizzes' ? 'opacity-50' : '' " href="#" wire:click.prevent="selectContent('quizzes') ">Quizzes</a>
                        </div>
                    </div>
                  @endforeach
                </div>

                <a href="#" wire:click=" setTab('register')" class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item"
                   :class="tab === 'register' ? 'opacity-50' : '' ">
                  <i class="fas fa-sticky-note mr-3"></i>
                    @lang('dashboard/index.registration')
                </a>

                <a href="#" wire:click=" setTab('payments')" class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item"
                   :class="tab === 'payments' ? 'opacity-50' : '' ">
                  <i class="fas fa-sticky-note mr-3"></i>
                    @lang('dashboard/index.payments')
                </a>

                <a href="#" wire:click=" setTab('subscriptions')" class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item"
                   :class="tab === 'subscriptions' ? 'opacity-50' : '' ">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Subscriptions
                </a>


{{--                <a href="#" wire:click=" setTab('company')" class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item"--}}
{{--                   :class="tab === 'company' ? 'opacity-50' : '' ">--}}
{{--                    <i class="fas fa-sticky-note mr-3"></i>--}}
{{--                    @lang('dashboard/index.company')--}}
{{--                </a>--}}

                <a href="#" wire:click=" setTab('invoices')" class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item"
                   :class="tab === 'invoices' ? 'opacity-50' : '' ">
                  <i class="fas fa-sticky-note mr-3"></i>
                    @lang('dashboard/index.invoices')
                </a>

                <a href="#levelTest" wire:click=" setTab('levelTest')" class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item"
                   :class="tab === 'levelTest' ? 'opacity-50' : '' ">
                  <i class="fas fa-sticky-note mr-3"></i>
                    @lang('dashboard/index.level_test')
                </a>
            @endunless

            <a class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
              <i class="fas fa-sticky-note mr-3"></i>
              @lang('dashboard/index.logout')
            </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>

        </nav>
    </aside>
</div>
