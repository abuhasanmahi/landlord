@extends('layouts.auth')
 
@section('content')
    
<div class="register-logo">
    <b>Landlord Registration</b>
  </div>
 
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
 
      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" placeholder="Full name" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text @error('name') border-danger @enderror">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('name')
            <div style="color:red">
                {{$message}}
            </div>
            <br>
        @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control @error('email') border-danger @enderror" placeholder="Email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text @error('email') border-danger @enderror">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <div style="color:red">
                {{$message}}
            </div>
            <br>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control @error('password') border-danger @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text @error('password') border-danger @enderror">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <div style="color:red">
                {{$message}}
            </div>
            <br>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!--<input type="checkbox" id="agreeTerms" name="terms" value="agree">-->
              <label for="agreeTerms">
               It's free!
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
 
      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  @endsection