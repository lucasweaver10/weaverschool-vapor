<div>
    <div class="lg:grid lg:grid-cols-1 lg:gap-y-8 mb-5">
        <div class="group relative">
            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden mb-4 shadow-sm">
                <img src="{{ $teacher->image }}" class="w-full h-72 object-center object-cover" alt="private lessons The Weaver School">
            </div>
            <div class="mb-2"><a href="/teachers/{{ $teacher->id }}" class="unstyled text-4xl text-dark">{{ $teacher->first_name }}</a><span class="text-sm ml-3 font-medium">{{ $teacher->nationality }} | {{ $teacher->years_experience }} @lang('teachers/index.years_experience')</span></div>
            @foreach($teacher->specialties as $specialty)<span class="inline-flex items-center px-3 py-1 mx-1 my-1 rounded-full
            text-sm font-medium bg-blue-400 text-white">{{ $specialty->name }}</span>@endforeach
{{--            <div class="mt-3">@if (Auth::check())€{{ $teacher->gross_hourly_rate }}/hour @else Log in to view hourly rate @endif</div>--}}
            <div class="text-xl font-bold mt-3 text-dark">€{{ $teacher->gross_hourly_rate }}/@lang('teachers/index.hour')</div>
        </div>
    </div>
</div>
