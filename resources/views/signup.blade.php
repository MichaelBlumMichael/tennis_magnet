@extends('master')
@section('main_content')
    <section class="section-content padding-y">
        <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
          <article class="card-body">
            <header class="mb-4"><h4 class="card-title">Sign up</h4></header>
            <form action="" method="POST" novalidate="novalidate" autocomplete="off">
              @csrf
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Name</label>
                              <input type="text" name="name" id="name" class="form-control" placeholder="">
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div> 
                    </div> 
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-4">
                            <label>Create password</label>
                            <input class="form-control" name="password" id="password" type="password">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div> 
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
                    </div>      
                </form>
            </article>
        </div> 
        <p class="text-center mt-4">Have an account? <a href="{{url('user/login')}}">Log In</a></p>
        <br><br>
    </section>
    @endsection