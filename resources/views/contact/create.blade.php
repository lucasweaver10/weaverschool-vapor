<x-layouts.app>
  <x-slot name="title">
    Contact The Weaver School
  </x-slot>
  <x-slot name="description">
    Contact me to find out more about the online language courses I offer.
  </x-slot>
<x-layouts.guest>

    <div class="bg-white px-6 pt-16 pb-16 lg:px-8">
        <x-alerts.error>
        </x-alerts.error>

        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-blue-100 to-blue-400 opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">@lang('pages/contact.heading')</h2>
            <p class="mt-2 text-lg leading-8 text-gray-400">@lang('pages/contact.subheading')</p>
        </div>
        <form action="{{ url('/contact/store') }}" method="POST" data-recaptcha="true" class="mx-auto mt-10 max-w-xl sm:mt-10">
            @csrf
            <x-honeypot />
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">@lang('pages/contact.name')</label>
                    <div class="mt-2.5">
                        <input type="name" name="name" value="{{ old('name') }}" id="first-name" autocomplete="full-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">@lang('pages/contact.email_address')</label>
                    <div class="mt-2.5">
                        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                    </div>
                </div>                
                <div class="sm:col-span-2">
                    <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">@lang('pages/contact.message')</label>
                    <div class="mt-2.5">
                        <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <button type="submit"
                        class="block w-full rounded-md bg-teal-400 px-3 py-4 text-center text-xl font-semibold
                        text-white shadow-sm hover:bg-teal-700 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-teal-400">
                    @lang('pages/contact.button')
                </button>
            </div>
        </form>
    </div>
    <x-alerts.success />
    <x-alerts.error />
</x-layouts.guest>
</x-layouts.app>
