<x-layouts.app>
  <x-slot name="title">
    English Courses in the Netherlands
  </x-slot>
  <x-slot name="description">
    Choose the right English course in Rotterdam for you. Group courses and private lessons for professionals, adults, and IELTS students.
  </x-slot>

  <x-heroes.ielts-courses />

  <div class="grid grid-cols-1 mb-5 py-16 lg:py-8 px-16 lg:px-80 bg-blue-400">
    <div class="text-white">
      <h1 class="text-center font-extrabold">
        IELTS courses for IELTS exam preparation
      </h1>
      <p class="lead">We offer IELTS courses in the Netherlands in several ways, including group courses and private lessons. Which choice is right for you? Read further to find out about each type of IELTS course preparation.
      </p>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
        IELTS Private Lessons
      </h2>
      <p>
        Sometimes when you’re looking for IELTS courses you’re looking for more one-on-one attention. There’s no better or quicker way to improve your skills than one-on-one, personal attention. Your teacher can really then focus on your specific needs and which sections of the exam you are struggling with. Your teacher will come up with custom lesson plans that will help you improve your English, improve your test-taking skills, and increase your comfort level with the IELTS exam. If you’re looking for IELTS courses where you get one teacher who focuses entirely on you, private lessons from The Weaver School are the way to go.
      </p>
      <p>
        Private lessons are scheduled according to your availability and are usually either 1 or 1.5 hours per week, plus time spent at home doing homework
      </p>
      <p>
        <strong>Courses include:</strong>
        <li>Customized lesson plans</li>
        <li>Weekly reading and homework material</li>
        <li>Speaking practice and correction</li>
        <li>Writing homework and correction</li>
      </p>
      <a href="/private-lessons" class="unstyled w-48 flex items-center justify-center px-5 py-3 mb-5 md:mb-0 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-2 md:px-5">
        View lessons
      </a>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-6.jpg') }}" class="h-full w-full object-center object-cover" alt="private English lessons">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
        IELTS Courses in Groups
      </h2>
      <p>
        A group English course for IELTS prep can be one of the most cost-effective and fun ways to prepare for your exam. In group IELTS courses from The Weaver School, you’ll be paired with nine other students (a total of 10 students per course) who are at about the same level of English as you. You’ll meet once a week in the evening for two hours, for a total of ten weeks.
      </p>
      <a href="/courses" class="unstyled w-48 flex items-center justify-center px-5 py-3 mb-5 md:mb-0 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-2 md:px-5">
        View courses
      </a>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-3.jpg') }}" class="h-full object-center object-cover" alt="group english courses">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
        IELTS Course Lesson Structure
      </h2>
      <p>
        Our IELTS courses in a group setting consist of several aspects. The most important thing to accomplish in the course is for you to improve your English to the level you need to produce and understand English at a level high enough to attend lectures and engage in classroom discussion in English. The next step is then to learn all the sections of the exam so you can understand which skills you’ll need to improve to pass the exam. The final step is to practice and improve those skills so that you’ll be confident and ready when you take the IELTS exam.
      </p>
      <p>
        You’ll be practicing your IELTS test taking skills by taking practice exams, doing practice exercises, and keeping track of your scores as you progress. You’ll learn all the skills you need and then practice them each week in your IELTS group course.
      </p>
      <p>
        We’ll use textbooks with previous IELTS exams, as well as targeted exercises from proven IELTS prep textbooks.
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-5.jpg') }}" class="h-full object-center object-cover" alt="english course skills">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
        Which IELTS Course is Right for You?
      </h2>
      <p>
        It all depends on your specific needs, but if you’re not sure which choice is right for you, feel free to email us and we can help you with any questions you may have. Even if we don’t have what you need, we’ll make sure you get the best IELTS course for your needs.
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-1.png') }}" class="h-full object-center object-cover" alt="improve speaking with english course">
    </div>
  </div>

<div class="container bg-white">
  {{-- <div class="row pb-5 justify-content-center">
    <div class="card-deck justify-content-center">
@foreach($courses as $course)
      <div class="col-lg-4 col-md-10 col-sm-10 no-gutters my-3">
        <div class="card courses-page-card">
        <img src="{{ $course->image }}" class="card-img-top" alt="The Weaver School general english course in rotterdam">
            <div class="card-body text-center">
              <h4 class="card-title">{{ $course->name }}</h4>
              <hr>
              <p class="card-text">{{ $course->description }}</p>
            </div>
            <div class="card-footer">
              <a href="/courses/{{ $course->id }}" class="btn btn-lg btn-primary btn-block">View Course</a>
            </div>
        </div>
      </div>
@endforeach
    </div>
  </div> --}}

  <!-- CTA -->
  @if (Auth::check())
    <x-cta.user />
  @else
    <x-cta.visitor />
  @endif
  <!-- End CTA -->

</div>

</x-layouts.app>
