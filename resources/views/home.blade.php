@extends('master')
@section('main_content')
<div class="container mt-4">
   <div class="container">
      <section class="section-main padding-y">
         <main class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-12">
                     <div id="carousel1_indicator" class="slider-home-banner carousel slide container-fluid" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                           <li data-target="#carousel1_indicator" data-slide-to="1"></li>
                           <li data-target="#carousel1_indicator" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <img src="{{asset('images/demo/banner1.JPG')}}" alt="First slide"> 
                           </div>
                           <div class="carousel-item">
                              <img src="{{asset('images/demo/banner2.JPG')}}" alt="Second slide">
                           </div>
                           <div class="carousel-item">
                              <img src="{{asset('images/demo/banner3.JPG')}}" alt="Third slide">
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </main>
      </section>
      <section  class="padding-bottom-sm">
         <header class="section-heading heading-line">
            <h4 class="title-section text-uppercase">Recommended items</h4>
         </header>
         <div class="row row-sm">
            <aside class="col-md-3">
               <nav class="list-group">
                  <p class="list-group-item" href="page-profile-main.html"><b>Categories</b></p>
                  @foreach ($categories as $categorie)
                  <a class="list-group-item" href="{{ url('shop/' . $categorie->url) }}">{{ $categorie->title }}</a>
                  @endforeach
                  <p class="list-group-item sidebar-rec mb-4"></p>
               </nav>
            </aside>
            @foreach ($recommendations as $recommendation)
            <div class="col-xl-3 col-lg-3 col-md-4 col-6">
               <div href="#" class=" rec card card-sm card-product-grid">
                  <a href="{{ url('shop/' . $recommendation->url . '/' .  $recommendation->purl) }}" class="img-wrap"> <img src="{{ asset('images/demo/' . $recommendation->pimage) }}"> </a>
                  <figcaption class="info-wrap">
                     <a href="{{ url('shop/' . $recommendation->url . '/' .  $recommendation->purl) }}" class="title">{{$recommendation->ptitle}}</a>
                     <div class="price mt-1">${{$recommendation->price}}</div>
                  </figcaption>
               </div>
            </div>
            @endforeach  
         </div>
      </section>
   </div>
</div>
@endsection