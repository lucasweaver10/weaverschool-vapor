<div x-data="{ isOpen: false, isVisible: false, tab: @entangle('tab').live, content: @entangle('content').live }">
<div class="bg-gray-100 font-family-karla flex">
<livewire:dashboard.sidebar :user="$user" :registrations="$registrations" />
<div class="relative w-full flex flex-col h-screen overflow-y-hidden">
{{-- <x-student.header>--}}
{{--</x-student.header> --}}
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-5">

            <!-- Complete Profile -->
            <div x-cloak x-show=" tab === 'dashboard' ">
                @if($user->profile_complete == 0)
                <h1 class="mb-4">Welcome to The Weaver School</h1>
                @else
                <h1 class="mb-4">Welcome, {{ $user->first_name ?? '' }}</h1>
                @endif                
            </div>
            <!-- End Complete Profile -->

            <!-- Welcome -->
            @unless($user->profile_complete == 0)
                <div x-cloak x-show=" tab === 'dashboard' " class="px-4 py-3 mb-5 bg-white sm:rounded-lg shadow overflow-hidden">
                    <div class="mt-2 mb-4">
                        @if(count($registrations) < 0)
                            <h4>This is your student dashboard.</h4>
                            <p>Here you will find your course information and assignments. To register for a course, click on the
                                "Registration" tab to the left.</p>
                        @else
                            <p>Use the sidebar to the left to browse course information and assignments.</p>
                        @endif
                    </div>
                </div>
                <div x-cloak x-show=" tab === 'dashboard' ">
                    <livewire:dashboard.welcome :registrations="$registrations" :openAssignments="$openAssignments"
                                                :gradedAssignments="$gradedAssignments" />
                </div>
            @endunless

            <!-- End Welcome -->


            <!-- Active Courses -->
            @foreach ($registrations as $registration)
            <div x-cloak x-show=" tab === {{ $registration->id }} ">
                <livewire:dashboard.courses.show :registration="$registration" :key="$registration->id" />
            </div>
            @endforeach
            <!-- End Active Courses -->

            <!-- Quizzes -->
            <div x-cloak x-show=" content === 'quizzes' ">
                <livewire:dashboard.quizzes.index />
            </div>
            <!-- End Quizzes -->

            <!-- Registration -->
            <div x-cloak x-show=" tab === 'register' ">
                <livewire:registrations.registration-tab :user="$user" :privateLessons="$privateLessons" :subcategories="$subcategories" :teachers="$teachers" :courses="$courses"/>
            </div>
            <!-- End Registration -->

            <!-- Payments -->
            <div x-cloak x-show=" tab === 'payments' ">
                <x-dashboard.payments :registrations="$registrations" />
            </div>
            <!-- End Payments -->

            <div x-cloak x-show=" tab === 'subscriptions' ">
                <x-dashboard.subscription-tab :user="$user" :registrations="$registrations" :subscriptions="$subscriptions" />
            </div>

            <!-- Company -->
{{--            <div x-cloak x-show=" tab === 'company' ">--}}
{{--                <livewire:dashboard.company.index :user="$user" />--}}
{{--            </div>--}}
            <!-- End invoices -->

            <!-- Invoices -->
            <div x-cloak x-show=" tab === 'invoices' ">
                <livewire:dashboard.invoices :user="$user" :registrations="$registrations" />
            </div>
            <!-- End invoices -->

            <!-- Level Test -->
            <div x-cloak x-show=" tab === 'levelTest' ">
                <x-dashboard.level-test :user="$user" :levelTestId="$levelTestId" :questions="$questions" />
            </div>
            <!-- End Level Test -->


        </main>
        <x-alerts.success>
        </x-alerts.success>
    </div>
</div>
</div>
</div>
