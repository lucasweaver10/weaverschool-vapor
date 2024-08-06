<div x-data="{ tab: @entangle('tab').live, content: @entangle('content').live }" class="mt-3">
    <!-- Tabs navigation -->
    <div class="mb-5">
        <div class="sm:hidden">
            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
            <select id="tabs" x-model="content" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="overview">Overview</option>

                <option value="viewAssignments">Assignments</option>

                <option value="createAssignment">Create Assignment</option>

                <option value="addHours">Hours</option>
            </select>
        </div>
        <div class="hidden sm:block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a @click="content = 'overview' " href="#" class="unstyled hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" :class="content === 'overview' ? 'border-b-4 border-blue-400 text-blue-400' : 'border-transparent text-gray-500' "> Overview </a>

                    <a @click="content = 'viewAssignments' " href="#" class="unstyled border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" :class="content === 'viewAssignments' ? 'border-b-4 border-blue-400 text-blue-400' : 'border-transparent text-gray-500' "> Assignments </a>

{{--                    <a @click="content = 'createAssignment' " href="#" class="unstyled border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" :class="content === 'createAssignment' ? 'border-b-4 border-blue-400 text-blue-400' : 'border-transparent text-gray-500' "> New Assignment </a>--}}

                    <a @click="content = 'addHours' " href="#" class="unstyled border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" :class="content === 'addHours' ? 'border-b-4 border-blue-400 text-blue-400' : 'border-transparent text-gray-500' "> Hours </a>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Tabs Nav -->

    <div x-show="content === 'overview' " class="bg-white border border-1 border-gray-300 shadow-sm overflow-hidden sm:rounded-md px-4 mb-5">
      <div class="mt-4">
          <h4 class="">
            Course Information
          </h4>
      </div>
        <div class="col-span-3">
            <div class="px-4 pt-3 pb-3 sm:px-6">
                <ul class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <li class="sm:col-span-1">
                        <div class="text-md font-medium text-gray-900">Student</div>
                        <div class="mt-1 text-md text-gray-900">{{ $registration->user->first_name . ' ' . $registration->user->last_name }}</div>
                    </li>
                    <li class="sm:col-span-1">
                        <div class="text-md font-medium text-gray-900">Email Address</div>
                        <div class="mt-1 text-md text-gray-900">{{ $registration->user->email }}</div>
                    </li>
                    <li class="sm:col-span-1">
                        <div class="text-md font-medium text-gray-900">Completed Quizzes</div>
                        <div class="mt-1 text-md text-gray-900">{{ $registration->quizAssignments->where('completed_at', '!==' , null)->count() }} / {{ count($registration->quizAssignments) }}</div>
                    </li>
                    <li class="sm:col-span-1">
                        <div class="text-md font-medium text-gray-900">Completed Assignments</div>
                        <div class="mt-1 text-md text-gray-900">{{ $registration->assignments->where('status', 'completed')->count() + $registration->assignments->where('status', 'graded')->count() }} / {{ count($registration->assignments) }}</div>
                    </li>
                    <li class="sm:col-span-1">
                        <div class="text-md font-medium text-gray-900">Hours Remaining</div>
                        <div class="mt-1 text-md text-gray-900">{{ $registration->total_hours - $registration->hours_completed }}</div>
                    </li>
                    <li class="sm:col-span-1">
                        <div class="text-md font-medium text-gray-900">Overall Grade</div>
                        <div class="mt-1 text-md text-gray-900">@if(count($registration->assignments) > 0){{ number_format($totalPoints / $possiblePoints, 2) }} / 10 @endif</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

        <div class="mb-4" x-cloak x-show="content === 'viewAssignments' ">
          <livewire:myteacher.courses.assignments.index :registration="$registration"/>
        </div>
        <div class="mb-4" x-cloak x-show="content === 'addHours' ">
          <livewire:myteacher.courses.add-hours :registration="$registration"/>
        </div>
    </div>
  <x-alerts.success>
  </x-alerts.success>
</div>
