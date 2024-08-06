<x-layouts.app :registrations="$registrations">
<div class="container-fluid">
    @if($message = Session::get('registration-success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <p>{{ $message }}</p>
    </div>
  @endif
  @if($message = Session::get('invoicing-success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <p>{{ $message }}</p>
    </div>
  @endif
<!-- Subnav -->
{{-- <ul class="nav nav-pills nav-fills justify-content-center py-1 mt-4 mb-4" id="myTab" role="tablist">
@if($level === null )
<li class="nav-item">
    <a class="nav-link pill active" id="level-test-tab" data-toggle="tab" href="#level-test" role="tab" aria-controls="level-test" aria-selected="false">Level Test</a>
</li>
@endif
<li class="nav-item">
    <a class="nav-link pill @if($level !== null)active @endif" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">Courses</a>
</li>
@unless($level === null)
<li class="nav-item">
    <a class="nav-link pill" id="registration-tab" data-toggle="tab" href="#registration" role="tab" aria-controls="registration"
    aria-selected="false">Registration</a>
</li>
@endunless
@unless(count($registrations) === 0)
<li class="nav-item ">
    <a class="nav-link pill" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Payment</a>
</li>
@endunless
@unless(count($registrations) === 0)
<li class="nav-item ">
    <a class="nav-link pill" id="subscription-tab" data-toggle="tab" href="#subscription" role="tab" aria-controls="subscription" aria-selected="false">Subscription</a>
</li>
@endunless
@if($level !== null)
<li class="nav-item">
    <a class="nav-link pill" id="level-test-tab" data-toggle="tab" href="#level-test" role="tab" aria-controls="level-test" aria-selected="false">Level Test</a>
</li>
@endif
@unless(count($registrations) === 0)
<li class="nav-item">
    <a class="nav-link pill" id="invoicing-tab" data-toggle="tab" href="#invoicing" role="tab" aria-controls="invoicing"
    aria-selected="false">Invoicing</a>
</li>
@endunless
</ul>
</div> --}}
<!-- End Subnav -->
<div class="container">
<div class="row">
    <div class="col-12">
        <!-- Start Tab Content -->
        <div class="tab-content" id="myTabContent">
            @if($level === null )
            <!-- Level Test Tab -->
            @component('components.dashboard.level-test-tab', [
                'score' => $score,
                'level' => $level,
                'recommendation' => $recommendation,
                'questions' => $questions,
                'levelTestId' => $levelTestId,
            ])
            @endcomponent
            <!-- End Level Test Tab -->
            @endif
            <!-- Courses Tab -->
            @component('components.dashboard.courses-tab', [
                'courses' => $courses,
                'ocourses' => $ocourses,
                'plans' => $plans,
                'oplans' => $oplans,
                'registrations' => $registrations,
                'privateLessonsRegistrations' => $privateLessonsRegistrations,
                'level' => $level,
            ])
            @endcomponent

            <x-dashboard.courses.show :registrations="$registrations" />



            <!-- End Courses Tab -->
            <!-- Registration Tab -->
            {{-- @component('components.dashboard.registration-tab', [
                'courses' => $courses,
                'ocourses' => $ocourses,
                'privateLessons' => $privateLessons,
                'plans' => $plans,
                'oplans' => $oplans,
                'registrations' => $registrations,
            ])
            @endcomponent --}}
            <x-registrations.registration :privateLessons="$privateLessons" :courses="$courses" :teachers="$teachers"/>
            <!-- End Registration Tab -->
            <!-- Payment Tab -->
            @component('components.dashboard.payment-tab', [
                'courses' => $courses,
                'ocourses' => $ocourses,
                'plans' => $plans,
                'oplans' => $oplans,
                'registrations' => $registrations,
            ])
            @endcomponent
            <!-- End Payment Tab -->
            <!-- Subscription Tab -->
            @component('components.dashboard.subscription-tab', [
                'user' => $user,
                'registrations' => $registrations,
                'subscriptions' => $subscriptions,
            ])
            @endcomponent
            <!-- End Subscription Tab -->
            @if($level !== null)
            <!-- Level Test Tab -->
            @component('components.dashboard.level-test-tab', [
                'score' => $score,
                'level' => $level,
                'recommendation' => $recommendation,
            ])
            @endcomponent
            <!-- End Level Test Tab -->
            @endif

            <!-- Invoicing Tab -->
            @component('components.dashboard.invoicing-tab', [
               'user' => $user,
               'registrations' => $registrations,
            ])
            @endcomponent
            <!-- End Billing Tab -->
        </div>
        <!-- End Tab Content -->
    </div>
</div>
</div>
</div>

</x-layouts.app>
