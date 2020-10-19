@extends('master')
@section('main_content')
<section class="section-content bg-white padding-y">
   <div class="container">
      <div class="row">
         <aside class="col-md-2">
            <nav class="list-group">
               <p class="list-group-item" href="page-profile-main.html"><b>Categories</b></p>
               @foreach ($categories as $categorie)
               <a class="list-group-item" href="{{ url('shop/' . $categorie->url) }}">{{ $categorie->title }}</a>
               @endforeach
            </nav>
         </aside>
         <aside class="col-md-6">
            <div class="card">
               <article class="gallery-wrap">
                  <div class="img-big-wrap">
                     <div> <a href="#"><img class="img-fluid" src="{{asset('images/demo/' . $product->pimage)}}"></a></div>
                  </div>
               </article>
            </div>
         </aside>
         <main class="col-md-4">
            <article class="product-info-aside">
               <h2 class="title mt-3">{{ $product->ptitle }}</h2>
               <div class="mb-3"> 
                  <var class="price h4">${{ $product->price }}</var> 
               </div>
               <p>{!! $product->particle!!}</p>
               <div class="form-row  mt-4">
                  <div class="form-group col-md">
                     @if($product->in_stock > 0)
                     @if (!Cart::get($product->id))
                     <button data-pid="{{ $product->id }}"  class="btn btn-primary add-to-cart-btn"> 
                     <i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
                     </button>
                     @else
                     <button class="btn btn-success add-to-cart-btn" disabled="disabled">In Cart <i class="fas fa-check ml-2"></i></button>
                     @endif
                     @else
                     <button class="btn btn-primary add-to-cart-btn" disabled="disabled"> 
                     <i class="fas fa-shopping-cart"></i> <span class="text">Out of stock</span> 
                     </button>
                     @endif
                  </div>
               </div>
            </article>
         </main>
      </div>
   </div>
</section>
<section class="section-name padding-y bg">
   <div class="container">
   </div>
</section>
@endsection