@extends('cms.cms_master')
@section('cms_content')

<div class="container">
    <form enctype="multipart/form-data" class="add-categorie-form" action="{{url('cms/recomp/')}}" method="POST" autocomplete="off" novalidate="novalidate">
            @csrf
       <h1>Recommended Products </h1> 

       <div class="form-group">
           <label for="product">Product</label>
           <select name="product" id="product" class="form-control">
            @foreach ($recommended_products as $product)
                <option id="product-drop" value={{$product->id}} selected="selected">{{$product->ptitle}}</option> 
            @endforeach
           </select>
           <span class="text-danger">{{$errors->first('product')}}</span>
       </div>

       <input type="submit" value="Add to Recommentations" name="submit" class="btn btn-primary mt-4 send-recommended">
          <a href="{{url('cms/dashboard')}}" class="btn btn-light mt-4">Cancel</a>
          <span class="text-danger">{{$errors->first('product')}}</span>
    </form>
</div>
@endsection