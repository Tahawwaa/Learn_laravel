@extends('layouts.app')
@section('content')




<section class="hero">
  <div class="hero-text">
    <span class="eyebrow">New Season — 2026</span>
    <h1>Timeless Style,<br>Monochrome Soul.</h1>
    <p>Considered essentials cut from quality fabric. A quieter wardrobe built to outlast trends — in black, white, and every shade between.</p>
    <div class="hero-actions">
      <a href="shop.html" class="btn btn-primary">Shop Collection</a>
      <a href="about.html" class="btn btn-outline">Our Story</a>
    </div>
  </div>
  <div class="hero-visual" id="hero-visual"></div>
</section>

<section class="categories">
  <a href="shop.html" class="category-card">
    <svg class="cat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M6 4 3 8v11a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V8l-3-4"/><path d="M9 4h6"/><path d="M9 4a3 3 0 0 0 6 0"/></svg>
    <h3>Women</h3>
    <span>48 Products</span>
  </a>
  <a href="shop.html" class="category-card">
    <svg class="cat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M16 4h-2a2 2 0 0 1-4 0H8L4 8l2 3 2-1v9a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-9l2 1 2-3-4-4Z"/></svg>
    <h3>Men</h3>
    <span>36 Products</span>
  </a>
  <a href="shop.html" class="category-card">
    <svg class="cat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M20 7h-3V6a4 4 0 0 0-8 0v1H6a1 1 0 0 0-1 1l1 12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1l1-12a1 1 0 0 0-1-1Z"/><path d="M9 11V7a3 3 0 0 1 6 0v4"/></svg>
    <h3>Accessories</h3>
    <span>24 Products</span>
  </a>
  <a href="shop.html" class="category-card">
    <svg class="cat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 2 4 6v6c0 5 3.4 8.7 8 10 4.6-1.3 8-5 8-10V6l-8-4Z"/></svg>
    <h3>New In</h3>
    <span>18 Products</span>
  </a>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Curated Edit</span>
      <h2>Featured Products</h2>
      <p>A hand-picked selection of our most-loved pieces this season.</p>
    </div>
    <div class="product-grid" id="featured-products"></div>
    <div class="text-center mt-lg">
      <a href="shop.html" class="btn btn-outline">View All Products</a>
    </div>
  </div>
</section>

<section class="promo-banner">
  <div class="promo-text">
    <span class="eyebrow">Limited Edition</span>
    <h2>The Monochrome Capsule</h2>
    <p>Twelve interchangeable pieces designed to mix, match, and last well beyond a single season.</p>
    <a href="shop.html" class="btn btn-outline">Explore the Capsule</a>
  </div>
  <div class="promo-visual"></div>
</section>

<section class="features">
  <div class="feature">
    <svg viewBox="0 0 24 24" stroke-width="1.4"><path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="7" cy="19" r="1.6"/><circle cx="18" cy="19" r="1.6"/></svg>
    <h4>Free Shipping</h4>
    <p>On all orders over $150</p>
  </div>
  <div class="feature">
    <svg viewBox="0 0 24 24" stroke-width="1.4"><path d="M12 2 4 6v6c0 5 3.4 8.7 8 10 4.6-1.3 8-5 8-10V6l-8-4Z"/><path d="m9 12 2 2 4-4"/></svg>
    <h4>Secure Payment</h4>
    <p>100% protected checkout</p>
  </div>
  <div class="feature">
    <svg viewBox="0 0 24 24" stroke-width="1.4"><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/></svg>
    <h4>Easy Returns</h4>
    <p>30-day return policy</p>
  </div>
  <div class="feature">
    <svg viewBox="0 0 24 24" stroke-width="1.4"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1v-6h3Z"/><path d="M3 19a2 2 0 0 0 2 2h1v-6H3Z"/></svg>
    <h4>24/7 Support</h4>
    <p>Dedicated customer care</p>
  </div>
</section>

<section class="newsletter">
  <h2>Join the List</h2>
  <p>Be the first to hear about new arrivals, restocks, and private sales.</p>
  <form class="newsletter-form" id="newsletter-form">
    <input type="email" placeholder="Enter your email address" required>
    <button type="submit">Subscribe</button>
  </form>
  <p class="form-msg" id="newsletter-msg"></p>
</section>



@push('scripts')
<script>
  document.getElementById('hero-visual').innerHTML = productSVG('hero', 'NOIR');
</script>
@endpush

@endsection
