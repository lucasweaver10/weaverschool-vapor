<x-layouts.app>
<x-head.tinymce-config />
<form method="POST" action="{{ route('posts.update') }}" class="">
    {{-- @method('PATCH') --}}
    @csrf
    <div class="space-y-8 divide-y divide-gray-200 mx-5">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Post</h3>
                </div>

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Title </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <input type="text" value="{{ $post->title }}" name="title" id="title" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                        @error('title') <span class="error">Post must have a title.</span> @enderror
                    </div>

                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="author" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Author </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <select id="author" name="author_id" autocomplete="author" value="{{ $post->author_id }}" class="max-w-lg block focus:ring-blue-500 focus:border-blue-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" @if($post->author_id == $author->id) selected @endif>{{ $author->first_name . ' ' . $author->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="slug" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Slug </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> weaverschool.com/blog/ </span>
                                <input type="text" value="{{ $post->slug }}" name="slug" id="slug" class="flex-1 block w-full focus:ring-blue-500 focus:border-blue-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            @error('slug') <span class="error">Slug must be unique.</span> @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Published at {{ $post->published_at }} </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-7">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <input type="date" value="{{ $post->published_at->format("Y-m-d") }}" name="published_at" id="published_at" class="flex-1 block w-full focus:ring-blue-500 focus:border-blue-500 min-w-0 rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('published_at') <span class="error">Post must have a published at date.</span> @enderror
                        </div>
                    </div>

                    <div class="my-5">
                        <label for="content" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-4"> Content </label>
                        <x-forms.tinymce-editor name="content" content="{!! $post->content !!}" greeting="hello" />
                    </div>

                </div>

            </div>

        </div>

        <div class="pt-5">
            <div class="flex">
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
            </div>
        </div>
    </div>
 </form>
    <!-- add a form and button to trigger addTableOfContentsToPost function -->
    <form method="POST" action="{{ route('posts.admin.addTableOfContentsToPost') }}" class="mt-5">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Add Table of Contents</button>
    <x-alerts.success />
</x-layouts.app>
