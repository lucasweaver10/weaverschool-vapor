<section id="get-started-today" class="relative overflow-hidden bg-blue-400 py-16">
    <img class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" src="path_to_background_image.jpg"
         alt="" width="2347" height="1244" />
    <div class="relative">
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="font-display text-4xl tracking-tight text-white sm:text-5xl">Start your {{ $subcategory }} learning path now</h2>
            <p class="mt-4 text-2xl tracking-tight text-white">It's never been easier for you to learn {{ $subcategory }}. Don't wait, sign up for your course now.</p>
            <a x-bind:href="guest ? '/register?course_id=' + courseId + '&plan_id=' + plan : '/' + locale + '/registrations/confirm?course_id=' + courseId + '&plan_id=' + plan"
            class="inline-block px-8 py-4 mt-10 text-gray-900 font-semibold bg-white rounded-full
                hover:bg-blue-600 hover:text-white">Register now</a>
        </div>
    </div>
</section>
