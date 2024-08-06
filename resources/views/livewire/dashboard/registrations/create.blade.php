<div class="" x-data="{planDescription: @entangle('planDescription').live, courseId: @entangle('courseId').live,
planId: @entangle('planId').live, subcategory: @entangle('subcategory').live, subcategoryId: '1', plans: @entangle('plans').live, courseImage: @entangle('courseImage').live,
course: @entangle('course').live, plan: @entangle('plan').live}">
        <div class="mx-auto max-w-2xl pb-24 pt-5 px-2 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Course Registration</h2>

            <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                <div>
                    <div class="border-gray-200">
                        <h2 class="text-2xl font-medium text-gray-900">Information</h2>

                        <div class="mt-4 grid grid-cols-1 gap-y-8 sm:grid-cols-2 sm:gap-x-6">
                            <div class="sm:col-span-2">
                                <label for="language" class="block text-lg font-medium text-gray-700">Language</label>
                                <div class="mt-1">
                                    <select wire:model.live="subcategoryId" wire:change="updateCourses"
                                            id="language" name="language" autocomplete=""
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300
                                            focus:ring-blue-300 sm:text-xl">
                                        <option value="0">Select your target language</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="course" class="block text-lg font-medium text-gray-700">Course</label>
                                <div class="mt-1">
                                    <select wire:model.live="courseId" wire:change="updateCourse"
                                            id="course" name="course" autocomplete=""
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300
                                            focus:ring-blue-300 sm:text-xl">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="plan" class="block text-lg font-medium text-gray-700">Plan</label>
                                <div class="mt-1">
                                    <select wire:change="updatePlan" wire:model.live="planId" id="plan"
                                            name="plan" autocomplete=""
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300
                                            focus:ring-blue-300 sm:text-xl">
                                        @foreach($plans as $plan)
                                            <option value="{{ $plan->id }}">
                                                @if($plan->times == 1)
                                                    {{ $plan->name }} (@lang('currency.symbol'){{ $plan->total_price }})
                                                @else
                                                {{ $plan->name}} (@lang('currency.symbol'){{ $plan->monthly_price }}/mo)
                                                @endif
                                            </option>
                                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div x-show="plan !== null" class="sm:col-span-2">
                                <label for="plan_description" class="block text-lg font-medium text-gray-700">Plan Description</label>
                                <div class="mt-1">
                                    <p class="sm:text-xl">{{ $this->plan->description ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order summary -->
                <div x-cloak x-show="plan !== null" class="mt-10 lg:mt-0">
                    <h2 class="text-2xl font-medium text-gray-900">Summary</h2>

                    <div class="mt-4 pt-8 pb-5 px-8 gap-y-5 grid grid-cols-1 sm:grid-cols-2 rounded-lg border border-gray-200 bg-white shadow-sm">
                                <div x-cloak x-show="courseImage !== null" class="flex-shrink-0 sm:mr-4">
                                    <img src="{{ $this->course->image ?? '' }}" alt="" class="w-full sm:w-40 rounded-md">
                                </div>

                                <div class="sm:ml-6 col-span-1">
                                    <div class="">
                                        <div class="">
                                            <h4 class="text-xl">
                                                @unless($this->course == null)
                                                    <a href="/{{ session('locale') }}/{{ strtolower($this->subcategory->name) }}/courses/online/{{ $this->course->slug }}"
                                                       target="_blank" class="font-medium text-gray-700 hover:text-gray-800">{{ $this->course->name ?? '' }}</a>
                                                @endunless
                                            </h4>
                                            <p class="text-md text-gray-500">{{ $this->plan->name ?? '' }}</p>
                                        </div>
                                    </div>

                                    <div class="col-span-1 items-end justify-between pt-2">
                                        @if($this->plan)
                                            @if($this->plan->times == 1)
                                                <p class="mt-1 text-sm font-medium text-gray-900">@lang('currency.symbol'){{ $this->plan->total_price }}</p>
                                            @else
                                                <p class="mt-1 text-sm font-medium text-gray-900">@lang('currency.symbol'){{ $this->plan->monthly_price }}/mo</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                        @if($this->plan)
                            <dl class="col-span-1 sm:col-span-2">
                                    @if($this->plan->times > 1)
                                        <div class="flex items-center justify-between">
                                            <dt class="text-sm">Monthly total</dt>
                                            <dd class="text-sm font-medium text-gray-900">@lang('currency.symbol'){{ $this->plan->monthly_price }}/mo</dd>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <dt class="text-sm">Number of months</dt>
                                            <dd class="text-sm font-medium text-gray-900">{{ $this->plan->times }}</dd>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <dt class="text-sm">Total</dt>
                                            <dd class="text-sm font-medium text-gray-900">@lang('currency.symbol'){{ $this->plan->total_price }}</dd>
                                        </div>
                                    @endif
                                    <div class="flex items-center justify-between">
                                        <dt class="text-2xl font-medium">Total due today</dt>
                                        <dd class="text-2xl font-medium text-gray-900">@lang('currency.symbol'){{ $this->plan->monthly_price }}</dd>
                                    </div>
                            </dl>
                        @endif

                        <div class="col-span-1 sm:col-span-2">
                            @guest
                                <span class="">
                                    <a x-bind:href="'/register?course_id=' + courseId + '&plan_id=' + planId"
                                       role="button" id="register-button" class="block w-full rounded-lg border border-transparent bg-teal-400 py-3 px-2 font-medium text-white shadow-sm
                                hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2
                                focus:ring-offset-gray-50
                                sm:order-last">
                                        Start my 7-day FREE trial
                                    </a>
                                </span>
                            @endguest
                            @auth
                                <span class="">
                                    <a x-bind:href="'/{{ session('locale') }}/registrations/confirm?course_id=' + courseId + '&plan_id=' + planId"
                                       role="button" id="register-button" class="block w-full mt-3 text-center rounded-lg border border-transparent bg-teal-400 py-3 px-2 font-medium text-white shadow-sm
                                hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2
                                focus:ring-offset-gray-50
                                sm:order-last">
                                        Start my 7-day FREE trial
                                    </a>
                                </span>
                            @endauth
                        </div>
                    </div>
                </div>
            </form>
        </div>
     </div>
