@extends('master')
@section('main_content')
<section class="section-content padding-y">
   <div class="container">
      <nav class="row">
         @if($categories->count())
         @foreach ($categories as $categorie)
         <div class="col-md-3">
            <div class="card card-category">
               <div class="img-wrap d-flex justify-content-center mt-3" style="background: #ffffff">
                  <img class="rounded category-image" src="{{asset('images/demo/'. $categorie->image)}}">
               </div>
               <div class="card-body">
                  <h4 class="card-title text-center"><a href="{{ url('shop/' . $categorie->url) }}">{{ $categorie->title }}</a></h4>
                  <ul class="list-menu text-center">
                     @foreach ($products as $product)
                     @if($product->categorie_id === $categorie->id)
                     <li>{{$product->ptitle}}</li>
                     @endif
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         @endforeach
         @else
         <div class="col-12 text-center mt-3">
            <p><i>No Categories Found</i></p>
         </div>
         @endif
      </nav>
   </div>
</section>
@endsection