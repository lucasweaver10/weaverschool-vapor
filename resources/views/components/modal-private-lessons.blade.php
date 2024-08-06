<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/contact') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="name" name="firstName" value="{{ old('firstName') }}" class="form-control" id="firstName" placeholder="First name">
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
             <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Phone Number">
            </div>
            <div class="form-group">
              <input type="text" id="message" name="message" hidden value="No message (submitted from course page)">
            </div>
            <div class="form-group">
              <input type="text" id="course" name="course" hidden value="">
            </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
          </form>
        </div>

      </div>
    </div>
  </div>