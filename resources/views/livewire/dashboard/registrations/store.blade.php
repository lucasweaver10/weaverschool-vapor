<div>
    <main class="relative mx-auto lg:px-8 xl:gap-x-48">
        <h1 class="sr-only">Registration information</h1>

        <section aria-labelledby="summary-heading" class="bg-gray-50 px-4 pt-16 pb-10 sm:px-6 lg:col-start-2 lg:row-start-1 lg:bg-transparent lg:px-0 lg:pb-16">
        <div class="mx-auto max-w-lg lg:max-w-none">
            <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Registration summary</h2>

            <ul role="list" class="divide-y divide-gray-200 text-sm font-medium text-gray-900">
            <li class="flex items-start space-x-4 py-6">
                <img src="{{ $course->image }}" alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps." class="h-20 w-20 flex-none rounded-md object-cover object-center">
                <div class="flex-auto space-y-1">
                <h3>{{ $course->name }}</h3>
{{--                <p class="text-gray-500">{{ ucfirst($course->type) }}</p>--}}
                <!-- Need to create plans, pull the plan in the controller from the request, and then put plan information including price down below -->
                <p class="text-gray-500">{{ $plan->name }}</p>
                </div>
                <p class="flex-none text-2xl font-medium">@lang('currency.symbol'){{ $plan->monthly_price }}@if($plan->times > 1)/mo @endif</p>
            </li>

            <!-- More products... -->
            </ul>



            @if($plan->times > 1)
                <dl class="hidden space-y-6 border-t border-gray-200 pt-6 text-sm font-medium text-gray-900 lg:block">
                <div class="flex items-center justify-between">
                    <dt class="text-gray-600">Monthly amount</dt>
                    <dd>@lang('currency.symbol'){{ $plan->monthly_price }}</dd>
                </div>

                <div class="flex items-center justify-between">
                    <dt class="text-gray-600">Number of payments</dt>
                    <dd>{{ $plan->times }}</dd>
                </div>

                <div class="flex items-center justify-between">
                    <dt class="text-gray-600">Total amount</dt>
                    <dd>€{{ $plan->total_price }}</dd>
                </div>
            @endif

            <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                <dt class="text-2xl font-bold">Total due today</dt>
                <dd class="text-2xl font-bold">@lang('currency.symbol'){{ $plan->monthly_price }}</dd>
            </div>
            </dl>

            <div class="fixed inset-x-0 bottom-0 flex flex-col-reverse text-sm font-medium text-gray-900 lg:hidden">
            <div class="relative z-10 border-t border-gray-200 bg-white px-4 sm:px-6">
                <div class="mx-auto max-w-lg">
                <button type="button" class="flex w-full items-center py-6 font-medium" aria-expanded="false">
                    <span class="mr-auto text-base">Total</span>
                    <span class="mr-2 text-base">@lang('currency.symbol'){{ $plan->total_price }}</span>
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z" clip-rule="evenodd" />
                    </svg>
                </button>
                </div>
            </div>

{{--            <div>--}}
{{--                <!----}}
{{--                Mobile summary overlay, show/hide based on mobile summary state.--}}

{{--                Entering: "transition-opacity ease-linear duration-300"--}}
{{--                    From: "opacity-0"--}}
{{--                    To: "opacity-100"--}}
{{--                Leaving: "transition-opacity ease-linear duration-300"--}}
{{--                    From: "opacity-100"--}}
{{--                    To: "opacity-0"--}}
{{--                -->--}}
{{--                <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>--}}

{{--                <!----}}
{{--                Mobile summary, show/hide based on mobile summary state.--}}

{{--                Entering: "transition ease-in-out duration-300 transform"--}}
{{--                    From: "translate-y-full"--}}
{{--                    To: "translate-y-0"--}}
{{--                Leaving: "transition ease-in-out duration-300 transform"--}}
{{--                    From: "translate-y-0"--}}
{{--                    To: "translate-y-full"--}}
{{--                -->--}}
{{--                <div class="relative bg-white px-4 py-6 sm:px-6">--}}
{{--                <dl class="mx-auto max-w-lg space-y-6">--}}
{{--                    <div class="flex items-center justify-between">--}}
{{--                    <dt class="text-gray-600">Total due today</dt>--}}
{{--                    <dd>@lang('currency.symbol'){{ $plan->monthly_price }}</dd>--}}
{{--                    </div>--}}

{{--                    <div class="flex items-center justify-between">--}}
{{--                    <dt class="text-gray-600">Number of payments</dt>--}}
{{--                    <dd>3</dd>--}}
{{--                    </div>--}}

{{--                    --}}{{-- <div class="flex items-center justify-between">--}}
{{--                    <dt class="text-gray-600">Taxes</dt>--}}
{{--                    <dd>$26.80</dd>--}}
{{--                    </div> --}}
{{--                </dl>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            </div>--}}
        </div>
        <div class="mt-10 border-t border-gray-200 pt-6 sm:flex sm:items-center sm:justify-between">
            <button wire:click="register" class="w-full rounded-lg border border-transparent bg-blue-400 py-3 px-5 text-base font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:order-last sm:ml-6 sm:w-auto">Confirm</button>
            <p class="mt-4 text-center text-sm text-gray-500 sm:mt-0 sm:text-left">You won't be charged until the next step.</p>
        </div>
        </section>
    </main>
    <x-alerts.error />
</div>
