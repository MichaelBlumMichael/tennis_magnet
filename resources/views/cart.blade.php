@extends('master')
@section('main_content')
<section class="section-content padding-y">
   <div class="container">
      <div class="row">
         <main class="col-md-9">
            <div class="card">
               @if(! Cart::isEmpty())
               <table class="table table-borderless table-shopping-cart">
                  <thead class="text-muted">
                     <tr class="small text-uppercase">
                        <th scope="col">Product</th>
                        <th scope="col" width="120">Quantity</th>
                        <th scope="col" width="120">Price</th>
                        <th scope="col" width="120">Sub-Total</th>
                        <th scope="col" class="text-right" width="200"> </th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($cart as $item)
                     <tr>
                        <td>
                           <figure class="itemside">
                              <div class="aside"><img src="{{asset('images/demo/' . $item['attributes']['image'])}}" class="img-sm"></div>
                              <figcaption class="info">
                                 <a href="#" class="  text-dark">{{ $item['name'] }}</a>
                              </figcaption>
                           </figure>
                        </td>
                        <td> 
                           <select data-pid="{{ $item['id'] }}" class="form-control product-quantity">
                           @for ($x = 1; $x < $max_product_quantity; $x++)   
                           <option @if($x == $item['quantity']) selected="selected" @endif value="{{ $x }}">{{ $x }}</option>
                           @endfor
                           </select>
                        </td>
                        <td>
                           <div class="price-wrap"> 
                              <var class="price">${{ $item['price'] }}</var> 
                           </div>
                        </td>
                        <td>
                           <div class="price-wrap"> 
                              <var class="price">${{ $item['quantity'] * $item['price'] }}</var> 
                           </div>
                        </td>
                        <td class="text-right"> 
                           <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
                           <a href="{{url('shop/cart?removeItem=' . $item['id'])}}" class="btn btn-light"> Remove</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <div class="card-body border-top">
                  <a href="{{ url('shop/clear-cart') }}" class="btn btn-light float-md-right"> Clear Cart <i class="fas fa-times"></i></a>
                  <a href="{{url('shop')}}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
               </div>
            </div>
            @else
            <p class="text-center display-4 p-4"><i>You do not have any items in cart...</i></p>
            <div class="card-body border-top">
               <a href="{{url('shop')}}" class="btn btn-primary"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
            </div>
            @endif
            <div class="alert alert-success mt-3">
               <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
            </div>
         </main>
         <aside class="col-md-3">
            <div class="card">
               <div class="card-body">
                  <dl class="dlist-align">
                     <dt>Total: </dt>
                     <dd class="text-right  h5"><strong>${{Cart::getTotal()}}</strong></dd>
                  </dl>
                  <hr>
                  <p class="text-center mb-3">
                     <img src="{{asset('images/misc/payments.png')}}" height="26">
                  </p>
                  <a href="{{ url('shop/checkout') }}" class="btn btn-primary d-flex justify-content-center"> Make Purchase </i> </a>
               </div>
            </div>
         </aside>
      </div>
   </div>
</section>
@endsection