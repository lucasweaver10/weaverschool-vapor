@extends('layouts.shop-layout')

@section('title')
        Available English Courses
@endsection

@section('content')

<div class="container-fluid bg-dark">
        <div class="row justify-content-center pb-5">
                <div class="card-deck">
@foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card" style="width: 24rem; margin-top: 2rem;">
                                                <img src="https://weaverenglish.nl/wp-content/uploads/2018/07/general-english-course.png" class="card-img-top" alt="The Weaver School general english course in rotterdam">
                                  <div class="card-body">
                                                <h4 class="card-title">{{$product['name']}}</h4>
                                                <p class="card-text">12-week evening course.</p>
                                        <div class="form-group">
                                                <label for="generalCoursePurchase">Choose your subscription:</label>
                                                <select class="form-control" id="generalCoursePurchase">
                                                        <option>Unlimited VIP Pass: €{{$product['price']}}</option>
                                                        <option>Season Pass: €{{$product['price']}}</option>
                                                        <option>One Month Access: €{{$product['price']}}</option>
                                                        <option>One Lesson Access: €{{$product['price']}}</option>
                                                </select>
                                        </div>
                                        <form action="{{ route('product.addToCart', ['id' => $product->id]) }}">
                                                <button class="btn btn-primary" @click.prevent="subscribe">ADD TO CART</button>
                                        </form>
                                  </div>
                              </div>
                        </div>
@endforeach
                </div>
        </div>
</div>
@endsection
