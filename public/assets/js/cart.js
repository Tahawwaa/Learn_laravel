/* =========================================================
   Cart — persisted to localStorage, shared across all pages
   ========================================================= */

const CART_KEY = 'noir_cart';

function getCart() {
  try {
    return JSON.parse(localStorage.getItem(CART_KEY)) || [];
  } catch (e) {
    return [];
  }
}

function saveCart(cart) {
  localStorage.setItem(CART_KEY, JSON.stringify(cart));
  updateCartCount();
}

function addToCart(productId, size, qty) {
  const cart = getCart();
  const existing = cart.find(i => i.id === productId && i.size === size);
  if (existing) {
    existing.qty += qty;
  } else {
    cart.push({ id: productId, size: size, qty: qty });
  }
  saveCart(cart);
  showToast('Added to cart');
}

function removeFromCart(productId, size) {
  const cart = getCart().filter(i => !(i.id === productId && i.size === size));
  saveCart(cart);
}

function updateCartQty(productId, size, qty) {
  const cart = getCart();
  const item = cart.find(i => i.id === productId && i.size === size);
  if (item) {
    item.qty = Math.max(1, qty);
    saveCart(cart);
  }
}

function cartTotals() {
  const cart = getCart();
  let subtotal = 0;
  let count = 0;
  cart.forEach(item => {
    const p = findProduct(item.id);
    if (p) {
      subtotal += p.price * item.qty;
      count += item.qty;
    }
  });
  const shipping = cart.length === 0 ? 0 : (subtotal >= 150 ? 0 : 12);
  const tax = subtotal * 0.08;
  const total = subtotal + shipping + tax;
  return { subtotal, shipping, tax, total, count };
}

function updateCartCount() {
  const { count } = cartTotals();
  document.querySelectorAll('.cart-count').forEach(el => {
    el.textContent = count;
    el.style.display = count > 0 ? 'flex' : 'none';
  });
}

function showToast(message) {
  let toast = document.querySelector('.toast');
  if (!toast) {
    toast = document.createElement('div');
    toast.className = 'toast';
    document.body.appendChild(toast);
  }
  toast.textContent = message;
  toast.classList.add('show');
  clearTimeout(toast._timer);
  toast._timer = setTimeout(() => toast.classList.remove('show'), 2200);
}

document.addEventListener('DOMContentLoaded', updateCartCount);
