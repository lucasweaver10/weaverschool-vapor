<div class="">
    <div class="flex flex-col">
        <div class="mb-4 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left">
                                User ID
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left">
                                Email
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($users as $user)
                            <tr wire:key="{{$user->id}}">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{ $user->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    <div class="flex items-center">
                                        {{-- <x-user-icon class="h-8 w-8 text-blue-400" /> --}}
                                        <a wire:click="impersonate({{$user->id}})" href="#" class="text-xs text-blue-400 ml-1">Impersonate</a>
                                    </div>
                                </td>                                                     
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="py-4 px-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>