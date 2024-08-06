<x-layouts.app>
  <x-slot name="title">
    {{ $teacher->first_name }} | The Weaver School
  </x-slot>
  <x-slot name="description">
    {{ $teacher->first_name }}, teacher at The Weaver School.
  </x-slot>

<div class="section bg-light">
    <div class="grid items-center grid-cols-1 gap-y-16 sm:px-12 py-12 sm:py-16 lg:max-w-7xl md:px-20 lg:px-48 md:grid-cols-2">

        <div class="mx-28 md:mx-auto">
            <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-6xl mb-4">{{ $teacher->first_name }}</h2>
            <p class="text-xl mb-4">{{ $teacher->about }}</p>

            <div class="mb-4">
                <div class=""><strong>Specialties:</strong> {{ $teacher->specialties }}</div>
                <div class=""><strong>Nationality:</strong> {{ $teacher->nationality }}</div>
                <div class=""><strong>Hourly rate:</strong> @if (Auth::check())€{{ $teacher->gross_hourly_rate }} @else Log in to view @endif</div>
            </div>

            <a class="btn btn-primary btn-lg w-1/2 lg:w-1/3" role="button"
            @if (Auth::check()) href="/dashboard"
            @else href="/register"
            @endif >Book lessons</a>

        </div>

        <div class="">
            <img src="{{ $teacher->image }}" alt="english teachers" class="h-96 rounded-lg mx-auto sm:ml-auto">
        </div>

    </div>
</div>

<div class="container">
  <div class="row no-gutters">
    <div class="col-0 col-md-2"></div>
    <div class="col-12 col-lg-8">
    </div>
    <div class="col-0 col-md-2"></div>
  </div>

@if (Auth::check())
  <x-cta.user />
@else
  <x-cta.visitor />
@endif

  </div>
</div>
{{-- <div class="container">
  <div class="row">
    <div class="col-12">
      <!-- Calendly inline widget begin -->
      <div class="calendly-inline-widget" data-url="{{ $teacher->calendly_link }}?hide_gdpr_banner=1" style="min-width:320px;height:630px;"></div>
      <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
      <!-- Calendly inline widget end -->
    </div>
  </div>
</div> --}}

</x-layouts.app>
