@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Menu Link</h1>
  </div>
  
  
  <div class="row">
    <div class="col-lg-6">
    <form class="add-menu-form" action="{{url('cms/menu/'. $item->id)}}" method="POST" autocomplete="off" novalidate="novalidate">
        @csrf
        {{method_field('PUT')}}
    <input type="hidden" name="item_id" value="{{$item->id}}">
        <div class="form-group">
          <label for="page_name">* Page Name</label>
        <input value="{{$item->page_name}}" type="text" name="page_name" id="page_name" class="origin-field form-control">
        <span class="text-danger">{{$errors->first('page_name')}}</span>
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
          <label for="title">* Page Title</label>
          <input value="{{$item->title}}" type="text" name="title" id="title" class="form-control">
          <span class="text-danger">{{$errors->first('title')}}</span>
        </div>
        <input type="submit" value="Save Menu" name="submit" class="btn btn-primary">
      <a href="{{url('cms/menu')}}" class="btn btn-light ml-3">Cancel</a>
      </form>
    </div>
  </div>


@endsection