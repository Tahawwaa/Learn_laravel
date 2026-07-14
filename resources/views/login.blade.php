@extends('layouts.app')
@section('content')



<div class="breadcrumb">
  <div class="container">
    <a href="{{ route('home')}}">Home</a><span class="sep">/</span><span class="current">Account</span>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="auth-wrap">
      <div class="auth-tabs">
        <button class="active" data-panel="panel-login">Sign In</button>
        <button data-panel="panel-register">Register</button>
      </div>

      <div class="auth-panel active" id="panel-login">
        <h2>Welcome Back</h2>
        <p>Sign in to access your orders, wishlist, and saved details.</p>
        <form>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" required placeholder="you@example.com">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" required placeholder="••••••••">
          </div>
          <div class="form-extra">
            <label><input type="checkbox"> Remember me</label>
            <a href="#">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>
        <div class="auth-divider">or continue with</div>
        <div class="social-auth">
          <button type="button">Google</button>
          <button type="button">Facebook</button>
        </div>
      </div>

      <div class="auth-panel" id="panel-register">
        <h2>Create an Account</h2>
        <p>Join NOIR for a faster checkout and personalised recommendations.</p>
        <form>
          <div class="form-row">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" required>
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" required placeholder="you@example.com">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" required placeholder="Minimum 8 characters">
          </div>
          <div class="form-extra">
            <label><input type="checkbox" required> I agree to the Terms &amp; Privacy Policy</label>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Create Account</button>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection