<x-layouts.app title="English Language School Locations | The Weaver School">
{{-- <x-app.meta-description content="Choose from any of our English language school locations throughout the Netherlands."/> --}}

<div class="container bg-white">
  <div class="row justify-content-center pt-3">
    <div class="col-lg-12 text-center">
    <h1>English Language School Locations in the Netherlands</h1>
    <p class="lead">Choose from any of our convenient English language school locations throughout the Netherlands.</p>
    <a class="button btn-lg btn-primary" id="rotterdam" data-toggle="" href="/locations/rotterdam" role="button" aria-controls="group" aria-selected="true">Rotterdam</a>
    {{-- <ul class="nav nav-pills nav-fills justify-content-center mx-auto my-3" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link pill active" id="in-person-link" data-toggle="" href="" role="" aria-controls="group" aria-selected="true">Rotterdam</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pill" id="online-link" data-toggle="" href="/online-courses" role="" aria-controls="group" aria-selected="true">Den Haag</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pill" id="online-link" data-toggle="" href="/online-courses" role="" aria-controls="group" aria-selected="true">Utrecht</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pill" id="online-link" data-toggle="" href="/online-courses" role="" aria-controls="group" aria-selected="true">Amsterdam</a>
      </li>
    </ul> --}}
    </div>
  </div>

  <div class="row my-5 align-content-center">
    <div class="col">
      <h2>Convenient Location</h2>
      <p>Rotterdam's most convenient location for English courses. Located right next to Rotterdam Central Station, you can reach your course
        via car, train, metro, tram, or bike.</p>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">
      <div class="card-deck">
        <div class="card card-img g-map embed-responsive" style="width: 26rem; height: 22rem;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2460.581874721026!2d4.466963315350575!3d51.92333928802719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c434b318fa5bd5%3A0x50418520688d5fdb!2sWeaver+English!5e0!3m2!1sen!2snl!4v1566041624375!5m2!1sen!2snl"
                width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  <!-- CTA -->
  @component ('components.cta')
  @endcomponent
  <!-- End CTA -->
  <!-- Modal -->
  @component ('components.modal', [
      'courses' => $courses,
      'privateLessons' => $privateLessons,
      ])
  @endcomponent
  <!-- End Modal -->



</div>

</x-layouts.app>
