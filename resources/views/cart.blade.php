@extends('layouts.app')
@section('content')

<div class="breadcrumb">
  <div class="container">
    <a href="index.html">Home</a><span class="sep">/</span><span class="current">Shopping Cart</span>
  </div>
</div>

<section class="page-banner">
  <h1>Your Cart</h1>
  <p>Home / Cart</p>
</section>

<section class="section" style="padding-top:56px;">
  <div class="container">

    <div class="cart-empty" id="cart-empty" style="display:none;">
      <svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
      <h3>Your cart is empty</h3>
      <p>Looks like you haven't added anything yet. Start exploring our collection.</p>
      <a href="shop.html" class="btn btn-primary">Continue Shopping</a>
    </div>

    <div class="cart-layout" id="cart-filled">
      <div>
        <table class="cart-table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="cart-body"></tbody>
        </table>

        <div class="coupon-row">
          <input type="text" placeholder="Coupon code">
          <button class="btn btn-outline btn-sm" onclick="showToast('Coupon applied')">Apply</button>
        </div>

        <div class="cart-toolbar">
          <a href="shop.html" class="btn btn-outline">Continue Shopping</a>
        </div>
      </div>

      <div class="summary-box" id="cart-summary">
        <h3>Order Summary</h3>
        <div class="summary-row"><span>Subtotal</span><span id="sum-subtotal">$0.00</span></div>
        <div class="summary-row"><span>Shipping</span><span id="sum-shipping">Free</span></div>
        <div class="summary-row"><span>Tax</span><span id="sum-tax">$0.00</span></div>
        <div class="summary-row total"><span>Total</span><span id="sum-total">$0.00</span></div>
        <a href="checkout.html" class="btn btn-primary btn-block">Proceed to Checkout</a>
      </div>
    </div>

  </div>
</section>


<script src="js/products.js"></script>
<script src="js/cart.js"></script>
<script src="js/main.js"></script>
</body>
</html>

@endsection