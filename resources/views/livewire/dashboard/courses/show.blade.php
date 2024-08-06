<div x-data="{ tab: @entangle('tab').live, content: @entangle('content').live, }">
    <div class="mt-3">
            <!-- Tabs navigation -->
            <div class="mb-5">
                <div class="sm:hidden">
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select id="tabs" x-model="content" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="overview">Overview</option>

                        <option value="assignments">Assignments</option>

                        <option value="quizzes">Quizzes</option>

                        <option value="addHours">Hours</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                            <a @click="content = 'overview' " href="#" class="hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" :class="content === 'overview' ? 'border-b-2 border-gray-600 text-gray-900' : 'border-transparent text-gray-500' "> Overview </a>

                            <a @click="content = 'assignments' " href="#" class="border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" :class="content === 'assignments' ? 'border-b-2 border-gray-600 text-gray-900' : 'border-transparent text-gray-500' "> Assignments
                                <span class="bg-gray-200 hidden ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="content === 'assignments' ? 'text-gray-900' : 'text-gray-500'">{{ count($openAssignments) }}</span>
                            </a>

                            <a @click="content = 'quizzes' " href="#" class="border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" :class="content === 'quizzes' ? 'border-b-2 border-gray-600 text-gray-900' : 'border-transparent text-gray-500' "> Quizzes
                                <span class="bg-gray-200 hidden ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="content === 'quizzes' ? 'text-gray-900' : 'text-gray-500'">{{ count($openQuizzes) }}</span>
                            </a>

                            <a @click="content = 'addHours' " href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" :class="content === 'addHours' ? 'border-b-2 border-gray-600 text-gray-900' : 'border-transparent text-gray-500' "> Hours </a>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Tabs Nav -->

        <div x-cloak x-show=" content === 'overview' " class="sm:flex sm:items-center">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">

            {{-- <div class="-mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-white">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-500 sm:pl-6">Teacher</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-500 lg:table-cell">Email</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-500 sm:table-cell">Quiz Progress</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-500 sm:table-cell">Homework Progress</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-500 sm:table-cell">Hours Remaining</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-500 sm:table-cell">Bonus Points</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-500 sm:table-cell">Overall Grade</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Add Hours</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                        <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                            {{ $registration->teacher->first_name ?? '' }}
                            <dl class="font-normal lg:hidden">
                                <dt class="sr-only">Email</dt>
                                <dd class="mt-1 truncate text-gray-700">{{ $registration->teacher->email ?? '' }}</dd>
                                <dt class="sr-only sm:hidden">Grade</dt>
                                <dd class="mt-1 truncate text-gray-500 sm:hidden">@if($assignments){{ number_format($totalPoints / $possiblePoints, 2) }} / 10 @endif</dd>
                            </dl>
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-gray-900 lg:table-cell">{{ $registration->teacher->email ?? '' }}</td>
                        <td class="hidden px-3 py-4 text-sm text-center text-gray-900 sm:table-cell">{{ count($completedQuizzes) }} / {{ count($quizAssignments) }}</td>
                        <td class="hidden px-3 py-4 text-sm text-center text-gray-900 sm:table-cell">{{ count($completedAssignments) + count($gradedAssignments) }} / {{ count($assignments) }}</td>
                        <td class="px-3 py-4 text-sm text-center text-gray-900 sm:table-cell">{{ $registration->total_hours - $registration->hours_completed }}</td>
                        <td class="hidden px-3 py-4 text-sm text-center text-gray-900 sm:table-cell">{{ $registration->bonusPoints->total ?? '' }}</td>
                        <td class="hidden px-3 py-4 text-sm text-center text-gray-900 sm:table-cell">@if($assignments){{ number_format($totalPoints / $possiblePoints, 2) }} / 10 @endif</td>
                        <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <span role="button" class="text-white lg:bg-blue-400 p-2 rounded">Add hours<span class="sr-only"></span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div> --}}
        </div>


          <div x-cloak x-show=" content === 'assignments' ">
            <livewire:dashboard.courses.assignments.index :wire:key="$registration->id" :registration="$registration"/>
          </div>
        <div x-cloak x-show=" content === 'quizzes' ">
            <livewire:dashboard.courses.quizzes.index :registration="$registration" :quizzes="$openQuizzes"/>
        </div>
          <div x-cloak x-show=" content === 'addHours' ">
              <livewire:registrations.add-hours :registration="$registration" />
          </div>
    </div>
</div>
