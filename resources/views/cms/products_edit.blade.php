@extends('cms.cms_master')
@section('cms_content')



<div class="row">
  <div class="col-lg-6">
    <form enctype="multipart/form-data" class="add-product-form" action="{{url('cms/products/'. $item->id)}}" method="POST" autocomplete="off" novalidate="novalidate">
      @csrf
      {{method_field('PUT')}}
      <input type="hidden" name="item_id" value="{{$item->id}}">
      <div class="form-group">
        <label for="categorie-id">* Product Category</label>
        <select class="form-control" name="category" id="categorie-id">
          @foreach($categories as $categorie)
        <option @if($categorie->id == $item->categorie_id) selected="selected" @endif 
          value="{{$categorie->id}}">{{$categorie->title}}</option>
          @endforeach
        </select>
        <span class="text-danger">{{$errors->first('category')}}</span>
      </div>
      <div class="form-group">
        <label for="title">* Product Title</label>
      <input value="{{$item->ptitle}}" type="text" name="title" id="title" class="origin-field form-control">
      <span class="text-danger">{{$errors->first('title')}}</span>
      </div>
      <div class="form-group">
        <label for="url">
          * Url
          <small><i>(Friendly url - lowercase, numbers, '-')</i></small>
        </label>
        <input value="{{$item->purl}}" type="text" name="url" id="url" class="target-field form-control">
        <span class="text-danger">{{$errors->first('url')}}</span>
      </div>
      <div class="form-group">
        <label for="url">
          * Quantity
        </label>
        <select class="form-control" name="quantity">
          @for($x = 0; $x < 200; $x++)
          <option @if($x == $item->in_stock) selected="selected" @endif
             value="{{$x}}">{{$x}}</option>
          @endfor 
      </select>
      </div>
      <div class="form-group">
        <label for="title">* Product Price</label>
      <input value="{{$item->price}}" type="text" name="price" id="price" class="form-control">
      <span class="text-danger">{{$errors->first('price')}}</span>
      </div>
      <div class="form-group">
        <label for="article">* Product Description</label>
      <textarea id="summernote" class="form-control" name="description" id="article" cols="30" rows="10">{{$item->particle}}</textarea>
        <span class="text-danger">{{$errors->first('description')}}</span>
      </div>
      <div class="form-group">
            <img class="img-thumbnail" width="50" src="{{ asset('images/demo/' . $item->pimage) }}" alt="">
        </div>
      <div class="form-group">
        <label for="image">Change Product Picture
          <small><i>(Optional):</i></small>
        </label>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input name="image" type="file" class="image-upload custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
      <div class="form-group">
        <span class="text-danger">{{$errors->first('image')}}</span>
      </div>
      <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
    <a href="{{url('cms/products')}}" class="btn btn-light ml-3">Cancel</a>
    </form>
  </div>
</div>

@endsection