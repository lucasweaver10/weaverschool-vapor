<x-layouts.squeeze-dark>
    <div class="bg-gray-950 pt-5 pb-20 px-8 md:px-24 lg:px-64 min-h-screen">
        <section>
            <div class="text-3xl font-bold text-white text-center mt-8">
                Join the waiting list for...
            </div>
            <div class="text-6xl text-white font-bold text-center mt-5">
                The Weaver School's<br> <span class="text-teal-300">Elite Language Learning Mastermind Group</span>
            </div>
            <div class="text-2xl text-white mt-10 prose-xl">
                <p class="text-center">I'm launching a new mastermind group for hard-core language learners in January 2024.</p>
                <div class="flex rounded-lg h-64 my-12">
                    <img src="https://we-public.s3.eu-north-1.amazonaws.com/images/pages/lucas+weaver+founder+the+weaver+school.png"
                         alt="lucas weaver founder of online language school the weaver school"
                         class="mx-auto object-cover rounded-xl mt-5 sm:mt-0 h-64">
                </div>
                <p class="text-center">It's going to be an elite group of people who are serious about learning a language and want to be
                    part of a community of like-minded people who can help us all stay consistent, dedicated, and on-track
                    to achieve our language learning goals.</p>
                <p class="text-center font-bold text-3xl">You'll get access to:</p>
                <ul class="list-disc lg:mx-36">
                    <li>Weekly 1-hour group Zoom calls where we talk language learning strategies and techniques for success</li>
                    <li>Access to a private member's only database of language learning resources</li>
                    <li>Access to a private member's only Discord server where you can talk and connect with all the members
                     of the group</li>
                    <li>Access to password protected audio and video recordings of every call</li>
                    <li>Access to a Google Doc with the call notes for every call</li>
                </ul>
                <p class="text-center">Since this is a brand new group, we might have to work out a few hiccups while we're
                    first getting started, so I'll only be able to accept a limited number of people to the group at the start.
                </p>
                <p class="text-center">If you're a passionate and dedicated language learner and want to be in the group, fill out
                    the form below to join the waiting list.
                </p>
                <p class="text-center">If I think you might be a good fit, I'll email you about setting
                    up a personal one-on-one call to talk about your language learning goals and get to know you better.
                </p>
            </div>
{{--            <div class="w-full text-center mt-12">--}}
{{--                <form action="/ielts-squeeze-optin" method="post">--}}
{{--                    @csrf--}}
{{--                    <input type="text" name="email" placeholder="Enter your email address" class="rounded-md py-3 px-5 text-2xl text-black mx-auto w-96 mr-2">--}}
{{--                    <button class="bg-teal-400 hover:bg-blue-500 rounded-md py-3 px-5 text-2xl text-white font-bold mx-auto">Join the Waiting List</button>--}}
{{--                </form>--}}
{{--            </div>--}}

            <div class="text-xl text-white text-center mt-16 bg-gray-800 mt-10 py-10 px-8 rounded-lg shadow-md">
                <h2 class="text-3xl text-center font-bold mb-12">Save your spot now...</h2>
                <form action="{{ route('mastermind-waiting-list.request') }}" method="post">
                    @csrf
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="first-name" class="block font-medium leading-6 text-white">First name</label>
                        <div class="mt-2">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block font-medium leading-6 text-white">Last name</label>
                        <div class="mt-2">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="email" class="block font-medium leading-6 text-white">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="location" class="block font-medium leading-6 text-white">Location</label>
                        <div class="mt-2">
                            <input type="text" name="location" id="location" autocomplete="location" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="native-language" class="block font-medium leading-6 text-white">Native Language</label>
                        <div class="mt-2">
                            <input type="text" id="native-language" name="native-language" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="target-language" class="block font-medium leading-6 text-white">Target Language</label>
                        <div class="mt-2">
                            <input type="text" name="target-language" id="target-language" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:leading-6">
                        </div>
                    </div>

                    <div class="col-span-full mt-4">
                        <label for="motivation" class="block font-medium leading-6 text-white">Why are you learning this language and why do you want to join this group?</label>
                        <div class="mt-2">
                            <textarea id="motivation" name="motivation" rows="3" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:leading-6"></textarea>
                        </div>
                    </div>

                    <div class="col-span-full mt-5">
                        <button class="bg-teal-400 hover:bg-teal-500 rounded-md py-3 px-5 text-2xl text-white font-bold mx-auto">Join the Waiting List</button>
                    </div>
                </div>
                </form>
            </div>
        </section>
    </div>
</x-layouts.squeeze-dark>
