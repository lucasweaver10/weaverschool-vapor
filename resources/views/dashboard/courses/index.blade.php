<x-layouts.app>
    <x-dashboard.index>
        <x-slot name="title">
            My Courses
        </x-slot>
        @if(count($registrations) !== 0)
            <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-1 lg:grid-cols-1">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No active courses yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by registering for a course.</p>
                    <div class="mt-6">
                        <a href="/{{ session('locale') ?? 'en' }}/dashboard/registrations/create" type="button" class="inline-flex items-center px-4 py-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-400 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                            <!-- Heroicon name: solid/plus -->
                            <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Register for a course
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="mt-5">
                <section class="mt-8 pb-16" aria-labelledby="gallery-heading">
                    <h2 id="gallery-heading" class="sr-only">Recently viewed</h2>
                    <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach($registrations as $registration)
                            <li class="relative">
                                <!-- Current: "ring-2 ring-blue-500 ring-offset-2", Default: "focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100" -->
                                <div class="focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 aspect-w-10 aspect-h-7 group block w-full overflow-hidden rounded-lg bg-gray-100">
                                <!-- Current: "", Default: "group-hover:opacity-75" -->
                                <img src="{{ $registration->course->image }}" alt="{{ $registration->course->name}} online from the Weaver School" class="object-cover">
                                {{-- <button type="button" class="absolute inset-0 focus:outline-none">
                                    <span class="sr-only">View course</span>
                                </button> --}}
                                </div>
                                <a href="/{{ session('locale') }}/dashboard/courses/{{ $registration->course->id }}/overview" class="unstyled mt-3 block text-md font-medium text-gray-900">{{ $registration->course->name }}</a>
                                <span class="inline-flex rounded-full @if($registration->status === 'Active')bg-green-100 text-green-800 @elseif($registration->status === 'Pending') bg-yellow-200 text-yellow-800 @elseif($registration->status === 'Completed') bg-blue-100 text-blue-800 @else bg-gray-100 text-gray-800 @endif px-2 text-xs font-semibold leading-5 ">{{ $registration->status }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>
            </div>
        @endif
    </x-dashboard.index>
</x-layouts.app>
