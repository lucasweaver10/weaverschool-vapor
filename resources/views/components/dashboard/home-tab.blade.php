<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="row justify-content-center text-center">
  <div class="card" style="min-width: 22rem;">
    <div class="card-header">
      <h4 class="card-title mb-0">Welcome back, {{ Auth::user()->name }}!</h4>
    </div>
      <div class="card-body">
        {{-- <p class="text-left">Your to-do list:</p> 
        @if (count($registrations) == 0)
        <div class="form-check">                                               
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
            Register for your course
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
            <label class="form-check-label" for="defaultCheck2">
            Pay for your course
            </label>
        
  </div>
        
        @else 
        @foreach($registrations as $registration) 
        <div class="form-check">                                               
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
              <label class="form-check-label" for="defaultCheck1">
                <strike>Register for your course</strike>
              </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" @if(  $registration->outstanding_balance == 0.00 ) checked>
              <label class="form-check-label" for="defaultCheck2">
                <strike>Pay for your course</strike>
              </label>
              @else 
              <label class="form-check-label" for="defaultCheck2">
                Pay for your course
              </label>
              @endif
          </div>
          @endforeach
          @endif --}}

        </div>
      </div>
    </div> 
</div>
