@extends('layouts.layout')

@section('content')
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong></strong>
                </div>
                @endif
                    <div class="card card-default">
                        <div class="card-header">Payment Status</div>
                            <div class="card-body">
                                <p class="lead"></p>
                            </div>

                        <div class="card-footer">
                           
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection