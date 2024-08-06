<x-layouts.app>
<form method="post" action="{{ route('authors.store') }}" class="">
        @csrf
    <div class="space-y-8 divide-y divide-gray-200 p-10">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h2 class="text-xl leading-6 font-large text-gray-900">Add an author</h2>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> First Name </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <input type="text" name="first_name" id="first_name" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('first_name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Last Name </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <input type="text" name="last_name" id="last_name" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('last_name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <livewire:admin.author-images.create />
                    </div>

                    <div x-data="{ author_image_url: '' }" @author-image-url-updated.window="author_image_url = $event.detail.authorImageUrl">
                        <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="author_image" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Author Image URL </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-7">
                                <input type="text" name="author_image" x-bind:value="author_image_url" id="author_image_url" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                @error('author_image')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                   <div class="my-5">
                       <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-4"> About </label>
                       <x-forms.tinymce-editor name="about" greeting="hello" />
                   </div>

                </div>

            </div>

        </div>

        <div class="pt-5">
            <div class="text-center">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-large rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Publish</button>
            </div>
        </div>

    </div>
</form>

</x-layouts.app>
