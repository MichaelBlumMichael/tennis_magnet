@extends('cms.cms_master')
@section('cms_content')

<div class="row">
  <div class="col-lg-6">
  <form enctype="multipart/form-data" class="add-categorie-form" action="{{url('cms/categories/'. $item->id)}}" method="POST" autocomplete="off" novalidate="novalidate">
      @csrf
      {{method_field('PUT')}}
      <input type="hidden" name="item_id" value="{{$item->id}}">
      <div class="form-group">
        <label for="title">* Categoriy Title</label>
      <input value="{{$item->title}}" type="text" name="title" id="title" class="origin-field form-control">
      <span class="text-danger">{{$errors->first('title')}}</span>
      </div>
      <div class="form-group">
        <label for="url">
          * Url
          <small><i>(Friendly url - lowercase, numbers, '-')</i></small>
        </label>
        <input value="{{$item->url}}" type="text" name="url" id="url" class="target-field form-control">
        <span class="text-danger">{{$errors->first('url')}}</span>
      </div>
      <div class="form-group">
        <label for="article">* Category Description</label>
      <textarea id="summernote" class="form-control" name="description" id="article" cols="30" rows="10">{{$item->description}}</textarea>
        <span class="text-danger">{{$errors->first('description')}}</span>
      </div>
      <div class="form-group">
      <img class="img-thumbnail" width="100" src="{{asset('images/demo/'). $item->image}}" alt="">
      </div>
      <div class="form-group">
        <label for="image">Change Category Picture
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
      <input type="submit" value="Update Category" name="submit" class="btn btn-primary">
    <a href="{{url('cms/categories')}}" class="btn btn-light ml-3">Cancel</a>
    </form>
  </div>
</div>

@endsection