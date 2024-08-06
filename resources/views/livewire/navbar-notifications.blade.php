 <div x-data="{ isOpen: false }" class="relative">
        <div class="my-auto">
            <button @click="isOpen = !isOpen
            if (isOpen) {
                Livewire.dispatch('getNotifications')
                } "
                    class="mt-3 mr-3 align-content-middle">                
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-gray-900 dark:text-gray-100">
                  <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
                </svg>
                @if(count($unreadNotifications) > 0)
                    <div class="absolute rounded-full bg-red-500 text-white text-xs w-5 h-5 flex justify-center
                        items-center border-2 ml-1 -mt-8">
                         {{ count($unreadNotifications) }}
                    </div>
                @endif
            </button>
        </div>
        <ul class="absolute rounded-xl max-h-96 overflow-scroll w-76 md:w-96 text-left text-gray-700 text-sm border-2 
                    bg-white shadow-dialog max-h-128 overflow-y-auto z-10 -right-28 md:-right-12 mr-12"
            x-cloak
            x-show="isOpen" x-transition.origin.top
            @click.away="isOpen = false"
            @keydown.escape.window="isOpen = false"
        >
            <div class="px-4">
                <h5 class="py-3 text-left font-bold text-md">Notifications</h5>

                {{-- <a href="" class="unstyled">
                    <svg class="h-5 w-5 float-right -mt-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756
                          2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0
                          001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37
                          2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0
                          00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924
                          0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07
                          2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6
                          0 3 3 0 016 0z" />
                    </svg>
                </a> --}}
            </div>

            <hr class="mb-0">

            @foreach($notifications as $notification)
                <li class="flex items-center p-4 bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out hover:bg-gray-50">
                    <div class="flex-shrink-0">
                        @if ($notification->read_at == null)
                            <!-- Unread notification icon -->
                            <svg class="h-6 w-6 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2
                                    2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        @else
                            <!-- Read notification icon -->
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2
                                0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2
                                0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0
                                01-2.22 0l-1.14-.76" />
                            </svg>
                        @endif
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between items-center">
                            <strong class="text-sm font-medium text-gray-900">{{ $notification->data['notification_title'] ?? '' }}</strong>
                            <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">{!! $notification->data['notification_message'] ?? '' !!}</p>
                    </div>
                </li>
            @endforeach


            @if(count($notifications) < 1)
                <li class="">
                    <p class="my-4 text-center">Your notifications live here.</p>
                </li>
            @endif

            <hr class="mt-0">
            <div class="bg-teal-700 px-4 py-3 text-xs text-right font-bold text-white hover:text-gray-300">
                <a @click="Livewire.dispatch('markAllAsRead')" href="" class="unstyled pr-1">
                    Mark all as read
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3 h-3 inline mb-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </a>
            </div>
        </ul>
 </div>

