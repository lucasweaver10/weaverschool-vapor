<x-layouts.app>
    <div class="bg-black min-h-screen p-12">
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4 mb-12">
                <li>
                    <div class="flex items-center">
                        <a href="/admin" class="text-sm font-medium text-gray-100 hover:text-gray-700">Admin</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                        </svg>
                        <a href="/admin/users" class="ml-4 text-sm font-medium text-gray-100 hover:text-gray-700">Users</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="text-white text-4xl font-bold">
           {{ $user->email }} <span class="text-sm">(<em>{{ $user->id }}</em>)</span>
        </div>
        <div class="text-white">
            <div class="my-5 text-3xl">Activity:</div>
            <ul class="ml-5">
                @foreach($user->events as $event)
                    @if($event->name == 'Page View')
                        @php
                            // Decode the 'properties' JSON string to an associative array
                            $properties = json_decode($event->properties, true);
                        @endphp
                        <li class="text-2xl mb-3">Viewed: {{ $properties['url'] ?? 'URL not found' }}</li>
                    @else
                        <li>{{ $event->name }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>


</x-layouts.app>
