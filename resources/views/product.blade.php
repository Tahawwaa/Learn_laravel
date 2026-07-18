@extends('layouts.app')
@section('content')

<div class="breadcrumb">
  <div class="container">
    <a href="index.html">Home</a><span class="sep">/</span><a href="shop.html">Shop</a><span class="sep">/</span><span class="current" id="pd-breadcrumb-name">Product</span>
  </div>
</div>

<section class="section" id="product-detail">
  <div class="container">
    <div class="product-detail">
      <div class="gallery">
        <div class="gallery-main" id="gallery-main"></div>
        <div class="gallery-thumbs" id="gallery-thumbs"></div>
      </div>
      <div class="product-info-panel">
        <span class="pd-cat" id="pd-cat"></span>
        <h1 class="pd-title" id="pd-title"></h1>
        <div class="pd-rating">
          <span class="stars" id="pd-stars"></span>
          <span id="pd-rating-count"></span>
        </div>
        <div class="pd-price" id="pd-price"></div>
        <p class="pd-desc" id="pd-desc"></p>

        <div class="option-block">
          <label>Select Size</label>
          <div class="size-options" id="size-options"></div>
        </div>

        <div class="option-block">
          <label>Quantity</label>
          <div class="qty-row">
            <div class="qty-selector">
              <button type="button" id="qty-minus">−</button>
              <input type="text" id="pd-qty" value="1" readonly>
              <button type="button" id="qty-plus">+</button>
            </div>
          </div>
        </div>

        <div class="pd-actions">
          <button class="btn btn-primary btn-block" id="pd-add-cart">Add to Cart</button>
          <button class="wishlist-btn" title="Add to wishlist">
            <svg viewBox="0 0 24 24" stroke-width="1.5"><path d="M12 21s-7.5-4.6-10-9.3C.5 8 2.3 4.5 6 4a5.4 5.4 0 0 1 6 3 5.4 5.4 0 0 1 6-3c3.7.5 5.5 4 4 7.7C19.5 16.4 12 21 12 21Z"/></svg>
          </button>
        </div>

        <div class="pd-meta">
          <div><strong>SKU:</strong> <span id="pd-sku"></span></div>
          <div><strong>Availability:</strong> In Stock</div>
          <div><strong>Shipping:</strong> Free shipping on orders over $150</div>
        </div>
      </div>
    </div>

    <div class="pd-tabs">
      <button class="active" data-tab="tab-description">Description</button>
      <button data-tab="tab-details">Details &amp; Care</button>
      <button data-tab="tab-reviews">Reviews</button>
    </div>
    <div class="tab-panel active" id="tab-description">
      <p id="pd-desc-full"></p>
    </div>
    <div class="tab-panel" id="tab-details">
      <ul>
        <li>Made from premium, responsibly sourced materials</li>
        <li>Designed and finished with meticulous attention to detail</li>
        <li>Machine wash cold, lay flat to dry</li>
        <li>Do not bleach, iron on low heat if needed</li>
        <li>Model is 5'10" and wears size M</li>
      </ul>
    </div>
    <div class="tab-panel" id="tab-reviews">
      <div class="review-item">
        <span class="stars">★★★★★</span>
        <span class="rev-name">Amelia H.</span><span class="rev-date">March 2, 2026</span>
        <p>Excellent quality and fits exactly as expected. Will definitely be ordering more monochrome pieces.</p>
      </div>
      <div class="review-item">
        <span class="stars">★★★★☆</span>
        <span class="rev-name">Daniel R.</span><span class="rev-date">February 14, 2026</span>
        <p>Great fabric and construction. Runs slightly large so I'd size down if you're in between sizes.</p>
      </div>
      <div class="review-item">
        <span class="stars">★★★★★</span>
        <span class="rev-name">Sara K.</span><span class="rev-date">January 28, 2026</span>
        <p>Exactly the minimalist aesthetic I was looking for. Packaging was lovely too.</p>
      </div>
    </div>
  </div>
</section>

<section class="section" style="padding-top:0;">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">You May Also Like</span>
      <h2>Related Products</h2>
    </div>
    <div class="product-grid" id="related-products"></div>
  </div>
</section>


@endsection