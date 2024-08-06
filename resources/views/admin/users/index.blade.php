<x-layouts.app>
    <div class="bg-black min-h-screen p-12">
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4 mb-12">
                <li>
                    <div class="flex items-center">
                        <a href="/admin" class="text-sm font-medium text-gray-100 hover:text-gray-700">Admin</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="text-white mb-5 text-4xl font-bold">Users</div>
        <div class="text-white ml-5">
            @foreach($users as $user)
                <ul class="mb-2">
                    <li><a href="/admin/users/explore/{{ $user->id }}">{{ $user->email }}</li>
                </ul>
            @endforeach
        </div>
    </div>


</x-layouts.app>
