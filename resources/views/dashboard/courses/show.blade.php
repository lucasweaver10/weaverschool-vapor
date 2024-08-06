<x-layouts.dashboard.courses.show :course="$course">
    <x-slot name="title">
    </x-slot>
    <x-slot name="content">

        <div class="p-4">
          <div class="px-4 pt-4 pb-3 sm:px-6">
              <h2 class="text-lg font-medium leading-6 text-gray-900">Registration Information</h2>
              {{-- <p class="max-w-2xl text-sm text-gray-500">Having some details here seems to make the design look better.</p> --}}
          </div>
          <div class="border-t border-gray-200 px-4 pt-4 sm:px-6">
              <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                  <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Plan</dt>
                      <dd class="mt-1 text-sm text-gray-900">{{ $registration->plan->name ?? '' }}</dd>
                  </div>
                  <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Level</dt>
                      <dd class="mt-1 text-sm text-gray-900">{{ $registration->course->level ?? '' }}</dd>
                  </div>
                  <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Start Date</dt>
                      <dd class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($registration->created_at)->format('F j, Y') }}</dd>
                  </div>
                  <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Lessons Completed</dt>
                      <dd class="mt-1 text-sm text-gray-900">{{ count($registration->lessonProgresses->where('completed_at', '!==', null)) }}</dd>
                  </div>
                  <div class="sm:col-span-2">
                      <dt class="text-sm font-medium text-gray-500">Description</dt>
                      <dd class="mt-1 text-sm text-gray-900">{!! $registration->course->about ?? '' !!}</dd>
                  </div>

{{--                  @if(count($registration->payments) > 0)--}}
{{--                    <div class="sm:col-span-2">--}}
{{--                        <dt class="text-sm font-medium text-gray-500">Payments</dt>--}}
{{--                        <dd class="mt-1 text-sm text-gray-900">--}}
{{--                        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">                      --}}
{{--                            @foreach($registration->payments as $payment)--}}
{{--                                <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">--}}
{{--                                <div class="flex w-0 flex-1 items-center">--}}
{{--                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                    <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
{{--                                    <span class="ml-2 w-0 flex-1 truncate">{{ $payment->id }}.pdf</span>--}}
{{--                                </div>--}}
{{--                                <div class="ml-4 flex-shrink-0">--}}
{{--                                    <a href="#" class="font-medium text-blue-400 hover:text-blue-500">Download</a>--}}
{{--                                </div>--}}
{{--                                </li>--}}
{{--                            @endforeach                          --}}
{{--                        </ul>--}}
{{--                        </dd>--}}
{{--                    </div>--}}
{{--                  @endif--}}
              </dl>
          </div>
        </div>
    </x-slot>
</x-layouts.dashboard.courses.show>
