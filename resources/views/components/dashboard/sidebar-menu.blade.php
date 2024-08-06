                    {{-- <li class="nav-item">
                    <a class="nav-link pill id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">Courses</a>
                    </li> --}}
                    <li class="nav-item active" x-data="{ open: false }">
                        <a @click="open = ! open" class="nav-link active" id="courses-tab" dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses</a>
                        <div class="">
                            <a x-cloak
                            x-show="open"
                            class="nav-link pill" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">Active Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="registration-tab" data-toggle="tab" href="#registration" role="tab" aria-controls="registration"
                        aria-selected="false">Registration</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link pill" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="level-test-tab" data-toggle="tab" href="#level-test" role="tab" aria-controls="level-test" aria-selected="false">Level Test</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link active" href="/dashboard/courses/{{ $id }}">
                          <span data-feather="home"></span>
                            Overview <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/dashboard/courses/{{ $id }}/assignments">
                          <span data-feather="file"></span>
                            Assignments
                        </a>
                      </li> --}}
