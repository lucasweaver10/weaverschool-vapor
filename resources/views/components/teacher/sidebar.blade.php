<aside class="relative bg-gray-400 h-screen w-72 hidden sm:block shadow-xl top-0">
    <div class="p-6">
      <img class="h-20 mx-auto" src="/images/logos/The Weaver School logo full.png"/>
        {{-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Report
        </button> --}}
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="#" @click=" tab = 'dashboard' " class="flex items-center text-white opacity-75 hover:opacity-100 py-1 pl-6 nav-item">
          <i class="fas fa-tachometer-alt mr-3"></i>
          Dashboard
        </a>
        <a @click="isOpen = !isOpen" href="#" class="flex items-center active-nav-link text-white py-1 pl-6 nav-item">
          <i class="fas fa-sticky-note mr-3"></i>
          Courses
        </a>
          @foreach ($registrations as $registration)
            <a x-show="isOpen" @click=" tab = {{ $registration->id }} " href="#" class="flex items-center active-nav-link text-white py-1 pl-6 nav-item ml-2 mr-2">
              <i class="fas fa-sticky-note mr-3"></i>
              {{ $registration->private_lessons_name }}
            </a>
          @endforeach

        <a href="#" @click=" tab = 'payments' " class="flex items-center active-nav-link text-white py-1 pl-6 nav-item">
          <i class="fas fa-sticky-note mr-3"></i>
          Payments
        </a>
        <a href="#" @click=" tab = 'levelTest' " class="flex items-center active-nav-link text-white py-1 pl-6 nav-item">
          <i class="fas fa-sticky-note mr-3"></i>
          Level Test
        </a>

    </nav>
  </aside>
