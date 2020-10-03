@extends('master')
@section('main_content')
<section class="section-conten padding-y" style="min-height:84vh">
   <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
         <h4 class="card-title mb-4">Log in</h4>
         <form action="" method="POST" novalidate="novalidate" autocomplete="off">
            @csrf
            <div class="form-group">
               <input class="form-control" name="email" id="email" placeholder="Email" type="email">
               <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
               <input class="form-control" name="password" id="password" placeholder="Password" type="password">
               <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
            <div class="form-group">
               <label class="float-left custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" checked=""> 
               </label>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block"> Login  </button>
            </div>
         </form>
      </div>
   </div>
   <p class="text-center mt-4">Don't have account? <a href="{{url('user/signup')}}">Sign up</a></p>
   <br><br>
</section>
@endsection