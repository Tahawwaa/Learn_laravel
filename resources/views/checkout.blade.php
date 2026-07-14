@extends('layouts.app')
@section('content')

<div class="breadcrumb">
  <div class="container">
    <a href="index.html">Home</a><span class="sep">/</span><a href="cart.html">Cart</a><span class="sep">/</span><span class="current">Checkout</span>
  </div>
</div>

<section class="section">
  <div class="container">

    <div class="checkout-steps">
      <div class="active"><span>1</span> Cart</div>
      <div class="active"><span>2</span> Checkout</div>
      <div><span>3</span> Confirmation</div>
    </div>

    <div id="checkout-form-wrap">
      <div class="checkout-layout">
        <form id="checkout-form">
          <div class="form-section">
            <h3>Contact Information</h3>
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" required placeholder="you@example.com">
            </div>
          </div>

          <div class="form-section">
            <h3>Shipping Address</h3>
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
              <label>Street Address</label>
              <input type="text" required placeholder="123 Main Street">
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>City</label>
                <input type="text" required>
              </div>
              <div class="form-group">
                <label>Postal Code</label>
                <input type="text" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Country</label>
                <select required>
                  <option value="">Select country</option>
                  <option>United States</option>
                  <option>United Kingdom</option>
                  <option>Canada</option>
                  <option>Germany</option>
                  <option>Iran</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="tel" required>
              </div>
            </div>
          </div>

          <div class="form-section">
            <h3>Payment Method</h3>
            <div class="pay-methods">
              <label class="pay-method active">
                <input type="radio" name="pay" checked>
                <span>Credit / Debit Card</span>
              </label>
              <label class="pay-method">
                <input type="radio" name="pay">
                <span>PayPal</span>
              </label>
              <label class="pay-method">
                <input type="radio" name="pay">
                <span>Cash on Delivery</span>
              </label>
            </div>
            <div class="form-row" style="margin-top:18px;">
              <div class="form-group">
                <label>Card Number</label>
                <input type="text" placeholder="0000 0000 0000 0000">
              </div>
              <div class="form-group">
                <label>Name on Card</label>
                <input type="text">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Expiry Date</label>
                <input type="text" placeholder="MM / YY">
              </div>
              <div class="form-group">
                <label>CVV</label>
                <input type="text" placeholder="123">
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Place Order</button>
        </form>

        <div class="order-review">
          <h3>Order Summary</h3>
          <div id="checkout-order-lines"></div>
          <div class="summary-row" style="margin-top:20px;"><span>Subtotal</span><span id="co-subtotal">$0.00</span></div>
          <div class="summary-row"><span>Shipping</span><span id="co-shipping">Free</span></div>
          <div class="summary-row"><span>Tax</span><span id="co-tax">$0.00</span></div>
          <div class="summary-row total"><span>Total</span><span id="co-total">$0.00</span></div>
        </div>
      </div>
    </div>

    <div id="order-success" style="display:none; text-align:center; padding:60px 24px; max-width:520px; margin:0 auto;">
      <svg viewBox="0 0 24 24" width="64" height="64" style="margin:0 auto 24px; stroke:#0a0a0a; fill:none; stroke-width:1.4;"><circle cx="12" cy="12" r="10"/><path d="m8 12 3 3 5-6"/></svg>
      <h2 style="font-family:'Playfair Display',serif; font-size:1.8rem; margin-bottom:12px;">Thank You for Your Order</h2>
      <p style="color:#737373; margin-bottom:28px;">Your order has been placed successfully. A confirmation email will be sent to you shortly.</p>
      <a href="shop.html" class="btn btn-primary">Continue Shopping</a>
    </div>

  </div>
</section>

@endsection