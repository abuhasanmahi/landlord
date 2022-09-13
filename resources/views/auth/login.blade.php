@extends('layouts.auth')
 
@section('content')
    
    <div class="register-logo">
        <b>Login</b>
    </div>
 
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Login</p>
            @if(session('status'))
                <div class="btn btn-danger">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
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
                <div class="row">
                    <div class="col-4">
                        
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            <a href="{{ route('register') }}" class="text-center">Not registered yet? Register Now!</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
@endsection