<x-layouts.app>
<x-slot name="title">
    Account | {{ config('app.name') }}
</x-slot>
<x-dashboard.index :user="$user">
    <x-slot name="title">
        Account
    </x-slot>
    <div x-data="{ activeTab: 'account'}">
    <main>
    <h1 class="sr-only">Your Profile</h1>
    <x-dashboard.profile.subnav />

    <!-- Settings forms -->
    <div class="divide-y divide-white/5">
        <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-white">Personal Information</h2>
                <p class="mt-1 text-sm leading-6 text-gray-400">Make sure your information is up to date.</p>
            </div>

            <form class="md:col-span-2" action="{{ route('update-personal-information') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                    {{-- <div class="col-span-full flex items-center gap-x-8">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-24 w-24 flex-none rounded-lg bg-gray-800 object-cover">
                        <div>
                        <button type="button" class="rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-white/20">Change avatar</button>
                        <p class="mt-2 text-xs leading-5 text-gray-400">JPG, GIF or PNG. 1MB max.</p>
                        </div>
                    </div> --}}

                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-white">First name</label>
                        <div class="mt-2">
                        <input type="text" name="first_name" id="first-name" autocomplete="given-name" placeholder="{{ $user->first_name ?? '' }}" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-teal-500 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-white">Last name</label>
                        <div class="mt-2">
                            <input type="text" name="last_name" id="last-name" autocomplete="family-name" placeholder="{{ $user->last_name ?? '' }}" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-teal-500 sm:text-sm sm:leading-6">
                        </div>
                    </div>                    
                </div>

                <div class="mt-8 flex">
                    <button type="submit" class="rounded-md bg-teal-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">Save</button>
                </div>
            </form>
        </div>

        <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-white">Email Address</h2>
                <p class="mt-1 text-sm leading-6 text-gray-400">Make sure your contact information is up to date to maintain account access.</p>
            </div>

            <form class="md:col-span-2" action="{{ route('update-email-address') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">                    
                    <div class="col-span-full">
                        <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" placeholder="{{ $user->email ?? '' }}" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-teal-500 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex">
                    <button type="submit" class="rounded-md bg-teal-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">Save</button>
                </div>
            </form>
        </div>                

        {{-- <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-white">Delete account</h2>
                <p class="mt-1 text-sm leading-6 text-gray-400">No longer want to use our service? You can delete your account here. This action is not reversible. All information related to this account will be deleted permanently.</p>
            </div>

            <form class="flex items-start md:col-span-2">
                <button type="submit" class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400">Yes, delete my account</button>
            </form>
        </div> --}}
    </div>
    </main>
    </div>
</x-dashboard.index>
</x-layouts.app>
