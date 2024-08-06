<x-layouts.app>
{{--    <livewire:myteacher.index :user="$user"/>--}}
    <div class="bg-gray-50 min-h-screen pt-8 px-8 pb-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg my-5">
        <div class="px-4 pt-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $registration->privateLessons->name }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Balance: €{{ $registration->outstanding_balance  }}
            </p>
        </div>
        <div class="border-t border-gray-200">
        <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Student
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $registration->user->first_name }} {{ $registration->user->last_name }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Email address
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $registration->user->email }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Teacher
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $registration->teacher->name }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Total Hours
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $registration->total_hours }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Hours Completed
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $registration->hours_completed }}
                </dd>
            </div>
        </dl>
        </div>
    </div>
    </div>
</x-layouts.app>
