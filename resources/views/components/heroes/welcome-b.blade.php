<div class="relative bg-black h-1/2 max-w-screen">
    <div class="grid lg:grid-cols-12 lg:gap-x-8">
            <div class="col-span-6 pt-16 pb-24 pl-12 md:pl-16 pr-10">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h1 class="text-6xl tracking-tight font-bold text-white sm:text-5xl md:text-6xl">
                        <span class="inline">@lang('pages/welcome.heading_1')</span>
                        <span class="text-blue-300 inline">@lang('pages/welcome.heading_2')</span>
                    </h1>
                    <p class="mt-6 text-2xl leading-8 text-gray-100">@lang('pages/welcome.subheading')</p>
                    <div class="mt-7 bg-gray-100 p-5 rounded-lg">
                        <div x-data="{ language: 'english' }" class="sm:justify-center lg:justify-start" >
                            <div class="">
                                <label for="language" class="block mb-2 text-md font-medium leading-6 text-gray-900">Choose your target language:</label>
                                <select x-model="language" id="language" class="mt-2 block w-full rounded-md border-0 py-5 pl-5 pr-10
                                    text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-blue-400 sm:text-xl sm:leading-6">
                                    <option value="english" selected>English</option>
                                    <option value="thai">Thai</option>
                                </select>
                            </div>
                            <div class="rounded-md mt-3 sm:mt-0">
                                <a :href="'/' + '{{ session('locale') }}' + '/' + language + '/courses/online'" class="shadow-md w-full flex items-center
                                    justify-center px-8 py-4 mt-4 sm:mt-8 bg-blue-400 text-xl font-medium rounded-md text-white
                                     hover:bg-blue-300 md:text-lg md:px-10">
                                    @lang('pages/welcome.view_lessons_button')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-6 bg-black relative">
                <iframe src="https://giphy.com/embed/MYxFqvoZlsueOKxBr8" width="480" height="270" frameBorder="0" class="giphy-embed h-full w-full" allowFullScreen></iframe>
            </div>
    </div>
</div>
