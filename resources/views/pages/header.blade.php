<header class="site-header">
  <div class="container header-inner">
    <a href="{{ route('home')}}" class="logo">NOIR<span>.</span></a>
    <nav class="main-nav">
      <a href="{{ route('home')}}">Home</a>
      <a href="{{ route('shop')}}">Shop</a>
      <a href="{{ route('about')}}">About</a>
      <a href="{{ route('contact')}}">Contact</a>
    </nav>
    <div class="header-icons">
      <a href="{{ route('login')}}" class="icon-btn" title="Account">
        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </a>
      <a href="{{ route('cart')}}" class="icon-btn" title="Cart">
        <svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
        <span class="cart-count">0</span>
      </a>
      <button class="nav-toggle" aria-label="Menu"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
