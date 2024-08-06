@extends('layouts.students.layout')

@section('title')
{{ $teacher->name }} | The Weaver School
@endsection

@section('meta')
{{ $teacher->name }} in Rotterdam at The Weaver School
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center">Book Your First Lesson</h1>
      <p class="text-center">You and your teacher will set up an ongoing lesson schedule during your first lesson.</p>

    </div>
  </div>
</div>
@endsection


 {{-- <div>
      <!-- Calendly inline widget begin -->
      <div class="calendly-inline-widget" data-url="{{ $teacher->calendly_link }}?hide_gdpr_banner=1" style="min-width:320px; max-height:630px; margin-top: 0px; padding-top: 0px;"></div>
      <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
      <!-- Calendly inline widget end -->
      </div> --}}
