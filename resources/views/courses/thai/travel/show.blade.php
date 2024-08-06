<x-layouts.squeeze-dark>
    <div class="min-h-screen bg-black sm:px-5 md:px-16 lg:px-64 xl:px-80" x-data="{ plan:{{ $course->plans->first()->id }} }">
        <div class="pt-5 lg:pt-0 pb-12 mx-5 sm:mx-12">
            <div class="text-4xl md:text-6xl md:mb-7 font-bold text-gray-200 text-center">{{ $course->name }}</div>
            <div class="mx-auto">
                <img class="rounded-lg shadow-lg my-8" src="{{ $course->image }}" alt="{{ $course->name }}">
            </div>
            <div class="text-2xl text-gray-100 text-center prose-xl">{!! $course->about !!}</div>
            <div class="mt-20 mx-auto">
                <div class="text-4xl sm:text-5xl font-bold text-white text-center mt-8">
                    @lang('currency.symbol'){{ $course->plans->first()->total_price }}
                    <strike class="text-blue-400"><span class="text-white">$29</span></strike>
                </div>
                <!-- Fix this before setting live!! -->
                <div class="text-center mt-10">
                    <a x-bind:href="'/register?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                       class="bg-blue-400 hover:bg-blue-300 rounded-lg py-2 px-5 text-3xl sm:text-5xl text-white font-bold">
                        Start for FREE
                    </a>
                    <div class="text-white mt-7 text-sm"><em>(Credit card required)</em></div>
                </div>
                <div class="flex sm:mx-24 my-5 justify-center">
                    <div class="sm:flex-shrink-0">
                        <div class="flow-root">
                            <svg xmlns="http://www.w3.org/2000/svg" width="112" height="96" viewBox="0 0 112 96" fill="none"><script xmlns=""/>
                                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="104" height="88">
                                    <rect x="4" y="4" width="104" height="88" fill="url(#paint0_radial)"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <g filter="url(#filter0_dd)">
                                        <path d="M44 49C44 47.8954 44.8954 47 46 47H66C67.1046 47 68 47.8954 68 49V83.7299C68 85.4256 66.0223 86.3519 64.7196 85.2664L57.2804 79.067C56.5387 78.4489 55.4613 78.4489 54.7196 79.067L47.2804 85.2664C45.9777 86.3519 44 85.4256 44 83.7299V49Z" fill="white"/>
                                        <path d="M46 46.5C44.6193 46.5 43.5 47.6193 43.5 49V83.7299C43.5 85.8495 45.9721 87.0074 47.6005 85.6505L55.0397 79.4511C55.596 78.9875 56.404 78.9875 56.9603 79.4511L64.3995 85.6505C66.0279 87.0074 68.5 85.8495 68.5 83.7299V49C68.5 47.6193 67.3807 46.5 66 46.5H46Z" stroke="#121826" stroke-opacity="0.08"/>
                                    </g>
                                </g>
                                <g opacity="0.2" filter="url(#filter1_f)">
                                    <path d="M50.8111 15.422C53.8011 12.8739 58.1989 12.8739 61.1889 15.422L63.8256 17.669C65.1069 18.7609 66.7001 19.4208 68.3782 19.5547L71.8315 19.8303C75.7476 20.1428 78.8572 23.2525 79.1697 27.1685L79.4453 30.6218C79.5792 32.2999 80.2391 33.8931 81.331 35.1744L83.578 37.8111C86.1261 40.8011 86.1261 45.1989 83.578 48.1889L81.331 50.8256C80.2391 52.1069 79.5792 53.7001 79.4453 55.3782L79.1697 58.8315C78.8572 62.7475 75.7475 65.8572 71.8315 66.1697L68.3782 66.4453C66.7001 66.5792 65.1069 67.2391 63.8256 68.331L61.1889 70.578C58.1989 73.1261 53.8011 73.1261 50.8111 70.578L48.1744 68.331C46.8931 67.2391 45.2999 66.5792 43.6218 66.4453L40.1685 66.1697C36.2525 65.8572 33.1428 62.7475 32.8303 58.8315L32.5547 55.3782C32.4208 53.7001 31.7609 52.1069 30.669 50.8256L28.422 48.1889C25.8739 45.1989 25.8739 40.8011 28.422 37.8111L30.669 35.1744C31.7609 33.8931 32.4208 32.2999 32.5547 30.6218L32.8303 27.1685C33.1428 23.2524 36.2525 20.1428 40.1685 19.8303L43.6218 19.5547C45.2999 19.4208 46.8931 18.7609 48.1744 17.669L50.8111 15.422Z" fill="#4F46E5"/>
                                </g>
                                <g filter="url(#filter2_dd)">
                                    <path d="M50.8111 12.422C53.8011 9.87387 58.1989 9.87387 61.1889 12.422L63.8256 14.669C65.1069 15.7609 66.7001 16.4208 68.3782 16.5547L71.8315 16.8303C75.7476 17.1428 78.8572 20.2525 79.1697 24.1685L79.4453 27.6218C79.5792 29.2999 80.2391 30.8931 81.331 32.1744L83.578 34.8111C86.1261 37.8011 86.1261 42.1989 83.578 45.1889L81.331 47.8256C80.2391 49.1069 79.5792 50.7001 79.4453 52.3782L79.1697 55.8315C78.8572 59.7475 75.7475 62.8572 71.8315 63.1697L68.3782 63.4453C66.7001 63.5792 65.1069 64.2391 63.8256 65.331L61.1889 67.578C58.1989 70.1261 53.8011 70.1261 50.8111 67.578L48.1744 65.331C46.8931 64.2391 45.2999 63.5792 43.6218 63.4453L40.1685 63.1697C36.2525 62.8572 33.1428 59.7475 32.8303 55.8315L32.5547 52.3782C32.4208 50.7001 31.7609 49.1069 30.669 47.8256L28.422 45.1889C25.8739 42.1989 25.8739 37.8011 28.422 34.8111L30.669 32.1744C31.7609 30.8931 32.4208 29.2999 32.5547 27.6218L32.8303 24.1685C33.1428 20.2524 36.2525 17.1428 40.1685 16.8303L43.6218 16.5547C45.2999 16.4208 46.8931 15.7609 48.1744 14.669L50.8111 12.422Z" fill="white"/>
                                    <path d="M61.5132 12.0414C58.3363 9.33406 53.6637 9.33406 50.4868 12.0414L47.8501 14.2884C46.6488 15.3121 45.1553 15.9307 43.582 16.0563L40.1288 16.3318C35.9679 16.6639 32.6639 19.9679 32.3318 24.1288L32.0563 27.582C31.9307 29.1553 31.3121 30.6488 30.2884 31.8501L28.0414 34.4868C25.3341 37.6637 25.3341 42.3363 28.0414 45.5132L30.2884 48.1499C31.3121 49.3512 31.9307 50.8447 32.0563 52.418L32.3318 55.8712C32.6639 60.0321 35.9679 63.3361 40.1288 63.6682L43.582 63.9437C45.1553 64.0693 46.6488 64.6879 47.8501 65.7116L50.4868 67.9586C53.6637 70.6659 58.3363 70.6659 61.5132 67.9586L64.1499 65.7116C65.3512 64.6879 66.8447 64.0693 68.418 63.9437L71.8712 63.6682C76.0321 63.3361 79.3361 60.0321 79.6682 55.8712L79.9437 52.418C80.0693 50.8447 80.6879 49.3512 81.7116 48.1499L83.9586 45.5132C86.6659 42.3363 86.6659 37.6637 83.9586 34.4868L81.7116 31.8501C80.6879 30.6488 80.0693 29.1553 79.9437 27.582L79.6682 24.1288C79.3361 19.9679 76.0321 16.6639 71.8712 16.3318L68.418 16.0563C66.8447 15.9307 65.3512 15.3121 64.1499 14.2884L61.5132 12.0414Z" stroke="#121826" stroke-opacity="0.08"/>
                                </g>
                                <circle opacity="0.6" cx="56" cy="40" r="20" stroke="#E5E7EB" stroke-width="2"/>
                                <path d="M49 41L52.4373 44.4373C53.274 45.274 54.6502 45.2054 55.3994 44.2896L63 35" stroke="#60a5fa" stroke-width="2" stroke-linecap="round"/>
                                <defs>
                                    <filter id="filter0_dd" x="38" y="44" width="36" height="50.7357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <filter id="filter1_f" x="22.511" y="9.51099" width="66.9782" height="66.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                        <feGaussianBlur stdDeviation="2" result="effect1_foregroundBlur"/>
                                    </filter>
                                    <filter id="filter2_dd" x="20.511" y="7.51099" width="70.9782" height="70.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(56 16) rotate(90) scale(101 106.739)">
                                        <stop offset="0.542079" stop-color="#C4C4C4"/>
                                        <stop offset="0.757426" stop-color="#C4C4C4" stop-opacity="0"/>
                                    </radialGradient>
                                </defs>
                                <script xmlns=""/></svg>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <h3 class="text-base font-medium text-gray-100">100% money-back guarantee</h3>
                        <p class="mt-2 text-xs text-gray-100">Get 100% of your money back if you're not happy
                            with your course.</p>
                    </div>
                </div>
            </div>
            <div class="mx-auto mt-16">
                <div class="text-4xl md:text-5xl font-bold tracking-tight text-gray-200 text-center mb-10">
                    Become the traveler you've always wanted to be instead of just another tourist
                </div>
                <div class="mx-auto mt-5 mb-10">
                    <img class="rounded-lg shadow-lg xl:mb-8" src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/the_best_way_to_learn_Thai_1687532728.jpg">
                </div>
                <div class="text-center mb-5 font-normal leading-7 text-gray-200">
                    What will you gain by speaking some basic Thai when traveling in Thailand?</div>
                <div class="mt-8 max-w-xl prose-xl text-xl md:text-2xl leading-7 text-gray-200 lg:max-w-none">
                        <div class="text-2xl md:text-3xl font-semibold leading-7">
                            Access to more amazing local Thai food
                        </div>
                        <p>
                            Master the names of local dishes in Thai to enjoy mouthwatering street food and customize
                            your orders like a local, so you don't have to stick to only typical tourist dishes like pad thai.
                        </p>
                        <div class="text-2xl md:text-3xl font-semibold leading-7">
                            Discover hidden restaurants and bars only known by locals
                        </div>
                        <p>
                            Speak a few easy Thai phrases and friendly locals will recommend hidden gems for unforgettable
                            experiences most tourists never learn about, from hole in the wall Michelin restaurants
                            to vibrant live-music speakeasy bars.
                        </p>
                        <div class="text-2xl md:text-3xl font-semibold leading-7">
                            Never get lost again
                        </div>
                        <p>
                            Learn how to ask for simple directions in Thai when you're in a jam. Stay on track and keep
                            calm wherever you are even when technology fails you.
                        </p>
                    <div class="mx-auto mt-5 mb-12">
                        <img class="rounded-lg shadow-lg xl:mb-8" src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/speaking_thai_while_traveling_in_thailand_1687532589.jpg">
                    </div>
                        <div class="text-2xl md:text-3xl font-semibold leading-7">
                            Be a respectful traveler and connect with locals
                        </div>
                        <p>
                            Embrace Thai culture, avoid accidentally offending people, and build meaningful connections
                            with smiling Thai locals that will stay in your memories for life.
                        </p>
                        <div class="text-2xl md:text-3xl font-semibold leading-7">
                            Bargain like a pro and avoid tourist prices
                        </div>
                        <p>
                            Negotiate in Thai and save <em>big</em> at markets, escaping tourist prices and scoring unique deals
                             you can brag to all your friends about once you get back home.
                        </p>
                        <div class="text-2xl md:text-3xl font-semibold leading-7 text-white">
                            Don't get stuck in difficult situations
                        </div>
                        <p>
                            Learn basic Thai to communicate with taxi drivers, police officers, and transport workers,
                            making sure you can navigate effortlessly to reach all of your bucket-list destinations safely
                            and on time.
                        </p>
                </div>
            </div>

            @if($course->features)
            <div class="bg-gray-100 rounded-xl py-7 px-8 mt-16 lg:mx-10 shadow-sm">
                <div class="text-3xl text-center font-bold text-blue-400 mb-2">
                    Course Highlights
                </div>
                <div class="text-lg text-center text-gray-900 mt-1 mb-8">
                    Everything you'll get with your course:
                </div>
                <div class="prose prose-sm mt-2 text-gray-600">
                    @foreach($course->features as $feature)
                        <div class="text-lg font-semibold leading-7 text-gray-900">{{ $feature->name  }}</div>
                        <div class="text-base text-gray-600 mb-4">{{ $feature->description }}</div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="mt-20 mx-auto">
                <div class="text-4xl sm:text-5xl font-bold text-white text-center mt-8">
                    @lang('currency.symbol'){{ $course->plans->first()->total_price }}
                    <strike class="text-blue-400"><span class="text-white">$29</span></strike>
                </div>
                <!-- Fix this before setting live!! -->
                <div class="text-center mt-10">
                    <a x-bind:href="'/register?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                       class="bg-blue-400 hover:bg-blue-300 rounded-lg py-2 px-5 text-3xl sm:text-5xl text-white font-bold">
                        Start for FREE
                    </a>
                    <div class="text-white mt-7 text-sm"><em>(Credit card required)</em></div>
                </div>
                <div class="flex sm:mx-24 my-5 justify-center">
                    <div class="sm:flex-shrink-0">
                        <div class="flow-root">
                            <svg xmlns="http://www.w3.org/2000/svg" width="112" height="96" viewBox="0 0 112 96" fill="none"><script xmlns=""/>
                                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="104" height="88">
                                    <rect x="4" y="4" width="104" height="88" fill="url(#paint0_radial)"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <g filter="url(#filter0_dd)">
                                        <path d="M44 49C44 47.8954 44.8954 47 46 47H66C67.1046 47 68 47.8954 68 49V83.7299C68 85.4256 66.0223 86.3519 64.7196 85.2664L57.2804 79.067C56.5387 78.4489 55.4613 78.4489 54.7196 79.067L47.2804 85.2664C45.9777 86.3519 44 85.4256 44 83.7299V49Z" fill="white"/>
                                        <path d="M46 46.5C44.6193 46.5 43.5 47.6193 43.5 49V83.7299C43.5 85.8495 45.9721 87.0074 47.6005 85.6505L55.0397 79.4511C55.596 78.9875 56.404 78.9875 56.9603 79.4511L64.3995 85.6505C66.0279 87.0074 68.5 85.8495 68.5 83.7299V49C68.5 47.6193 67.3807 46.5 66 46.5H46Z" stroke="#121826" stroke-opacity="0.08"/>
                                    </g>
                                </g>
                                <g opacity="0.2" filter="url(#filter1_f)">
                                    <path d="M50.8111 15.422C53.8011 12.8739 58.1989 12.8739 61.1889 15.422L63.8256 17.669C65.1069 18.7609 66.7001 19.4208 68.3782 19.5547L71.8315 19.8303C75.7476 20.1428 78.8572 23.2525 79.1697 27.1685L79.4453 30.6218C79.5792 32.2999 80.2391 33.8931 81.331 35.1744L83.578 37.8111C86.1261 40.8011 86.1261 45.1989 83.578 48.1889L81.331 50.8256C80.2391 52.1069 79.5792 53.7001 79.4453 55.3782L79.1697 58.8315C78.8572 62.7475 75.7475 65.8572 71.8315 66.1697L68.3782 66.4453C66.7001 66.5792 65.1069 67.2391 63.8256 68.331L61.1889 70.578C58.1989 73.1261 53.8011 73.1261 50.8111 70.578L48.1744 68.331C46.8931 67.2391 45.2999 66.5792 43.6218 66.4453L40.1685 66.1697C36.2525 65.8572 33.1428 62.7475 32.8303 58.8315L32.5547 55.3782C32.4208 53.7001 31.7609 52.1069 30.669 50.8256L28.422 48.1889C25.8739 45.1989 25.8739 40.8011 28.422 37.8111L30.669 35.1744C31.7609 33.8931 32.4208 32.2999 32.5547 30.6218L32.8303 27.1685C33.1428 23.2524 36.2525 20.1428 40.1685 19.8303L43.6218 19.5547C45.2999 19.4208 46.8931 18.7609 48.1744 17.669L50.8111 15.422Z" fill="#4F46E5"/>
                                </g>
                                <g filter="url(#filter2_dd)">
                                    <path d="M50.8111 12.422C53.8011 9.87387 58.1989 9.87387 61.1889 12.422L63.8256 14.669C65.1069 15.7609 66.7001 16.4208 68.3782 16.5547L71.8315 16.8303C75.7476 17.1428 78.8572 20.2525 79.1697 24.1685L79.4453 27.6218C79.5792 29.2999 80.2391 30.8931 81.331 32.1744L83.578 34.8111C86.1261 37.8011 86.1261 42.1989 83.578 45.1889L81.331 47.8256C80.2391 49.1069 79.5792 50.7001 79.4453 52.3782L79.1697 55.8315C78.8572 59.7475 75.7475 62.8572 71.8315 63.1697L68.3782 63.4453C66.7001 63.5792 65.1069 64.2391 63.8256 65.331L61.1889 67.578C58.1989 70.1261 53.8011 70.1261 50.8111 67.578L48.1744 65.331C46.8931 64.2391 45.2999 63.5792 43.6218 63.4453L40.1685 63.1697C36.2525 62.8572 33.1428 59.7475 32.8303 55.8315L32.5547 52.3782C32.4208 50.7001 31.7609 49.1069 30.669 47.8256L28.422 45.1889C25.8739 42.1989 25.8739 37.8011 28.422 34.8111L30.669 32.1744C31.7609 30.8931 32.4208 29.2999 32.5547 27.6218L32.8303 24.1685C33.1428 20.2524 36.2525 17.1428 40.1685 16.8303L43.6218 16.5547C45.2999 16.4208 46.8931 15.7609 48.1744 14.669L50.8111 12.422Z" fill="white"/>
                                    <path d="M61.5132 12.0414C58.3363 9.33406 53.6637 9.33406 50.4868 12.0414L47.8501 14.2884C46.6488 15.3121 45.1553 15.9307 43.582 16.0563L40.1288 16.3318C35.9679 16.6639 32.6639 19.9679 32.3318 24.1288L32.0563 27.582C31.9307 29.1553 31.3121 30.6488 30.2884 31.8501L28.0414 34.4868C25.3341 37.6637 25.3341 42.3363 28.0414 45.5132L30.2884 48.1499C31.3121 49.3512 31.9307 50.8447 32.0563 52.418L32.3318 55.8712C32.6639 60.0321 35.9679 63.3361 40.1288 63.6682L43.582 63.9437C45.1553 64.0693 46.6488 64.6879 47.8501 65.7116L50.4868 67.9586C53.6637 70.6659 58.3363 70.6659 61.5132 67.9586L64.1499 65.7116C65.3512 64.6879 66.8447 64.0693 68.418 63.9437L71.8712 63.6682C76.0321 63.3361 79.3361 60.0321 79.6682 55.8712L79.9437 52.418C80.0693 50.8447 80.6879 49.3512 81.7116 48.1499L83.9586 45.5132C86.6659 42.3363 86.6659 37.6637 83.9586 34.4868L81.7116 31.8501C80.6879 30.6488 80.0693 29.1553 79.9437 27.582L79.6682 24.1288C79.3361 19.9679 76.0321 16.6639 71.8712 16.3318L68.418 16.0563C66.8447 15.9307 65.3512 15.3121 64.1499 14.2884L61.5132 12.0414Z" stroke="#121826" stroke-opacity="0.08"/>
                                </g>
                                <circle opacity="0.6" cx="56" cy="40" r="20" stroke="#E5E7EB" stroke-width="2"/>
                                <path d="M49 41L52.4373 44.4373C53.274 45.274 54.6502 45.2054 55.3994 44.2896L63 35" stroke="#60a5fa" stroke-width="2" stroke-linecap="round"/>
                                <defs>
                                    <filter id="filter0_dd" x="38" y="44" width="36" height="50.7357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <filter id="filter1_f" x="22.511" y="9.51099" width="66.9782" height="66.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                        <feGaussianBlur stdDeviation="2" result="effect1_foregroundBlur"/>
                                    </filter>
                                    <filter id="filter2_dd" x="20.511" y="7.51099" width="70.9782" height="70.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(56 16) rotate(90) scale(101 106.739)">
                                        <stop offset="0.542079" stop-color="#C4C4C4"/>
                                        <stop offset="0.757426" stop-color="#C4C4C4" stop-opacity="0"/>
                                    </radialGradient>
                                </defs>
                                <script xmlns=""/></svg>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <h3 class="text-base font-medium text-gray-100">100% money-back guarantee</h3>
                        <p class="mt-2 text-xs text-gray-100">Get 100% of your money back if you're not happy
                            with your course.</p>
                    </div>
                </div>
            </div>
            <div class="mt-24 mx-auto w-full">
                <div class="text-center text-gray-200 text-3xl font-bold">Created by...</div>
                <div class="flex w-full mt-8 mb-5 justify-center">
                    <div class="text-center mr-2">
                        <img class="mx-2 h-40 w-40 rounded-full xl:w-56 xl:h-56 object-cover" src="https://we-public.s3.eu-north-1.amazonaws.com/images/teachers/lucas+weaver+english+teacher+weaver+school.png" alt="">
                        <div class="text-xl md:text-2xl text-gray-200 font-bold mt-3">Lucas Weaver</div>
                    </div>
                    <div class="text-center ml-2">
                        <img class="mx-2 h-40 w-40 rounded-full xl:w-56 xl:h-56 object-cover" src="https://we-public.s3.eu-north-1.amazonaws.com/images/teachers/tree+thai+teacher+weaver+school.jpg" alt="">
                        <div class="text-xl md:text-2xl text-gray-200 font-bold mt-3">Tree Thaleikis</div>
                    </div>
                </div>
                <div class="mt-12 mb-5">
                    <div class="text-gray-200 prose-xl text-xl md:text-2xl">
                        <p>
                            Tree and I created this course to help you learn the parts of the Thai language you will
                            actually need and use on a daily basis when you are in Thailand.</p>
                        <p class="mt-4">
                            We're both travel addicts with passion for languages, so we put a lot of effort into making
                            sure that we cover all of the situations that come up when you're traveling in a foreign country.
                        </p>
                        <p class="mt-4">
                            The result is a course that will <strong>transform you into a confident traveler who can communicate with
                            Thai people</strong> in a way that will <strong>make you feel connected to them on a deeper level</strong>.
                        </p>
                        <p class="mt-4">
                            Instead of just cold, surface-level interactions using Google translate, pointing at pictures,
                            and holding up fingers, you'll <strong>see locals' warm faces light up</strong> when you say the name of your
                            favorite food dish in Thai with good pronunciation they can actually understand.
                        </p>
                        <p class="mt-4">
                            You'll hear Thai people say <em>"Oh you speak Thai very good!"</em>, then ask everything about you...
                        </p>
                        <p class="mt-4">
                            <em>"Where you from? What's your name? How old are you?"</em> and you'll be able to answer them all <em>in Thai</em>.
                        </p>
                        <p class="mt-4">
                            Those smiles on their faces will only grow.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 rounded-xl py-8 px-8 mt-16 lg:mx-10 shadow-sm">
                <div class="text-3xl font-bold text-blue-400 text-center">
                    What you'll learn...
                </div>
                <div class="prose prose-sm mt-2 text-gray-600">
                    @foreach($course->lessons as $lesson)
                        <div class="text-lg font-semibold leading-7 text-gray-900">{{ $lesson->title  }}</div>
                        <div class="text-base text-gray-600 mb-4">{{ $lesson->description }}</div>
                    @endforeach
                    <div class="text-base text-center text-gray-900 font-bold">And much more...</div>
                </div>
            </div>
            <div class="mt-20 mx-auto">
                <div class="text-4xl sm:text-5xl font-bold text-white text-center mt-8">
                    @lang('currency.symbol'){{ $course->plans->first()->total_price }}
                    <strike class="text-blue-400"><span class="text-white">$29</span></strike>
                </div>
                <!-- Fix this before setting live!! -->
                <div class="text-center mt-10">
                    <a x-bind:href="'/register?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                       class="bg-blue-400 hover:bg-blue-300 rounded-lg py-2 px-5 text-3xl sm:text-5xl text-white font-bold">
                        Start for FREE
                    </a>
                    <div class="text-white mt-7 text-sm"><em>(Credit card required)</em></div>
                </div>
                <div class="flex sm:mx-24 my-5 justify-center">
                    <div class="sm:flex-shrink-0">
                        <div class="flow-root">
                            <svg xmlns="http://www.w3.org/2000/svg" width="112" height="96" viewBox="0 0 112 96" fill="none"><script xmlns=""/>
                                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="104" height="88">
                                    <rect x="4" y="4" width="104" height="88" fill="url(#paint0_radial)"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <g filter="url(#filter0_dd)">
                                        <path d="M44 49C44 47.8954 44.8954 47 46 47H66C67.1046 47 68 47.8954 68 49V83.7299C68 85.4256 66.0223 86.3519 64.7196 85.2664L57.2804 79.067C56.5387 78.4489 55.4613 78.4489 54.7196 79.067L47.2804 85.2664C45.9777 86.3519 44 85.4256 44 83.7299V49Z" fill="white"/>
                                        <path d="M46 46.5C44.6193 46.5 43.5 47.6193 43.5 49V83.7299C43.5 85.8495 45.9721 87.0074 47.6005 85.6505L55.0397 79.4511C55.596 78.9875 56.404 78.9875 56.9603 79.4511L64.3995 85.6505C66.0279 87.0074 68.5 85.8495 68.5 83.7299V49C68.5 47.6193 67.3807 46.5 66 46.5H46Z" stroke="#121826" stroke-opacity="0.08"/>
                                    </g>
                                </g>
                                <g opacity="0.2" filter="url(#filter1_f)">
                                    <path d="M50.8111 15.422C53.8011 12.8739 58.1989 12.8739 61.1889 15.422L63.8256 17.669C65.1069 18.7609 66.7001 19.4208 68.3782 19.5547L71.8315 19.8303C75.7476 20.1428 78.8572 23.2525 79.1697 27.1685L79.4453 30.6218C79.5792 32.2999 80.2391 33.8931 81.331 35.1744L83.578 37.8111C86.1261 40.8011 86.1261 45.1989 83.578 48.1889L81.331 50.8256C80.2391 52.1069 79.5792 53.7001 79.4453 55.3782L79.1697 58.8315C78.8572 62.7475 75.7475 65.8572 71.8315 66.1697L68.3782 66.4453C66.7001 66.5792 65.1069 67.2391 63.8256 68.331L61.1889 70.578C58.1989 73.1261 53.8011 73.1261 50.8111 70.578L48.1744 68.331C46.8931 67.2391 45.2999 66.5792 43.6218 66.4453L40.1685 66.1697C36.2525 65.8572 33.1428 62.7475 32.8303 58.8315L32.5547 55.3782C32.4208 53.7001 31.7609 52.1069 30.669 50.8256L28.422 48.1889C25.8739 45.1989 25.8739 40.8011 28.422 37.8111L30.669 35.1744C31.7609 33.8931 32.4208 32.2999 32.5547 30.6218L32.8303 27.1685C33.1428 23.2524 36.2525 20.1428 40.1685 19.8303L43.6218 19.5547C45.2999 19.4208 46.8931 18.7609 48.1744 17.669L50.8111 15.422Z" fill="#4F46E5"/>
                                </g>
                                <g filter="url(#filter2_dd)">
                                    <path d="M50.8111 12.422C53.8011 9.87387 58.1989 9.87387 61.1889 12.422L63.8256 14.669C65.1069 15.7609 66.7001 16.4208 68.3782 16.5547L71.8315 16.8303C75.7476 17.1428 78.8572 20.2525 79.1697 24.1685L79.4453 27.6218C79.5792 29.2999 80.2391 30.8931 81.331 32.1744L83.578 34.8111C86.1261 37.8011 86.1261 42.1989 83.578 45.1889L81.331 47.8256C80.2391 49.1069 79.5792 50.7001 79.4453 52.3782L79.1697 55.8315C78.8572 59.7475 75.7475 62.8572 71.8315 63.1697L68.3782 63.4453C66.7001 63.5792 65.1069 64.2391 63.8256 65.331L61.1889 67.578C58.1989 70.1261 53.8011 70.1261 50.8111 67.578L48.1744 65.331C46.8931 64.2391 45.2999 63.5792 43.6218 63.4453L40.1685 63.1697C36.2525 62.8572 33.1428 59.7475 32.8303 55.8315L32.5547 52.3782C32.4208 50.7001 31.7609 49.1069 30.669 47.8256L28.422 45.1889C25.8739 42.1989 25.8739 37.8011 28.422 34.8111L30.669 32.1744C31.7609 30.8931 32.4208 29.2999 32.5547 27.6218L32.8303 24.1685C33.1428 20.2524 36.2525 17.1428 40.1685 16.8303L43.6218 16.5547C45.2999 16.4208 46.8931 15.7609 48.1744 14.669L50.8111 12.422Z" fill="white"/>
                                    <path d="M61.5132 12.0414C58.3363 9.33406 53.6637 9.33406 50.4868 12.0414L47.8501 14.2884C46.6488 15.3121 45.1553 15.9307 43.582 16.0563L40.1288 16.3318C35.9679 16.6639 32.6639 19.9679 32.3318 24.1288L32.0563 27.582C31.9307 29.1553 31.3121 30.6488 30.2884 31.8501L28.0414 34.4868C25.3341 37.6637 25.3341 42.3363 28.0414 45.5132L30.2884 48.1499C31.3121 49.3512 31.9307 50.8447 32.0563 52.418L32.3318 55.8712C32.6639 60.0321 35.9679 63.3361 40.1288 63.6682L43.582 63.9437C45.1553 64.0693 46.6488 64.6879 47.8501 65.7116L50.4868 67.9586C53.6637 70.6659 58.3363 70.6659 61.5132 67.9586L64.1499 65.7116C65.3512 64.6879 66.8447 64.0693 68.418 63.9437L71.8712 63.6682C76.0321 63.3361 79.3361 60.0321 79.6682 55.8712L79.9437 52.418C80.0693 50.8447 80.6879 49.3512 81.7116 48.1499L83.9586 45.5132C86.6659 42.3363 86.6659 37.6637 83.9586 34.4868L81.7116 31.8501C80.6879 30.6488 80.0693 29.1553 79.9437 27.582L79.6682 24.1288C79.3361 19.9679 76.0321 16.6639 71.8712 16.3318L68.418 16.0563C66.8447 15.9307 65.3512 15.3121 64.1499 14.2884L61.5132 12.0414Z" stroke="#121826" stroke-opacity="0.08"/>
                                </g>
                                <circle opacity="0.6" cx="56" cy="40" r="20" stroke="#E5E7EB" stroke-width="2"/>
                                <path d="M49 41L52.4373 44.4373C53.274 45.274 54.6502 45.2054 55.3994 44.2896L63 35" stroke="#60a5fa" stroke-width="2" stroke-linecap="round"/>
                                <defs>
                                    <filter id="filter0_dd" x="38" y="44" width="36" height="50.7357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <filter id="filter1_f" x="22.511" y="9.51099" width="66.9782" height="66.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                        <feGaussianBlur stdDeviation="2" result="effect1_foregroundBlur"/>
                                    </filter>
                                    <filter id="filter2_dd" x="20.511" y="7.51099" width="70.9782" height="70.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(56 16) rotate(90) scale(101 106.739)">
                                        <stop offset="0.542079" stop-color="#C4C4C4"/>
                                        <stop offset="0.757426" stop-color="#C4C4C4" stop-opacity="0"/>
                                    </radialGradient>
                                </defs>
                                <script xmlns=""/></svg>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <h3 class="text-base font-medium text-gray-100">100% money-back guarantee</h3>
                        <p class="mt-2 text-xs text-gray-100">Get 100% of your money back if you're not happy
                            with your course.</p>
                    </div>
                </div>
            </div>
            <div class="mt-20">
                <div class="text-4xl font-bold text-gray-200 text-center">The reason it's so hard to find a language course
                crafted perfectly for travelers...
                </div>
                <div class="text-gray-200 prose-xl text-xl md:text-2xl mt-8">
                    <p class="">
                        Most courses out there aren't made <strong>for travelers <em>by travelers</em></strong>.
                    </p>
                    <p class="">
                        But I've actually been in your shoes. I started traveling Asia over a year ago,
                        and I've experienced all of the situations you'll encounter when you're traveling in an Asian country.
                    </p>
                    <p class="">
                        I've spent over 4 months here in Thailand learning Thai, and Tree and I made this course together, here
                        in Bangkok, with the goal of creating the most helpful and useful Thai travel course you can possibly
                        find.
                    </p>
                    <div class="text-3xl font-bold text-center my-10">
                        Only the Thai you actually need and will actually use
                    </div>
                    <p class="">
                        The goal is for you to <strong>speak Thai while doing all of the most common things you will do every day</strong>
                        during your time in Thailand.
                    </p>
                    <p class="">
                        This enables you to <strong>maximize your time speaking Thai with locals</strong> while learning the least amount of
                        Thai possible.
                    </p>
                    <p class="">
                        You can still speak English in the one-off situations that are unique and need <em>really</em> clear
                        communication. (<em>It will probably be easier for everyone involved anyway</em>).
                    </p>
                    <p class="">
                        But this course gives you the ability to <strong>speak Thai in the situations where it's the most fun and rewarding</strong>.
                    </p>
                    <div class="mx-auto mt-5 mb-10">
                        <img class="rounded-lg shadow-lg xl:mb-8" src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/speaking_thai_at_markets_in_thailand_1687532979.jpg">
                    </div>
                    <div class="text-3xl font-bold text-center my-10">
                        Fun, rewarding, and <br>totally worth it
                    </div>
                    <p class="">
                        <strong>Picture yourself</strong> ordering street food, asking for a beer, introducing yourself to someone new at a bar,
                        or asking a cab driver if he can take you to your hotel.
                    </p>
                    <p class="">
                        Now picture yourself <strong>doing all of that <em>in Thai</em></strong>.
                    </p>
                    <p class="">
                        Imagine the smile on your face and that little dopamine hit you'll feel while you're riding in
                        the cab still in disbelief that <strong>you just spoke Thai to a local and they actually understood you</strong>.
                    </p>
                    <p class="">
                        Those are <strong>the memories you will have for the rest of your life</strong> after your trip to Thailand when you
                        take this course.
                    </p>
                </div>
            </div>
            <div class="mt-20 mx-auto">
                <div class="text-4xl sm:text-5xl font-bold text-white text-center mt-8">
                    @lang('currency.symbol'){{ $course->plans->first()->total_price }}
                    <strike class="text-blue-400"><span class="text-white">$29</span></strike>
                </div>
                <!-- Fix this before setting live!! -->
                <div class="text-center mt-10">
                    <a x-bind:href="'/register?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                       class="bg-blue-400 hover:bg-blue-300 rounded-lg py-2 px-5 text-3xl sm:text-5xl text-white font-bold w-screen">
                        Start for FREE
                    </a>
                    <div class="text-white mt-7 text-sm"><em>(Credit card required)</em></div>
                </div>
                <div class="flex sm:mx-24 my-5 justify-center">
                    <div class="sm:flex-shrink-0">
                        <div class="flow-root">
                            <svg xmlns="http://www.w3.org/2000/svg" width="112" height="96" viewBox="0 0 112 96" fill="none"><script xmlns=""/>
                                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="104" height="88">
                                    <rect x="4" y="4" width="104" height="88" fill="url(#paint0_radial)"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <g filter="url(#filter0_dd)">
                                        <path d="M44 49C44 47.8954 44.8954 47 46 47H66C67.1046 47 68 47.8954 68 49V83.7299C68 85.4256 66.0223 86.3519 64.7196 85.2664L57.2804 79.067C56.5387 78.4489 55.4613 78.4489 54.7196 79.067L47.2804 85.2664C45.9777 86.3519 44 85.4256 44 83.7299V49Z" fill="white"/>
                                        <path d="M46 46.5C44.6193 46.5 43.5 47.6193 43.5 49V83.7299C43.5 85.8495 45.9721 87.0074 47.6005 85.6505L55.0397 79.4511C55.596 78.9875 56.404 78.9875 56.9603 79.4511L64.3995 85.6505C66.0279 87.0074 68.5 85.8495 68.5 83.7299V49C68.5 47.6193 67.3807 46.5 66 46.5H46Z" stroke="#121826" stroke-opacity="0.08"/>
                                    </g>
                                </g>
                                <g opacity="0.2" filter="url(#filter1_f)">
                                    <path d="M50.8111 15.422C53.8011 12.8739 58.1989 12.8739 61.1889 15.422L63.8256 17.669C65.1069 18.7609 66.7001 19.4208 68.3782 19.5547L71.8315 19.8303C75.7476 20.1428 78.8572 23.2525 79.1697 27.1685L79.4453 30.6218C79.5792 32.2999 80.2391 33.8931 81.331 35.1744L83.578 37.8111C86.1261 40.8011 86.1261 45.1989 83.578 48.1889L81.331 50.8256C80.2391 52.1069 79.5792 53.7001 79.4453 55.3782L79.1697 58.8315C78.8572 62.7475 75.7475 65.8572 71.8315 66.1697L68.3782 66.4453C66.7001 66.5792 65.1069 67.2391 63.8256 68.331L61.1889 70.578C58.1989 73.1261 53.8011 73.1261 50.8111 70.578L48.1744 68.331C46.8931 67.2391 45.2999 66.5792 43.6218 66.4453L40.1685 66.1697C36.2525 65.8572 33.1428 62.7475 32.8303 58.8315L32.5547 55.3782C32.4208 53.7001 31.7609 52.1069 30.669 50.8256L28.422 48.1889C25.8739 45.1989 25.8739 40.8011 28.422 37.8111L30.669 35.1744C31.7609 33.8931 32.4208 32.2999 32.5547 30.6218L32.8303 27.1685C33.1428 23.2524 36.2525 20.1428 40.1685 19.8303L43.6218 19.5547C45.2999 19.4208 46.8931 18.7609 48.1744 17.669L50.8111 15.422Z" fill="#4F46E5"/>
                                </g>
                                <g filter="url(#filter2_dd)">
                                    <path d="M50.8111 12.422C53.8011 9.87387 58.1989 9.87387 61.1889 12.422L63.8256 14.669C65.1069 15.7609 66.7001 16.4208 68.3782 16.5547L71.8315 16.8303C75.7476 17.1428 78.8572 20.2525 79.1697 24.1685L79.4453 27.6218C79.5792 29.2999 80.2391 30.8931 81.331 32.1744L83.578 34.8111C86.1261 37.8011 86.1261 42.1989 83.578 45.1889L81.331 47.8256C80.2391 49.1069 79.5792 50.7001 79.4453 52.3782L79.1697 55.8315C78.8572 59.7475 75.7475 62.8572 71.8315 63.1697L68.3782 63.4453C66.7001 63.5792 65.1069 64.2391 63.8256 65.331L61.1889 67.578C58.1989 70.1261 53.8011 70.1261 50.8111 67.578L48.1744 65.331C46.8931 64.2391 45.2999 63.5792 43.6218 63.4453L40.1685 63.1697C36.2525 62.8572 33.1428 59.7475 32.8303 55.8315L32.5547 52.3782C32.4208 50.7001 31.7609 49.1069 30.669 47.8256L28.422 45.1889C25.8739 42.1989 25.8739 37.8011 28.422 34.8111L30.669 32.1744C31.7609 30.8931 32.4208 29.2999 32.5547 27.6218L32.8303 24.1685C33.1428 20.2524 36.2525 17.1428 40.1685 16.8303L43.6218 16.5547C45.2999 16.4208 46.8931 15.7609 48.1744 14.669L50.8111 12.422Z" fill="white"/>
                                    <path d="M61.5132 12.0414C58.3363 9.33406 53.6637 9.33406 50.4868 12.0414L47.8501 14.2884C46.6488 15.3121 45.1553 15.9307 43.582 16.0563L40.1288 16.3318C35.9679 16.6639 32.6639 19.9679 32.3318 24.1288L32.0563 27.582C31.9307 29.1553 31.3121 30.6488 30.2884 31.8501L28.0414 34.4868C25.3341 37.6637 25.3341 42.3363 28.0414 45.5132L30.2884 48.1499C31.3121 49.3512 31.9307 50.8447 32.0563 52.418L32.3318 55.8712C32.6639 60.0321 35.9679 63.3361 40.1288 63.6682L43.582 63.9437C45.1553 64.0693 46.6488 64.6879 47.8501 65.7116L50.4868 67.9586C53.6637 70.6659 58.3363 70.6659 61.5132 67.9586L64.1499 65.7116C65.3512 64.6879 66.8447 64.0693 68.418 63.9437L71.8712 63.6682C76.0321 63.3361 79.3361 60.0321 79.6682 55.8712L79.9437 52.418C80.0693 50.8447 80.6879 49.3512 81.7116 48.1499L83.9586 45.5132C86.6659 42.3363 86.6659 37.6637 83.9586 34.4868L81.7116 31.8501C80.6879 30.6488 80.0693 29.1553 79.9437 27.582L79.6682 24.1288C79.3361 19.9679 76.0321 16.6639 71.8712 16.3318L68.418 16.0563C66.8447 15.9307 65.3512 15.3121 64.1499 14.2884L61.5132 12.0414Z" stroke="#121826" stroke-opacity="0.08"/>
                                </g>
                                <circle opacity="0.6" cx="56" cy="40" r="20" stroke="#E5E7EB" stroke-width="2"/>
                                <path d="M49 41L52.4373 44.4373C53.274 45.274 54.6502 45.2054 55.3994 44.2896L63 35" stroke="#60a5fa" stroke-width="2" stroke-linecap="round"/>
                                <defs>
                                    <filter id="filter0_dd" x="38" y="44" width="36" height="50.7357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <filter id="filter1_f" x="22.511" y="9.51099" width="66.9782" height="66.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                        <feGaussianBlur stdDeviation="2" result="effect1_foregroundBlur"/>
                                    </filter>
                                    <filter id="filter2_dd" x="20.511" y="7.51099" width="70.9782" height="70.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(56 16) rotate(90) scale(101 106.739)">
                                        <stop offset="0.542079" stop-color="#C4C4C4"/>
                                        <stop offset="0.757426" stop-color="#C4C4C4" stop-opacity="0"/>
                                    </radialGradient>
                                </defs>
                                <script xmlns=""/></svg>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <h3 class="text-base font-medium text-gray-100">100% money-back guarantee</h3>
                        <p class="mt-2 text-xs text-gray-100">Get 100% of your money back if you're not happy
                            with your course.</p>
                    </div>
                </div>
            </div>
            <div class="mt-20 prose-xl">
                <div class="text-4xl font-bold text-gray-200 text-center xl:mx-5">Your Thailand trip of a lifetime is only a click away
                </div>
                <div class="text-xl md:text-2xl text-gray-200 mt-8">
                    <p class="">
                        Just 5 video lessons and a few hours of homework will allow you to <strong>speak enough Thai
                        with locals in Thailand</strong> to completely change your trip into one that you'll never forget.
                    </p>
                    <p class="">
                        Let me now just quickly tell you some of the features that I've built <em>personally</em> to make sure that
                        you actually <strong>learn from your course and stick to it</strong>.
                    </p>
                    <div class="mx-auto mt-5 mb-10">
                        <img class="rounded-lg shadow-lg xl:mb-8" src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/learn_Thai_effectively_1687532692.jpg">
                    </div>
                    <p class="">
                        I've designed the course in a way that <strong>guides you through the learning process</strong> to make sure you actually
                        learn the information and remember it when you need it in real life.
                    </p>
                    <p class="">
                        The simple step by step learning path of the course makes sure <strong>you will eventually be speaking Thai every
                        day during your time in Thailand</strong>.
                    </p>
                </div>
                <div class="my-24">
                    <div class="mt-5 mb-12 text-3xl text-center text-gray-200 font-bold">
                        Easy to follow video lessons that teach you Thai at your own pace
                    </div>
                    <img src="/images/pages/thai travel course lesson.jpeg" class="rounded-xl mx-auto my-8 h-100">
                    <p class="text-gray-200 mt-8">Tree is a certified and experienced Thai teacher with incredible English skills. This means
                        that you can follow her lessons easily and understand everything she's saying and trying to teach you.
                    </p>
                </div>
                <div class="my-24">
                    <div class="mt-12 mb-12 text-3xl text-center text-gray-200 font-bold">
                        You won't just hear the information,<br> you'll actually <u><em>process</em></u> it
                    </div>
                    <img src="/images/courses/thai-travel/thai travel course guided practice screenshot.jpg"
                         class="rounded-xl mx-auto my-8 h-100">
                    <p class="text-gray-200 mt-8">Your practice exercises after each lesson allow your brain to
                        encode and process the information you just learned making sure that all of the words and phrases
                        you learn come to you right when you need them during your trip.
                    </p>
                </div>
                <div class="my-24">
                    <div class="mt-12 mb-12 text-3xl text-center text-gray-200 font-bold">
                        Instant feedback helps you improve quickly
                    </div>
                    <img src="/images/courses/thai-travel/thai travel course guided practice results screenshot.jpg"
                         class="rounded-xl mx-auto my-8 h-100">
                    <p class="text-gray-200 mt-8">Instead of waiting for a teacher or grading your exercises yourself, you'll get
                        the correct answers to your exercises immediately so you can see what still needs improving.
                    </p>
                </div>
                <div class="my-24">
                    <div class="mt-12 text-3xl text-center text-gray-200 font-bold">
                        Ready-made flashcards to help you memorize words fast
                    </div>
                    <video controls="controls" autoplay width="800" height="600" class="mt-0" name="Video Name">
                        <source src="/images/courses/thai-travel/flashcards example.mov">
                    </video>
                    <p class="text-gray-200">Study complete flashcard packs for every lesson to make sure you remember the
                        words from the lesson when you need them.
                    </p>
                </div>
                <div class="my-24">
                    <div class="mt-16 mb-10 text-3xl text-center text-gray-200 font-bold">
                        Test your knowledge with interactive quizzes
                    </div>
                    <img src="/images/courses/thai-travel/thai travel course quiz screenshot.jpg"
                         class="rounded-xl mx-auto my-8 h-100">
                    <p class="text-gray-200 mt-8">Test your knowledge at the end of every lesson with interactive quizzes that help
                        drive home all of the information you've learned from the lesson.
                    </p>
                </div>
                <div class="my-24">
                    <div class="mt-16 mb-10 text-3xl text-center text-gray-200 font-bold">
                        A simple step-by-step learning path
                    </div>
                    <img src="/images/courses/thai-travel/thai travel course lesson overview screenshot.jpg"
                         class="rounded-xl mx-auto my-8 h-100">
                    <p class="text-gray-200 mt-8">Make progress in every single lesson by simply following your course
                        step-by-step until you're able to speak all the Thai you need to make
                        your time in Thailand an experience you'll never forget.
                    </p>
                </div>
            </div>
            <div class="mx-auto">
                <div class="text-5xl font-bold tracking-tight text-gray-200 text-center mt-8 mb-16">
                    Start your course now and unlock your Thailand trip of a lifetime
                </div>
                <div class="mx-auto mt-5 mb-12">
                    <img class="rounded-lg shadow-lg xl:mb-8" src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/learn_thai_for_visiting_thailand_1687532805.jpg">
                </div>
                <div class="text-4xl sm:text-5xl font-bold text-white text-center mt-16">
                    @lang('currency.symbol'){{ $course->plans->first()->total_price }}
                    <strike class="text-blue-400"><span class="text-white">$29</span></strike>
                </div>
                <div class="text-center mt-10">
                    <a x-bind:href="'/register?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                       class="bg-blue-400 hover:bg-blue-300 rounded-lg py-2 px-5 text-3xl sm:text-5xl text-white font-bold w-screen">
                        Start for FREE
                    </a>
                    <div class="text-white mt-7 text-sm"><em>(Credit card required)</em></div>
                </div>
                <div class="flex sm:mx-24 my-5 justify-center">
                    <div class="sm:flex-shrink-0">
                        <div class="flow-root">
                            <svg xmlns="http://www.w3.org/2000/svg" width="112" height="96" viewBox="0 0 112 96" fill="none"><script xmlns=""/>
                                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="104" height="88">
                                    <rect x="4" y="4" width="104" height="88" fill="url(#paint0_radial)"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <g filter="url(#filter0_dd)">
                                        <path d="M44 49C44 47.8954 44.8954 47 46 47H66C67.1046 47 68 47.8954 68 49V83.7299C68 85.4256 66.0223 86.3519 64.7196 85.2664L57.2804 79.067C56.5387 78.4489 55.4613 78.4489 54.7196 79.067L47.2804 85.2664C45.9777 86.3519 44 85.4256 44 83.7299V49Z" fill="white"/>
                                        <path d="M46 46.5C44.6193 46.5 43.5 47.6193 43.5 49V83.7299C43.5 85.8495 45.9721 87.0074 47.6005 85.6505L55.0397 79.4511C55.596 78.9875 56.404 78.9875 56.9603 79.4511L64.3995 85.6505C66.0279 87.0074 68.5 85.8495 68.5 83.7299V49C68.5 47.6193 67.3807 46.5 66 46.5H46Z" stroke="#121826" stroke-opacity="0.08"/>
                                    </g>
                                </g>
                                <g opacity="0.2" filter="url(#filter1_f)">
                                    <path d="M50.8111 15.422C53.8011 12.8739 58.1989 12.8739 61.1889 15.422L63.8256 17.669C65.1069 18.7609 66.7001 19.4208 68.3782 19.5547L71.8315 19.8303C75.7476 20.1428 78.8572 23.2525 79.1697 27.1685L79.4453 30.6218C79.5792 32.2999 80.2391 33.8931 81.331 35.1744L83.578 37.8111C86.1261 40.8011 86.1261 45.1989 83.578 48.1889L81.331 50.8256C80.2391 52.1069 79.5792 53.7001 79.4453 55.3782L79.1697 58.8315C78.8572 62.7475 75.7475 65.8572 71.8315 66.1697L68.3782 66.4453C66.7001 66.5792 65.1069 67.2391 63.8256 68.331L61.1889 70.578C58.1989 73.1261 53.8011 73.1261 50.8111 70.578L48.1744 68.331C46.8931 67.2391 45.2999 66.5792 43.6218 66.4453L40.1685 66.1697C36.2525 65.8572 33.1428 62.7475 32.8303 58.8315L32.5547 55.3782C32.4208 53.7001 31.7609 52.1069 30.669 50.8256L28.422 48.1889C25.8739 45.1989 25.8739 40.8011 28.422 37.8111L30.669 35.1744C31.7609 33.8931 32.4208 32.2999 32.5547 30.6218L32.8303 27.1685C33.1428 23.2524 36.2525 20.1428 40.1685 19.8303L43.6218 19.5547C45.2999 19.4208 46.8931 18.7609 48.1744 17.669L50.8111 15.422Z" fill="#4F46E5"/>
                                </g>
                                <g filter="url(#filter2_dd)">
                                    <path d="M50.8111 12.422C53.8011 9.87387 58.1989 9.87387 61.1889 12.422L63.8256 14.669C65.1069 15.7609 66.7001 16.4208 68.3782 16.5547L71.8315 16.8303C75.7476 17.1428 78.8572 20.2525 79.1697 24.1685L79.4453 27.6218C79.5792 29.2999 80.2391 30.8931 81.331 32.1744L83.578 34.8111C86.1261 37.8011 86.1261 42.1989 83.578 45.1889L81.331 47.8256C80.2391 49.1069 79.5792 50.7001 79.4453 52.3782L79.1697 55.8315C78.8572 59.7475 75.7475 62.8572 71.8315 63.1697L68.3782 63.4453C66.7001 63.5792 65.1069 64.2391 63.8256 65.331L61.1889 67.578C58.1989 70.1261 53.8011 70.1261 50.8111 67.578L48.1744 65.331C46.8931 64.2391 45.2999 63.5792 43.6218 63.4453L40.1685 63.1697C36.2525 62.8572 33.1428 59.7475 32.8303 55.8315L32.5547 52.3782C32.4208 50.7001 31.7609 49.1069 30.669 47.8256L28.422 45.1889C25.8739 42.1989 25.8739 37.8011 28.422 34.8111L30.669 32.1744C31.7609 30.8931 32.4208 29.2999 32.5547 27.6218L32.8303 24.1685C33.1428 20.2524 36.2525 17.1428 40.1685 16.8303L43.6218 16.5547C45.2999 16.4208 46.8931 15.7609 48.1744 14.669L50.8111 12.422Z" fill="white"/>
                                    <path d="M61.5132 12.0414C58.3363 9.33406 53.6637 9.33406 50.4868 12.0414L47.8501 14.2884C46.6488 15.3121 45.1553 15.9307 43.582 16.0563L40.1288 16.3318C35.9679 16.6639 32.6639 19.9679 32.3318 24.1288L32.0563 27.582C31.9307 29.1553 31.3121 30.6488 30.2884 31.8501L28.0414 34.4868C25.3341 37.6637 25.3341 42.3363 28.0414 45.5132L30.2884 48.1499C31.3121 49.3512 31.9307 50.8447 32.0563 52.418L32.3318 55.8712C32.6639 60.0321 35.9679 63.3361 40.1288 63.6682L43.582 63.9437C45.1553 64.0693 46.6488 64.6879 47.8501 65.7116L50.4868 67.9586C53.6637 70.6659 58.3363 70.6659 61.5132 67.9586L64.1499 65.7116C65.3512 64.6879 66.8447 64.0693 68.418 63.9437L71.8712 63.6682C76.0321 63.3361 79.3361 60.0321 79.6682 55.8712L79.9437 52.418C80.0693 50.8447 80.6879 49.3512 81.7116 48.1499L83.9586 45.5132C86.6659 42.3363 86.6659 37.6637 83.9586 34.4868L81.7116 31.8501C80.6879 30.6488 80.0693 29.1553 79.9437 27.582L79.6682 24.1288C79.3361 19.9679 76.0321 16.6639 71.8712 16.3318L68.418 16.0563C66.8447 15.9307 65.3512 15.3121 64.1499 14.2884L61.5132 12.0414Z" stroke="#121826" stroke-opacity="0.08"/>
                                </g>
                                <circle opacity="0.6" cx="56" cy="40" r="20" stroke="#E5E7EB" stroke-width="2"/>
                                <path d="M49 41L52.4373 44.4373C53.274 45.274 54.6502 45.2054 55.3994 44.2896L63 35" stroke="#60a5fa" stroke-width="2" stroke-linecap="round"/>
                                <defs>
                                    <filter id="filter0_dd" x="38" y="44" width="36" height="50.7357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <filter id="filter1_f" x="22.511" y="9.51099" width="66.9782" height="66.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                        <feGaussianBlur stdDeviation="2" result="effect1_foregroundBlur"/>
                                    </filter>
                                    <filter id="filter2_dd" x="20.511" y="7.51099" width="70.9782" height="70.9782" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="3"/>
                                        <feGaussianBlur stdDeviation="2.5"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.04 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dy="1"/>
                                        <feGaussianBlur stdDeviation="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.0705882 0 0 0 0 0.0941176 0 0 0 0 0.14902 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                    </filter>
                                    <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(56 16) rotate(90) scale(101 106.739)">
                                        <stop offset="0.542079" stop-color="#C4C4C4"/>
                                        <stop offset="0.757426" stop-color="#C4C4C4" stop-opacity="0"/>
                                    </radialGradient>
                                </defs>
                                <script xmlns=""/></svg>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <h3 class="text-base font-medium text-gray-100">100% money-back guarantee</h3>
                        <p class="mt-2 text-xs text-gray-100">Get 100% of your money back if you're not happy
                            with your course.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer grid grid-cols-3 mx-24 pt-5 pb-8">
            <div class="col-span-1">
                <div class="text-sm text-center">
                    <a class="!text-gray-300" href="/{{ session('locale') ?? 'en' }}/privacy-policy">Privacy</a>
                </div>
            </div>
            <div class="col-span-1">
                <div class="text-gray-300 text-sm text-center">
                    ©{{ date('Y') }} The Weaver School
                </div>
            </div>
            <div class="col-span-1">
                <div class="text-sm text-center">
                    <a class="!text-gray-300" href="/{{ session('locale') ?? 'en' }}/general-terms">Terms</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.squeeze-dark>
