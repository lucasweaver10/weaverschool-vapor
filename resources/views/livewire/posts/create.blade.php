<div class="space-y-8 divide-y divide-gray-200 p-10">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Create Post</h3>
            </div>

            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Title </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-7">
                        <input type="text" wire:model.live="title" id="title" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="author" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Author </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-7">
                        <select id="author" wire:model.live="author" autocomplete="author" class="max-w-lg block focus:ring-blue-500 focus:border-blue-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            <option value="91">Lucas Weaver</option>
                        </select>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="slug" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Slug </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-7">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> weaverschool.com/blog/ </span>
                            <input type="text" wire:model.live="slug" id="slug" class="flex-1 block w-full focus:ring-blue-500 focus:border-blue-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('slug') <span class="error">Slug must be unique.</span> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Published at </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-7">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="date" wire:model.live="publishedAt" id="published_at" class="flex-1 block w-full focus:ring-blue-500 focus:border-blue-500 min-w-0 rounded-md sm:text-sm border-gray-300">
                        </div>
                    </div>
                </div>

{{--                <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">--}}
{{--                    <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Content </label>--}}
{{--                    <div class="mt-1 sm:mt-0 sm:col-span-7">--}}
{{--                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">--}}
{{--                        <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>--}}
{{--                        <div wire:ignore>--}}
{{--                            <input id="content" type="hidden" name="content" value="content">--}}
{{--                            <textarea wire:ignore wire:key="editor-{{ now() }}" wire:model="content" class="bg-white" input="content"></textarea>--}}

{{--                            <script>--}}
{{--                                const easyMDE = new EasyMDE();--}}
{{--                                easyMDE.codemirror.on("change", () => {--}}
{{--                                @this.set('content', easyMDE.value());--}}
{{--                                });--}}
{{--                            </script>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

              <div wire:ignore class="mt-5">
                    <script src="https://cdn.tiny.cloud/1/xhz630fat8nl5lrd694n6oilkamsqat4i6ekpcrd5r405wf1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
                    <script>tinymce.init({ selector:'textarea' });</script>
                <input id="content" type="hidden" name="content" value="content">
                <textarea wire:ignore wire:key="editor-{{ now() }}" wire:model="content" input="content"></textarea>
                    <script>
                        const easyMDE = new EasyMDE();
                        easyMDE.codemirror.on("change", () => {
                        @this.set('content', easyMDE.value());
                        });
                    </script>
              </div>


                <div class="sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="featured-image" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Featured Image </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-7">
                        <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" wire:model.live="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="pt-5">
        <div class="flex justify-end">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancel</button>
            <button wire:click="store" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
        </div>
    </div>
</div>
