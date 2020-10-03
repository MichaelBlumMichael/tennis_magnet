@extends('master')
@section('main_content')
<section class="section-content padding-y">
    <div class="container">
    <nav class="row">
        <aside class="col-md-3">
            <nav class="list-group">
                <p class="list-group-item" href="page-profile-main.html"><b>Categories</b></p>
                @foreach ($categories as $categorie)
                <a class="list-group-item" href="{{ url('shop/' . $categorie->url) }}">{{ $categorie->title }}</a>
                @endforeach
                <p class="list-group-item sidebar-category mb-4"></p>
            </nav>
        </aside>
        @foreach ($products as $product)
        <div class="col-md-3 d-flex">
            <div class=" d-flex align-items-stretch mb-4"> 
                <div class="card recprod">
                  <div class="img-wrap d-flex justify-content-center mt-3" style="background: #ffff">
                    <img src="{{ asset('images/demo/' . $product->pimage) }}" class="product-img card-img-top" alt="product-image">
                </div>
                  <div class="card-body">
                  <h4 class="card-title text-center">
                      <a href="{{ url('shop/' . $product->url . '/' .  $product->purl) }}">{{ $product->ptitle }}</a></h4>
                  <div class="card-body">
                    <p>{!! $product->particle !!}</p>
                    <p><b>Price: </b>${{ $product->price }}</p>
                    <p>
                    @if (!Cart::get($product->id))
                        <button data-pid="{{ $product->id }}" class="btn btn-success add-to-cart-btn">Add To Cart</button>
                    @else
                        <button class="btn btn-success add-to-cart-btn" disabled="disabled">In Cart</button>  
                    @endif
                    <a href="{{ url('shop/' . $product->url . '/' .  $product->purl) }}" class="btn btn-primary ml-2">More Details</a>
                    </p>
                </div>
                  </div>
                </div>
            </div>
        </div>
         @endforeach
        </nav> 
        </div> 
    </section>
@endsection