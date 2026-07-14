@extends('layouts.app')
@section('content')

<div class="topbar">Free shipping on all orders over $150 &nbsp;•&nbsp; Use code <strong>NOIR10</strong> for 10% off</div>


<div class="breadcrumb">
  <div class="container">
    <a href="{{ route('home')}}">Home</a><span class="sep">/</span><span class="current">Shop</span>
  </div>
</div>

<section class="page-banner">
  <h1>Shop All</h1>
  <p>Home / Shop</p>
</section>

<section class="section" style="padding-top:56px;">
  <div class="container">
    <div class="shop-layout">
      <aside class="filters-sidebar">
        <div class="filter-block">
          <h4>Category</h4>
          <div class="filter-list">
            <label><input type="radio" name="cat-filter" value="all" checked> All Products <span class="count">12</span></label>
            <label><input type="radio" name="cat-filter" value="Women"> Women <span class="count">4</span></label>
            <label><input type="radio" name="cat-filter" value="Men"> Men <span class="count">4</span></label>
            <label><input type="radio" name="cat-filter" value="Accessories"> Accessories <span class="count">4</span></label>
          </div>
        </div>
        <div class="filter-block price-range">
          <h4>Price</h4>
          <input type="range" id="price-range" min="40" max="350" value="350" step="10">
          <div class="price-range-labels">
            <span>$40</span>
            <span id="price-range-max">$350.00</span>
          </div>
        </div>
        <div class="filter-block">
          <h4>Color</h4>
          <div class="color-swatches">
            <button style="background:#0a0a0a" title="Black"></button>
            <button style="background:#ffffff;border-color:#a3a3a3" title="White"></button>
            <button style="background:#a3a3a3" title="Grey"></button>
          </div>
        </div>
      </aside>
      <div>
        <div class="shop-toolbar">
          <span class="result-count" id="result-count">Showing 12 of 12 products</span>
          <select id="sort-select">
            <option value="featured">Sort by: Featured</option>
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
            <option value="name">Name: A–Z</option>
          </select>
        </div>
        <div class="product-grid shop-grid" id="shop-grid"></div>
      </div>
    </div>
  </div>
</section>

@endsection

