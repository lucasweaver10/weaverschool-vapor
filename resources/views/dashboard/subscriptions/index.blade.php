<x-layouts.app>
    <x-slot name="title">
        Subscriptions | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Your Subscriptions
        </x-slot>
        <div class="max-w-xl mx-auto mt-12">
            <ul class="space-y-4">
                @foreach($subscriptions as $subscription)
                    <li class="bg-white shadow-lg rounded-lg border border-.5 border-gray-300 hover:border-teal-400 overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div class="py-4 px-8 flex justify-between items-center">
                            <!-- Subscription icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 rounded-full">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>

                            <!-- Subscription details -->
                            <div class="flex-grow ml-4">
                                <span class="text-lg font-semibold text-gray-900 transition-colors duration-300">
                                    {{ $subscription->type }}
                                </span>
                                {{-- <p class="text-xs text-gray-500">
                                    @if($subscription->ends_at !== null && now() > $subscription->ends_at)
                                        Ended on {{ \Carbon\Carbon::parse($subscription->ends_at)->format('M d, Y') }}
                                    @elseif($subscription->ends_at !== null && now() < $subscription->ends_at)
                                        Ends on {{ \Carbon\Carbon::parse($subscription->ends_at)->format('M d, Y') }}
                                    @else
                                        Renews on {{ \Carbon\Carbon::parse($subscription->next_payment_date)->format('M d, Y') ?? '' }}
                                    @endif
                                </p> --}}
                            </div>
                            @if($subscription->stripe_status !== 'canceled')                             
                                <!-- Active with green dot -->
                                <div class="flex items-center mr-8">
                                    <span class="block h-2 w-2 bg-teal-500 rounded-full mr-2"></span>
                                    <span class="text-sm font-bold text-teal-500 hover:text-teal-800 transition-colors duration-300">{{ ucfirst($subscription->stripe_status) }}</span>
                                </div>
                                <!-- Manage button -->                                
                                <a target="_blank" href="/billing" class="ml-auto text-right text-xs font-bold bg-teal-500 hover:bg-teal-700 rounded-md py-2 px-2 text-white transition-colors duration-300">
                                Manage</a>
                            @else
                                <span class="text-sm font-bold text-red-500 hover:text-red-800 transition-colors duration-300">{{ ucfirst($subscription->stripe_status) }}</span>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <x-alerts.success />
        <x-alerts.error />
    </x-dashboard.index>
</x-layouts.app>
