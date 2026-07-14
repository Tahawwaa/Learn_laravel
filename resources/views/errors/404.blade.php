@extends('layouts.app')
@section('content')

<section class="page-banner">
  <h1>404</h1>
  <p>Error 404</p>
</section>

<section class="section">
  <div class="container" style="text-align:center; max-width:560px;">
    <span class="eyebrow" style="text-transform:uppercase; letter-spacing:0.2em; font-size:0.78rem; color:#737373; display:block; margin-bottom:10px;">Lost &amp; Found</span>
    <h2 style="font-family:'Playfair Display',serif; font-size:2rem; margin-bottom:16px;">This Page Doesn't Exist</h2>
    <p style="color:#525252; margin-bottom:32px;">The page you're looking for may have been moved, renamed, or never existed. Let's get you back on track.</p>
    <div class="hero-actions" style="justify-content:center;">
      <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
      <a href="{{ route('shop') }}" class="btn btn-outline">Continue Shopping</a>
    </div>
  </div>
</section>
@endsection
