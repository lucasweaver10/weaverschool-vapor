<x-layouts.app>
<x-slot name="title">
    Communication Preferences | {{ config('app.name') }}
</x-slot>
<x-dashboard.index :user="$user">
    <x-slot name="title">
        Communication Preferences
    </x-slot>
    <div x-data="{ activeTab: 'account'}">
    <main>
    <h1 class="sr-only">Communication Preferences</h1>
    <x-dashboard.profile.subnav />

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Settings forms -->
    <div class="divide-y divide-white/5">
        <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-white">Email Preferences</h2>
                <p class="mt-1 text-sm leading-6 text-gray-400">Make sure your choices are up to date so you don't miss anything important.</p>
            </div>

                <form class="md:col-span-2" action="{{ route('communications.store') }}" method="POST">
                @csrf

                    <input type="hidden" name="general_updates" value="0">
                    <input type="hidden" name="promotional_offers" value="0">
                    <input type="hidden" name="newsletter" value="0">
                    <input type="hidden" name="spaced_repetition" value="0">
                    <input type="hidden" name="processing_notifications" value="0">

                    <fieldset>
                      <legend class="sr-only">Notifications</legend>
                      <div class="space-y-5">
                        <div class="relative flex items-start">
                          <div class="flex h-6 items-center">
                            <input id="general-updates" aria-describedby="general-updates-description" name="general_updates" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-teal-600 focus:ring-teal-600" @if($preferences->general_updates) checked @endif>
                          </div>
                          <div class="ml-3 text-sm leading-6">
                            <label for="general-updates" class="font-medium text-gray-100">General updates</label>
                            <span id="general-updates-description" class="text-gray-400"><span class="sr-only">General updates </span>so you always know what's happening.</span>
                          </div>
                        </div>
                        <div class="relative flex items-start">
                          <div class="flex h-6 items-center">
                            <input id="promotional-offers" aria-describedby="promotional-offers-description" name="promotional_offers" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-teal-600 focus:ring-teal-600" @if($preferences->promotional_offers) checked @endif>
                          </div>
                          <div class="ml-3 text-sm leading-6">
                            <label for="promotional-offers" class="font-medium text-gray-100">Promotional offers</label>
                            <span id="promotional-offers-description" class="text-gray-400"><span class="sr-only">Promotional offers </span>so you always get the best deal.</span>
                          </div>
                        </div>
                        <div class="relative flex items-start">
                          <div class="flex h-6 items-center">
                            <input id="newsletter" aria-describedby="newsletter-description" name="newsletter" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-teal-600 focus:ring-teal-600" @if($preferences->newsletter) checked @endif>
                          </div>
                          <div class="ml-3 text-sm leading-6">
                            <label for="newsletter" class="font-medium text-gray-100">Newsletter</label>
                            <span id="newsletter-description" class="text-gray-400"><span class="sr-only">Newsletter </span>so you get all our language learning tips once a month.</span>
                          </div>
                        </div>
                        <div class="relative flex items-start">
                          <div class="flex h-6 items-center">
                            <input id="spaced-repetition" aria-describedby="spaced-repetition-description" name="spaced_repetition" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-teal-600 focus:ring-teal-600" @if($preferences->spaced_repetition) checked @endif>
                          </div>
                          <div class="ml-3 text-sm leading-6">
                            <label for="spaced-repetition" class="font-medium text-gray-100">Spaced repetition reminders</label>
                            <span id="spaced-repetition-description" class="text-gray-400"><span class="sr-only">Spaced repetition reminders </span>so you never forget when to study.</span>
                          </div>
                        </div>
                        <div class="relative flex items-start">
                          <div class="flex h-6 items-center">
                            <input id="processing-notifications" aria-describedby="processing-notifications-description" name="processing_notifications" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-teal-600 focus:ring-teal-600" @if($preferences->processing_notifications) checked @endif>
                          </div>
                          <div class="ml-3 text-sm leading-6">
                            <label for="processing-notifications" class="font-medium text-gray-100">Processing notifications</label>
                            <span id="processing-notifications-description" class="text-gray-400"><span class="sr-only">Processing notifications </span>so you know when your requested content is ready to use.</span>
                          </div>
                        </div>
                      </div>
                    </fieldset>

                <div class="mt-8 flex">
                    <button type="submit" class="rounded-md bg-teal-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">Save</button>
                </div>
                </form>
        </div>
       
    </div>
    </main>
    </div>
    <x-alerts.success />
    <x-alerts.error />
</x-dashboard.index>
</x-layouts.app>
