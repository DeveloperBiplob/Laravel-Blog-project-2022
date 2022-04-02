@extends('Frontend.Layouts.app')
@section('title', 'Blog Project 2022| Login')
@section('app-content')
<section class="intro" style="background: #e9ecef">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4" style="background: #fff; padding:20px; margin-top:50px">
                <h2 class="h3 text-center" style="padding: 20px 0">User Login</h2>
                <form action="{{ route('login.user') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" name="password" placeholder="Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row">
                      <div class="col-8">
                        <div class="icheck-primary">
                          <input type="checkbox" id="remember">
                          <label for="remember">
                            Remember Me
                          </label>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>

                  <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                      <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                      <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                  </div>
                  <!-- /.social-auth-links -->

                  <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                  </p>
                  <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                  </p>
            </div>
        </div>
    </div>
</section>
@endsection
