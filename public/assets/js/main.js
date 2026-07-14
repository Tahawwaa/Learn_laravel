/* =========================================================
   Site behaviour: nav, product rendering, cart/checkout pages,
   product detail, auth tabs, forms
   ========================================================= */

document.addEventListener('DOMContentLoaded', () => {
  initNavToggle();
  renderFeaturedProducts();
  renderShopGrid();
  renderRelatedProducts();
  initProductDetail();
  renderCartPage();
  renderCheckoutSummary();
  initAuthTabs();
  initFakeForms();
  initYear();
});

/* ---------- Mobile nav ---------- */
function initNavToggle() {
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.main-nav');
  if (!toggle || !nav) return;
  toggle.addEventListener('click', () => {
    const open = nav.style.display === 'flex';
    nav.style.display = open ? 'none' : 'flex';
    nav.style.cssText += open ? '' : 'position:absolute;top:84px;left:0;right:0;background:#fff;flex-direction:column;padding:20px 24px;gap:18px;border-bottom:1px solid #e5e5e5;';
  });
}

/* ---------- Product card builder ---------- */
function buildProductCard(p) {
  const img = svgDataUri('p' + p.id, p.name);
  const priceHtml = p.oldPrice
    ? `<span class="old">${formatPrice(p.oldPrice)}</span>${formatPrice(p.price)}`
    : formatPrice(p.price);
  return `
  <div class="product-card" data-id="${p.id}">
    <div class="product-thumb">
      <div class="product-badges">
        ${p.badge ? `<span class="badge ${p.badge === 'Sale' ? 'sale' : ''}">${p.badge}</span>` : ''}
      </div>
      <a href="product.html?id=${p.id}"><img src="${img}" alt="${p.name}"></a>
      <div class="product-quick">
        <button class="qa-add" data-id="${p.id}">Add to Cart</button>
        <button onclick="location.href='product.html?id=${p.id}'">View</button>
      </div>
    </div>
    <div class="product-info">
      <span class="product-cat">${p.category}</span>
      <h3><a href="product.html?id=${p.id}">${p.name}</a></h3>
      <div class="price">${priceHtml}</div>
    </div>
  </div>`;
}

function attachQuickAdd(container) {
  container.querySelectorAll('.qa-add').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const p = findProduct(btn.dataset.id);
      addToCart(p.id, p.sizes[0], 1);
    });
  });
}

/* ---------- Home: featured products ---------- */
function renderFeaturedProducts() {
  const el = document.getElementById('featured-products');
  if (!el) return;
  const featured = PRODUCTS.slice(0, 8);
  el.innerHTML = featured.map(buildProductCard).join('');
  attachQuickAdd(el);
}

/* ---------- Shop page grid with filters ---------- */
function renderShopGrid() {
  const el = document.getElementById('shop-grid');
  if (!el) return;

  const state = { category: 'all', sort: 'featured', max: 350 };

  function apply() {
    let list = PRODUCTS.filter(p => state.category === 'all' || p.category === state.category);
    list = list.filter(p => p.price <= state.max);
    if (state.sort === 'price-asc') list = list.slice().sort((a, b) => a.price - b.price);
    if (state.sort === 'price-desc') list = list.slice().sort((a, b) => b.price - a.price);
    if (state.sort === 'name') list = list.slice().sort((a, b) => a.name.localeCompare(b.name));
    el.innerHTML = list.length
      ? list.map(buildProductCard).join('')
      : '<p class="empty-state">No products match the selected filters.</p>';
    attachQuickAdd(el);
    const countEl = document.getElementById('result-count');
    if (countEl) countEl.textContent = `Showing ${list.length} of ${PRODUCTS.length} products`;
  }

  document.querySelectorAll('input[name="cat-filter"]').forEach(input => {
    input.addEventListener('change', () => { state.category = input.value; apply(); });
  });
  const sortSel = document.getElementById('sort-select');
  if (sortSel) sortSel.addEventListener('change', () => { state.sort = sortSel.value; apply(); });
  const priceRange = document.getElementById('price-range');
  if (priceRange) {
    priceRange.addEventListener('input', () => {
      state.max = Number(priceRange.value);
      document.getElementById('price-range-max').textContent = formatPrice(state.max);
      apply();
    });
  }

  apply();
}

/* ---------- Product detail page ---------- */
function initProductDetail() {
  const wrap = document.getElementById('product-detail');
  if (!wrap) return;

  const params = new URLSearchParams(location.search);
  const id = Number(params.get('id')) || PRODUCTS[0].id;
  const p = findProduct(id) || PRODUCTS[0];

  document.title = p.name + ' — NOIR';

  const mainImg = svgDataUri('p' + p.id, p.name);
  const altImgs = [svgDataUri('p' + p.id + 'b', p.name), svgDataUri('p' + p.id + 'c', p.name), svgDataUri('p' + p.id + 'd', p.name)];
  const allImgs = [mainImg, ...altImgs];

  document.getElementById('pd-breadcrumb-name').textContent = p.name;
  document.getElementById('gallery-main').innerHTML = `<img src="${mainImg}" alt="${p.name}" id="gallery-main-img">`;
  document.getElementById('gallery-thumbs').innerHTML = allImgs.map((src, i) =>
    `<button class="${i === 0 ? 'active' : ''}" data-src="${src}"><img src="${src}" alt="thumb ${i+1}"></button>`
  ).join('');

  document.getElementById('gallery-thumbs').addEventListener('click', (e) => {
    const btn = e.target.closest('button');
    if (!btn) return;
    document.getElementById('gallery-main-img').src = btn.dataset.src;
    document.querySelectorAll('#gallery-thumbs button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  });

  document.getElementById('pd-cat').textContent = p.category;
  document.getElementById('pd-title').textContent = p.name;
  document.getElementById('pd-stars').textContent = starString(p.rating);
  document.getElementById('pd-rating-count').textContent = `(${p.rating * 7} reviews)`;
  document.getElementById('pd-price').innerHTML = p.oldPrice
    ? `<span class="old">${formatPrice(p.oldPrice)}</span>${formatPrice(p.price)}`
    : formatPrice(p.price);
  document.getElementById('pd-desc').textContent = p.desc;
  document.getElementById('pd-desc-full').textContent = p.desc + ' Made with meticulous attention to construction detail, this piece is designed to be worn season after season — a considered addition to a monochrome wardrobe.';

  const sizeWrap = document.getElementById('size-options');
  let selectedSize = p.sizes[0];
  sizeWrap.innerHTML = p.sizes.map((s, i) => `<button class="${i === 0 ? 'active' : ''}" data-size="${s}">${s}</button>`).join('');
  sizeWrap.addEventListener('click', (e) => {
    const btn = e.target.closest('button');
    if (!btn) return;
    selectedSize = btn.dataset.size;
    sizeWrap.querySelectorAll('button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  });

  const qtyInput = document.getElementById('pd-qty');
  document.getElementById('qty-minus').addEventListener('click', () => {
    qtyInput.value = Math.max(1, Number(qtyInput.value) - 1);
  });
  document.getElementById('qty-plus').addEventListener('click', () => {
    qtyInput.value = Number(qtyInput.value) + 1;
  });

  document.getElementById('pd-add-cart').addEventListener('click', () => {
    addToCart(p.id, selectedSize, Number(qtyInput.value));
  });

  // Tabs
  document.querySelectorAll('.pd-tabs button').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.pd-tabs button').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.tab-panel').forEach(p2 => p2.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById(btn.dataset.tab).classList.add('active');
    });
  });

  window._currentProductId = p.id;
}

function renderRelatedProducts() {
  const el = document.getElementById('related-products');
  if (!el) return;
  const params = new URLSearchParams(location.search);
  const id = Number(params.get('id')) || PRODUCTS[0].id;
  const current = findProduct(id) || PRODUCTS[0];
  const related = PRODUCTS.filter(p => p.category === current.category && p.id !== current.id).slice(0, 4);
  const list = related.length ? related : PRODUCTS.filter(p => p.id !== current.id).slice(0, 4);
  el.innerHTML = list.map(buildProductCard).join('');
  attachQuickAdd(el);
}

/* ---------- Cart page ---------- */
function renderCartPage() {
  const tbody = document.getElementById('cart-body');
  if (!tbody) return;
  const cart = getCart();
  const emptyState = document.getElementById('cart-empty');
  const filled = document.getElementById('cart-filled');

  if (cart.length === 0) {
    if (emptyState) emptyState.style.display = 'block';
    if (filled) filled.style.display = 'none';
    return;
  }
  if (emptyState) emptyState.style.display = 'none';
  if (filled) filled.style.display = 'grid';

  tbody.innerHTML = cart.map(item => {
    const p = findProduct(item.id);
    if (!p) return '';
    const img = svgDataUri('p' + p.id, p.name);
    const lineTotal = p.price * item.qty;
    return `
    <tr data-id="${p.id}" data-size="${item.size}">
      <td>
        <div class="cart-product">
          <div class="thumb"><img src="${img}" alt="${p.name}"></div>
          <div>
            <h4><a href="product.html?id=${p.id}">${p.name}</a></h4>
            <div class="variant">Size: ${item.size}</div>
            <button class="remove-btn">Remove</button>
          </div>
        </div>
      </td>
      <td>${formatPrice(p.price)}</td>
      <td>
        <div class="cart-qty">
          <button class="cq-minus">−</button>
          <input type="text" class="cq-input" value="${item.qty}" readonly>
          <button class="cq-plus">+</button>
        </div>
      </td>
      <td class="line-total">${formatPrice(lineTotal)}</td>
    </tr>`;
  }).join('');

  tbody.querySelectorAll('tr').forEach(row => {
    const id = Number(row.dataset.id);
    const size = row.dataset.size;
    row.querySelector('.remove-btn').addEventListener('click', () => {
      removeFromCart(id, size);
      renderCartPage();
      renderCartSummary();
    });
    row.querySelector('.cq-minus').addEventListener('click', () => {
      const input = row.querySelector('.cq-input');
      const val = Math.max(1, Number(input.value) - 1);
      updateCartQty(id, size, val);
      renderCartPage();
      renderCartSummary();
    });
    row.querySelector('.cq-plus').addEventListener('click', () => {
      const input = row.querySelector('.cq-input');
      const val = Number(input.value) + 1;
      updateCartQty(id, size, val);
      renderCartPage();
      renderCartSummary();
    });
  });

  renderCartSummary();
}

function renderCartSummary() {
  const box = document.getElementById('cart-summary');
  if (!box) return;
  const t = cartTotals();
  document.getElementById('sum-subtotal').textContent = formatPrice(t.subtotal);
  document.getElementById('sum-shipping').textContent = t.shipping === 0 ? 'Free' : formatPrice(t.shipping);
  document.getElementById('sum-tax').textContent = formatPrice(t.tax);
  document.getElementById('sum-total').textContent = formatPrice(t.total);
}

/* ---------- Checkout page ---------- */
function renderCheckoutSummary() {
  const el = document.getElementById('checkout-order-lines');
  if (!el) return;
  const cart = getCart();
  if (cart.length === 0) {
    el.innerHTML = '<p class="empty-state">Your cart is empty.</p>';
  } else {
    el.innerHTML = cart.map(item => {
      const p = findProduct(item.id);
      if (!p) return '';
      const img = svgDataUri('p' + p.id, p.name);
      return `
      <div class="order-line">
        <div class="thumb"><img src="${img}" alt="${p.name}"><span class="badge-qty">${item.qty}</span></div>
        <div>
          <div class="name">${p.name}</div>
          <div class="variant">Size: ${item.size}</div>
        </div>
        <div class="price">${formatPrice(p.price * item.qty)}</div>
      </div>`;
    }).join('');
  }
  const t = cartTotals();
  const subtotalEl = document.getElementById('co-subtotal');
  if (subtotalEl) {
    document.getElementById('co-subtotal').textContent = formatPrice(t.subtotal);
    document.getElementById('co-shipping').textContent = t.shipping === 0 ? 'Free' : formatPrice(t.shipping);
    document.getElementById('co-tax').textContent = formatPrice(t.tax);
    document.getElementById('co-total').textContent = formatPrice(t.total);
  }

  const payMethods = document.querySelectorAll('.pay-method');
  payMethods.forEach(m => {
    m.addEventListener('click', () => {
      payMethods.forEach(x => x.classList.remove('active'));
      m.classList.add('active');
      m.querySelector('input').checked = true;
    });
  });

  const form = document.getElementById('checkout-form');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      if (getCart().length === 0) {
        showToast('Your cart is empty');
        return;
      }
      localStorage.removeItem(CART_KEY);
      document.getElementById('checkout-form-wrap').style.display = 'none';
      document.getElementById('order-success').style.display = 'block';
      updateCartCount();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
}

/* ---------- Auth tabs (login/register) ---------- */
function initAuthTabs() {
  const tabs = document.querySelectorAll('.auth-tabs button');
  if (!tabs.length) return;
  tabs.forEach(btn => {
    btn.addEventListener('click', () => {
      tabs.forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.auth-panel').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById(btn.dataset.panel).classList.add('active');
    });
  });
  document.querySelectorAll('.auth-panel form').forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      showToast('This is a demo template — no account was created.');
    });
  });
}

/* ---------- Fake form submits (newsletter / contact) ---------- */
function initFakeForms() {
  const newsletter = document.getElementById('newsletter-form');
  if (newsletter) {
    newsletter.addEventListener('submit', (e) => {
      e.preventDefault();
      const msg = document.getElementById('newsletter-msg');
      msg.textContent = 'Thanks for subscribing!';
      newsletter.reset();
    });
  }
  const contact = document.getElementById('contact-form');
  if (contact) {
    contact.addEventListener('submit', (e) => {
      e.preventDefault();
      const msg = document.getElementById('contact-msg');
      msg.textContent = 'Your message has been sent. We will get back to you shortly.';
      contact.reset();
    });
  }
}

function initYear() {
  document.querySelectorAll('.cur-year').forEach(el => el.textContent = new Date().getFullYear());
}
