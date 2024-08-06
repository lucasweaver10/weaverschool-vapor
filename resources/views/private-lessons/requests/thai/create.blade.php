<x-layouts.app>
    <x-slot name="title">
        Request online private Thai lessons
    </x-slot>
<x-layouts.guest>
    <div class="bg-black min-h-screen px-5 pt-5 pb-32">
        <div class="grid grid-cols-2">
            <div class="col-span-2 md:col-span-1">
                <div class="mx-20 md:mx-12">
                    <div class="text-5xl font-bold text-white">
                        Request Online Private Thai Lessons
                    </div>
                    <div class="text-2xl text-gray-100 mt-8">
                        <p class="font-bold mb-4">Hourly rate: $25/hour</p>
                        <p>Your online private Thai lessons will be scheduled at the time and day of your choice. Just fill
                         out the form below and we'll respond via email within 24 hours.</p>
                    </div>
                    <div class="mt-10 mb-5 p-5 rounded-lg bg-gray-100">
                        <form action="{{ route('private-lessons.requests.thai.store') }}" method="POST">
                            @csrf
                            <x-honeypot />
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                                    <div class="mt-2">
                                        <input type="text" name="first_name" id="first-name" autocomplete="given-name"
                                               class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                                                placeholder="Sally">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                                    <div class="mt-2">
                                        <input type="text" name="last_name" id="last-name" autocomplete="family-name"
                                               class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                                                placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-4 mb-1">
                                <label class="text-gray-900 font-medium text-sm">Email</label>
                            </div>
                            <div class="w-full">
                                <input class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                                       type="text" name="email" placeholder="sally@yahoo.com">
                            </div>
                            <div class="w-full mt-4 mb-1">
                                <label class="text-gray-900 font-medium text-sm">Why are you interested in lessons?</label>
                            </div>
                            <div class="w-full">
                                <textarea class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                                          type="text" name="message" placeholder="Write message here">
                                </textarea>
                            </div>
                            <button type="submit" class="w-full bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mt-10">
                                Request
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1">
                <div class="mx-20 md:mx-32">
                    <img src="https://we-public.s3.eu-north-1.amazonaws.com/images/teachers/tree+thai+teacher+weaver+school.jpg"
                         alt="Tree online Thai teacher at the weaver school" class="w-full h-96
                             object-center object-cover rounded-xl mt-5 sm:mt-0">
                </div>
            </div>
        </div>
        <x-alerts.success />
    </div>
</x-layouts.guest>
</x-layouts.app>
