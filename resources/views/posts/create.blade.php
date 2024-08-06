<x-layouts.app>
<x-head.tinymce-config />
<form method="post" action="{{ route('posts.store') }}" class="">
        @csrf
    <div class="space-y-8 divide-y divide-gray-200 p-10">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h2 class="text-xl leading-6 font-large text-gray-900">Create a post</h2>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Title </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <input type="text" name="title" id="title" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="author" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Author </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <select id="author" name="author_id" autocomplete="author" class="max-w-lg block focus:ring-blue-500 focus:border-blue-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->first_name . ' ' . $author->last_name }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="slug" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Slug </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> weaverschool.com/blog/ </span>
                                <input type="text" name="slug" id="slug" class="flex-1 block w-full focus:ring-blue-500 focus:border-blue-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            @error('slug') <span class="error">Slug must be unique.</span> @enderror
                        </div>
                    </div>

                    <div>
                        <livewire:admin.blog-featured-images.create />
                    </div>

                    <div x-data="{ featured_image_url: '' }" @featured-image-url-updated.window="featured_image_url = $event.detail.featuredImageUrl">
                        <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Featured Image URL </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-7">
                                <input type="text" name="featured_image" x-bind:value="featured_image_url" id="featured_image_url" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                @error('featured_image')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

{{--                    <div x-data="{ featured_image_alt_text: '' }" @featured-image-url-updated.window="featured_image_alt_text = $event.detail.featuredImageAltText">--}}
{{--                        <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">--}}
{{--                            <label for="featured_image_alt_text" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Alt Text </label>--}}
{{--                            <div class="mt-1 sm:mt-0 sm:col-span-7">--}}
{{--                                <input type="text" name="featured_image_alt_text" x-bind:value="featured_image_alt_text" id="featured_image_alt_text" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Published at </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <input type="date" name="published_at" id="published_at" value="{{ date('Y-m-d') }}" class="flex-1 block w-full focus:ring-blue-500 focus:border-blue-500 min-w-0 rounded-md sm:text-sm border-gray-300">
                            </div>
                            <div>
                                @error('published_at')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                   <div class="my-5">
                       <label for="content" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-4"> Content </label>
                       <x-forms.tinymce-editor name="content" greeting="hello" />
                   </div>


{{--                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">--}}
{{--                        <label for="featured-image" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Featured Image </label>--}}
{{--                        <div class="mt-1 sm:mt-0 sm:col-span-7">--}}
{{--                            <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">--}}
{{--                                <div class="space-y-1 text-center">--}}
{{--                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">--}}
{{--                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                    </svg>--}}
{{--                                    <div class="flex text-sm text-gray-600">--}}
{{--                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">--}}
{{--                                            <span>Click here</span>--}}
{{--                                            <input id="file-upload" type="file" class="sr-only">--}}
{{--                                        </label>--}}
{{--                                        <p class="pl-1">or drag and drop</p>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

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
