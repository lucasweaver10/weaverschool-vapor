<x-layouts.app>
    <div class="px-20 sm:px-6 lg:px-20">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Authors</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the blog authors.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="/admin/authors/create" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">Add author</a>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                        {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th> --}}
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">

                    @foreach ($authors as $author)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="{{ $author->image }}" alt="">
                            </div>
                            <div class="ml-4">
                            <div class="font-medium text-gray-900">{{ $author->first_name . ' ' . $author->last_name }}</div>
                            <div class="text-gray-500"></div>
                            </div>
                        </div>
                        </td>
                        {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <div class="text-gray-900"></div>
                        <div class="text-gray-500"></div>
                        </td> --}}
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Author</td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="/admin/authors/edit/{{ $author->id }}" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
</x-layouts.app>