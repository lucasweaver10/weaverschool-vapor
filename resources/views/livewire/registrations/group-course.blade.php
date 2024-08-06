<div x-data="{
    step: @entangle('step').live,
    progress: @entangle('progress').live,
    selectedCourseType: @entangle('selectedCourseType').live,
    selectedCourseId: @entangle('selectedCourseId').live,
    selectedSubcategoryId: @entangle('selectedSubcategoryId').live,
}"
    wire:submit="" onkeydown="return event.key != 'Enter';">

    <div wire:loading wire:target="registerCourse">
        <img src="/images/loading.gif" class="w-36 h-36 mt-5 ml-5 mb-5">
    </div>

    <div x-show="step !== 'completed'" wire:loading.remove wire:target="registerCourse" class="rounded-lg bg-white p-4 shadow-sm">
        <div id="private-lessons-selection-form" class="" x-show="step === 1">
            <p class="text-xl">Which language do you want to improve?</p>
            <div class="form-group">
                <select x-model="selectedSubcategoryId" wire:model.live="selectedSubcategoryId" class="form-control">
                    <option value="">Choose a language</option>
                    @foreach ($subcategories as $subcategory)
                        <option value={{ $subcategory->id }}>{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button wire:click="processSubcategorySelection" class="inline-flex items-center px-4 py-3 mt-4 border
                    border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">Continue</button>
            </div>
        </div>

        <div class="course-selection-form" x-show="step === 2">
            <p class="">Which course would you like?</p>
            <div class="form-group w-80">
                <select x-model="selectedCourseId" wire:model.live="selectedCourseId" class="form-control">
                    @foreach ($courses as $course)
                        <option value={{ $course->id }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                @foreach ($courses as $course)
                    <div x-cloak x-show="selectedCourseId === '{{ $course->id }}'">
                        <p class="mt-4">{{ $course->about }}</p>
                    </div>
                @endforeach
                <button wire:click="processCourseSelection" class="inline-flex items-center px-4 py-3 mt-4 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">Continue</button>
            </div>
        </div>

        <div class="confirm-registration-form" x-show="step === 3">
            <p class="">Please review and confirm your registration:</p>
            <table class="table">
                <tbody>
                  <tr>
                    <th scope="row">Course Type:</th>
                    <td>{{ $this->selectedCourseType ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">Course Name:</th>
                    <td>{{ $this->course->name ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">Total Hours:</th>
                    <td>{{ $this->course->total_hours ?? '' }}</td>
                </tr>
    {{--            <tr>--}}
    {{--                <th scope="row">Day:</th>--}}
    {{--                <td>{{ $this->course->day ?? '' }}</td>--}}
    {{--            </tr>--}}
                <tr>
                    <th scope="row">Total Price:</th>
                    <td>€{{ $this->course->price ?? '' }} @isset($this->course->price)(€ {{ ceil($this->course->price /3) }}/month)@endisset</td>
                  </tr>
                </tbody>
              </table>
            <button wire:click="registerCourse" class="inline-flex items-center px-4 py-3 mt-4 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">Register</button>
        </div>

        <div x-show="step != 1 && step !== 'completed'" class="grid justify-items-end">
            <button class="btn btn-sm btn-light" type="button" x-on:click="step--">Go Back</button>
        </div>

    </div>

        <div class="thank-you" x-show="step === 'completed'">
            <div class="rounded-xl bg-white p-4 shadow-sm">
                <h4 class="text-center">Success! Redirecting to courses...</h4>
                <div style="width:100%;height:0;padding-bottom:56%;position:relative;"><iframe src="https://giphy.com/embed/BPJmthQ3YRwD6QqcVD" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>
            </div>
        </div>

        <div id="progress-bar" wire:loading.remove wire:target="registerCourse" x-show="step !== 'completed'"
             class="rounded-lg bg-gray-200 h-5 mt-5 mb-6">
            <div class="bg-blue-400 h-5 rounded-lg" style="width: {{ $progress }}%"></div>
        </div>



</div>
