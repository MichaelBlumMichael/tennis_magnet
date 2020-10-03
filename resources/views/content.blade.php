@extends('master')
@section('main_content')
<div class="container mt-4">
  @foreach ($contents as $content)
    <div class="row">
        <div class="col-lg-4 mt-4">
        <h2>{{ $content->ctitle }}</h2>
        <p>{!! $content->carticle !!}</p>
        </div>
    </div>
  @endforeach
</div>    
@endsection