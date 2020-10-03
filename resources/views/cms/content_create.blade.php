@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Add  New Content</h1>
  </div>

  <div class="row">
    <div class="col-lg-6">
    <form class="add-content-form" action="{{url('cms/content')}}" method="POST" autocomplete="off" novalidate="novalidate">
        @csrf
        <div class="form-group">
          <label for="menu">* Menu Page</label>
          <select name="menu" id="menu" class="form-control">
            <option value="">Choose Menu Page</option>
            @foreach ($menu as $menu_item)
            <option @if(old('menu') == $menu_item->id) selected="selected" @endif 
              value="{{$menu_item->id}}">{{$menu_item->page_name}}
            </option>
            @endforeach
          </select>
          <span class="text-danger">{{$errors->first('menu')}}</span>
        </div>
        <div class="form-group">
          <label for="title">* Content Title</label>
          <input value="{{old('title')}}" type="text" name="title" id="title" class="form-control">
          <span class="text-danger">{{$errors->first('title')}}</span>
        </div>
        <div class="form-group">
          <label for="article">* Content Article</label>
        <textarea class="form-control" name="article" id="summernote" cols="30" rows="10">{{old('article')}}</textarea>
          <span class="text-danger">{{$errors->first('article')}}</span>
        </div>
        <input type="submit" value="Save Content" name="submit" class="btn btn-primary">
      <a href="{{url('cms/content')}}" class="btn btn-light ml-3">Cancel</a>
      </form>
    </div>
  </div>


@endsection