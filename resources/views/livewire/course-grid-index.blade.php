<div>
    <section aria-labelledby="products-heading" class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 id="products-heading" class="sr-only">Courses</h2>
        <h2 class="text-4xl tracking-tight font-extrabold mb-12">Choose your course...</h2>
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-12">
            @foreach($courses as $course)
                <div class="group block rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out bg-white flex flex-col">
                    <a href="{{ url()->current() }}/{{ $course->slug }}" class="block flex-grow">
                        <div class="overflow-hidden">
                            <img src="{{ $course->image }}" alt="{{ $course->name }} featured image" class="h-72 w-full object-cover transform group-hover:scale-105 transition-transform duration-300 ease-in-out">
                        </div>
                        <div class="px-5 py-5">
                            <h3 class="text-xl font-bold text-teal-900 mb-2 group-hover:text-teal-600">{{ $course->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $course->description }}</p>
                        </div>
                    </a>
                    <div class="px-5 py-3 bg-gray-50 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">{{ count($course->lessons) }} Lessons</span>
                            <span class="px-3 py-1 rounded-lg text-sm font-medium {{ $course->status == 'Available' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">{{ $course->status }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
