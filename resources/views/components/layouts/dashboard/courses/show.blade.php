<x-layouts.app>
    <x-dashboard.index>
        <x-slot name="title">
            {{ $course->name }}
        </x-slot>
        <div class="mx-auto mt-8 grid max-w-3xl grid-cols-1 gap-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-span-2 lg:col-start-1">
                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    {{ $content }}
                </div>
            </div>
            <div class="space-y-6 lg:col-span-1 lg:col-start-3">
                <div class="bg-white px-4 pt-3 pb-5 shadow sm:rounded-lg sm:px-6">
                    <h2 id="timeline-title" class="mb-3 text-lg font-medium text-gray-900">Course Menu</h2>

                    <nav class="space-y-1" aria-label="Sidebar">
                        <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                        <a href="lessons" class="@if(request()->routeIs('dashboard.lessons.index*')) bg-black text-white @else bg-white text-black @endif  hover:bg-black hover:text-white flex items-center rounded-md px-3 py-2 text-sm font-medium">
                            <span class="truncate">Lessons</span>
                        </a>

                        <a href="progress" class="@if(request()->routeIs('dashboard.courses.progress*')) bg-black text-white @else bg-white text-black @endif  hover:bg-black hover:text-white flex items-center rounded-md px-3 py-2 text-sm font-medium">
                            <span class="truncate">Progress</span>
                        </a>

                        <a href="{{ route('dashboard.courses.show', ['locale' => session('locale'), 'id' => $course->id ])}}"
                           class="@if(request()->routeIs('dashboard.courses.show')) bg-black text-white @else bg-white text-black @endif  hover:bg-black over:text-white flex items-center rounded-md px-3 py-2 text-sm font-medium" aria-current="page">
                            <span class="truncate">Overview</span>
                        </a>
                    </nav>

                    </ul>
                </div>
            </div>
        </div>
    </x-dashboard.index>
</x-layouts.app>
