@php
    $page_title = 'Tennis Magnet';
    $menu = App\Menu::all();
@endphp

@extends('master')
@section('main_content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="container">
                <div class="row text-center">
                  <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
                    <div class="row">
                      <div class="col-lg-8 col-12 col-sm-10 offset-lg-2 offset-sm-1">
                        <h1 class="m-0">404</h1>
                        <h6>OOPS... Page not found</h6>
                        <a href="{{ url('') }}">Click me, I'll walk you back home...</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
        </div>
           
        </div>
    </div>
</div>    
@endsection