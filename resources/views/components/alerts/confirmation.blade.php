@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <ul>
      @foreach ($errors->all() as $error)
          <p>Please fill in all fields.</p>
      @endforeach
  </ul>
</div>
@endif