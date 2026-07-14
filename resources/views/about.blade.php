@extends('layouts.app')
@section('content')





<div class="breadcrumb">
  <div class="container">
    <a href="{{ route('home')}}">Home</a><span class="sep">/</span><span class="current">About</span>
  </div>
</div>

<section class="page-banner">
  <h1>Our Story</h1>
  <p>Home / About</p>
</section>

<section class="section">
  <div class="container">
    <div class="about-grid">
      <div class="visual" id="about-visual"></div>
      <div>
        <span class="eyebrow" style="text-transform:uppercase; letter-spacing:0.2em; font-size:0.78rem; color:#737373;">Since 2016</span>
        <h2 style="font-family:'Playfair Display',serif; font-size:2.2rem; margin:14px 0 18px;">Designed for a Quieter Wardrobe</h2>
        <p style="color:#525252; margin-bottom:16px;">NOIR was founded on a simple idea: that great style doesn't need to shout. We design considered, timeless pieces in a restrained monochrome palette — built to be worn on repeat, season after season.</p>
        <p style="color:#525252; margin-bottom:28px;">Every garment is developed in small batches with quality-first fabrics and finished by hand. We believe in buying less, choosing well, and making it last.</p>
        <a href="shop.html" class="btn btn-primary">Shop the Collection</a>
      </div>
    </div>
  </div>
</section>

<section class="stats-row">
  <div class="stat"><div class="num">2016</div><div class="label">Founded</div></div>
  <div class="stat"><div class="num">40k+</div><div class="label">Happy Customers</div></div>
  <div class="stat"><div class="num">120+</div><div class="label">Curated Products</div></div>
  <div class="stat"><div class="num">15</div><div class="label">Countries Shipped</div></div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">What We Stand For</span>
      <h2>Our Values</h2>
    </div>
    <div class="features" style="border:none;">
      <div class="feature" style="border-left:1px solid #e5e5e5;">
        <svg viewBox="0 0 24 24" stroke-width="1.4"><path d="M12 2 4 6v6c0 5 3.4 8.7 8 10 4.6-1.3 8-5 8-10V6l-8-4Z"/></svg>
        <h4>Quality First</h4>
        <p>Premium materials, built to last beyond a single season.</p>
      </div>
      <div class="feature">
        <svg viewBox="0 0 24 24" stroke-width="1.4"><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/></svg>
        <h4>Considered Design</h4>
        <p>Every piece is designed to mix, match, and outlast trends.</p>
      </div>
      <div class="feature">
        <svg viewBox="0 0 24 24" stroke-width="1.4"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        <h4>Community Driven</h4>
        <p>Built with feedback from the people who wear our pieces daily.</p>
      </div>
      <div class="feature">
        <svg viewBox="0 0 24 24" stroke-width="1.4"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1v-6h3Z"/><path d="M3 19a2 2 0 0 0 2 2h1v-6H3Z"/></svg>
        <h4>Responsible Sourcing</h4>
        <p>Working with mills and makers who share our standards.</p>
      </div>
    </div>
  </div>
</section>


@push('scripts')
<script>
  document.getElementById('hero-visual').innerHTML = productSVG('hero', 'NOIR');
</script>
@endpush

@endsection
