@extends('cms.cms_master')
@section('cms_content')

<div class="container">
    <form enctype="multipart/form-data" class="add-categorie-form" action="{{url('cms/recom-category/')}}" method="POST" autocomplete="off" novalidate="novalidate">
            @csrf
       <h1>Choose Category</h1> 

       <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
            <option value="">Select Category...</option>
            @foreach ($categories as $category)
                 <option value="{{$category->id}}">{{$category->title}}</option> 
            @endforeach
        </select>
    </div>
       <input type="submit" value="Get Products" name="submit" class="btn btn-primary mt-4 send-recommended">
          <a href="{{url('cms/dashboard')}}" class="btn btn-light mt-4">Cancel</a>
          <span class="text-danger">{{$errors->first('category')}}</span>
    </form>
</div>
@endsection