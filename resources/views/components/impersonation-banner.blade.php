@if(session()->has('impersonate'))
    <div class="relative bg-red-600">
        <div class="max-w-screen-xl mx-auto pt-3 pb-2 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-white">
                            <span class="md:hidden">
                                You are impersonating {{auth()->user()->first_name ?? ''}} {{auth()->user()->last_name ?? ''}}
                            </span>
                    <span class="hidden md:inline">
                                You are impersonating {{auth()->user()->first_name ?? ''}} {{auth()->user()->last_name ?? ''}}
                            </span>
                    <span class="block sm:ml-2 sm:inline-block">
                                <a href="{{route('leave-impersonation')}}" class="text-white font-bold underline">
                                    Leave Impersonation &rarr;
                                </a>
                            </span>
                </p>
            </div>
        </div>
    </div>
@endif
