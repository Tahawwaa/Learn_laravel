@extends('layouts.app')
@section('content')

<div class="breadcrumb">
  <div class="container">
    <a href="{{ route('home') }}">Home</a><span class="sep">/</span><span class="current">Contact</span>
  </div>
</div>

<section class="page-banner">
  <h1>Get In Touch</h1>
  <p>Home / Contact</p>
</section>

<section class="section">
  <div class="container">
    <div class="contact-grid">
      <div>
        <span class="eyebrow" style="text-transform:uppercase; letter-spacing:0.2em; font-size:0.78rem; color:#737373;">Contact</span>
        <h2 style="font-family:'Playfair Display',serif; font-size:2rem; margin:12px 0 24px;">We'd Love to Hear From You</h2>

        <div class="contact-info-item">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8l9 6 9-6"/><rect x="3" y="5" width="18" height="14" rx="2"/></svg></div>
          <div>
            <h4>Email</h4>
            <p>support@noir-store.example</p>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.4 2.1L8.1 9.7a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.4c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.9 2.2Z"/></svg></div>
          <div>
            <h4>Phone</h4>
            <p>+1 (555) 234-5678</p>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg></div>
          <div>
            <h4>Studio Address</h4>
            <p>128 Monochrome Ave, Suite 4B, New York, NY 10001</p>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
          <div>
            <h4>Working Hours</h4>
            <p>Mon – Fri: 9:00 AM – 6:00 PM</p>
          </div>
        </div>

        <div class="map-block">Map placeholder</div>
      </div>

      <div>
        <form id="contact-form">
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
            <label>Subject</label>
            <input type="text" required>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea rows="6" required placeholder="Write your message..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Send Message</button>
          <p class="form-msg" id="contact-msg"></p>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection