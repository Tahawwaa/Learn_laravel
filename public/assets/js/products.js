/* =========================================================
   Product catalogue + SVG placeholder generator
   (No external images needed — keeps the template self-contained)
   ========================================================= */

function productSVG(seed, label) {
  // Deterministic pseudo-random pattern based on seed, black & white only
  let hash = 0;
  for (let i = 0; i < seed.length; i++) hash = (hash * 31 + seed.charCodeAt(i)) >>> 0;
  const rand = (n) => { hash = (hash * 1103515245 + 12345) >>> 0; return hash % n; };
  const shapes = [];
  const shapeCount = 4 + rand(4);
  for (let i = 0; i < shapeCount; i++) {
    const type = rand(3);
    const x = rand(400);
    const y = rand(500);
    const size = 40 + rand(160);
    const opacity = (30 + rand(50)) / 100;
    if (type === 0) {
      shapes.push(`<circle cx="${x}" cy="${y}" r="${size / 2}" fill="#000" opacity="${opacity}"/>`);
    } else if (type === 1) {
      shapes.push(`<rect x="${x}" y="${y}" width="${size}" height="${size}" fill="#000" opacity="${opacity}" transform="rotate(${rand(45)} ${x} ${y})"/>`);
    } else {
      shapes.push(`<line x1="${x}" y1="${y}" x2="${x + size}" y2="${y - size}" stroke="#000" stroke-width="2" opacity="${opacity}"/>`);
    }
  }
  const initials = label.split(' ').map(w => w[0]).join('').slice(0, 2).toUpperCase();
  return `<svg viewBox="0 0 400 500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
    <rect width="400" height="500" fill="#f2f2f2"/>
    ${shapes.join('')}
    <text x="200" y="260" font-family="Georgia, serif" font-size="64" fill="#0a0a0a" text-anchor="middle" opacity="0.85">${initials}</text>
  </svg>`;
}

function svgDataUri(seed, label) {
  const svg = productSVG(seed, label);
  return 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
}

const PRODUCTS = [
  { id: 1, name: 'Essential Wool Coat', category: 'Women', price: 248, oldPrice: 310, badge: 'Sale', rating: 5, sizes: ['XS','S','M','L','XL'], colors: ['#0a0a0a','#e5e5e5'], desc: 'A timeless wool-blend coat cut for a relaxed silhouette. Finished with horn-style buttons and a notched collar for effortless layering.' },
  { id: 2, name: 'Classic Oxford Shirt', category: 'Men', price: 78, badge: 'New', rating: 4, sizes: ['S','M','L','XL','XXL'], colors: ['#ffffff','#0a0a0a'], desc: 'Crisp cotton oxford shirt with a tailored fit. A wardrobe staple that pairs equally well with denim or tailoring.' },
  { id: 3, name: 'Pleated Midi Skirt', category: 'Women', price: 96, rating: 4, sizes: ['XS','S','M','L'], colors: ['#0a0a0a'], desc: 'Fluid pleated midi skirt in a fluid drape fabric. Elasticated waistband for all-day comfort.' },
  { id: 4, name: 'Leather Chelsea Boots', category: 'Accessories', price: 210, badge: 'New', rating: 5, sizes: ['39','40','41','42','43','44'], colors: ['#0a0a0a'], desc: 'Hand-finished leather Chelsea boots with an elastic side panel and pull tab. Built on a durable rubber sole.' },
  { id: 5, name: 'Ribbed Knit Sweater', category: 'Men', price: 112, oldPrice: 140, badge: 'Sale', rating: 4, sizes: ['S','M','L','XL'], colors: ['#e5e5e5','#0a0a0a'], desc: 'Soft ribbed-knit sweater with a crew neckline. Lightweight yet warm — ideal for transitional weather.' },
  { id: 6, name: 'Structured Tote Bag', category: 'Accessories', price: 165, rating: 5, sizes: ['One Size'], colors: ['#0a0a0a','#ffffff'], desc: 'Minimalist structured tote in full-grain leather. Spacious interior with an inner zip pocket.' },
  { id: 7, name: 'Tailored Wide-Leg Trousers', category: 'Women', price: 134, rating: 4, sizes: ['XS','S','M','L','XL'], colors: ['#0a0a0a'], desc: 'High-waisted wide-leg trousers with a fluid drape and centre crease. Fully lined for a polished finish.' },
  { id: 8, name: 'Minimal Leather Belt', category: 'Accessories', price: 58, rating: 4, sizes: ['S/M','L/XL'], colors: ['#0a0a0a','#ffffff'], desc: 'Full-grain leather belt with a brushed matte buckle. Cut from a single piece of vegetable-tanned leather.' },
  { id: 9, name: 'Cotton Crewneck Tee', category: 'Men', price: 42, badge: 'New', rating: 5, sizes: ['S','M','L','XL','XXL'], colors: ['#ffffff','#0a0a0a','#e5e5e5'], desc: 'Heavyweight cotton tee with a boxy fit and reinforced neckline. Garment-dyed for a lived-in feel.' },
  { id: 10, name: 'Draped Satin Dress', category: 'Women', price: 188, oldPrice: 225, badge: 'Sale', rating: 5, sizes: ['XS','S','M','L'], colors: ['#0a0a0a'], desc: 'Fluid satin slip dress with a bias cut that skims the body. Adjustable straps and a cowl neckline.' },
  { id: 11, name: 'Merino Wool Scarf', category: 'Accessories', price: 64, rating: 4, sizes: ['One Size'], colors: ['#0a0a0a','#e5e5e5','#ffffff'], desc: 'Featherlight merino wool scarf, woven for warmth without bulk. Finished with hand-tied fringe.' },
  { id: 12, name: 'Tapered Denim Jeans', category: 'Men', price: 98, rating: 4, sizes: ['30','31','32','33','34','36'], colors: ['#0a0a0a'], desc: 'Rigid selvedge denim cut with a tapered leg. Designed to break in and soften with wear.' },
];

function findProduct(id) {
  return PRODUCTS.find(p => p.id === Number(id));
}

function formatPrice(n) {
  return '$' + n.toFixed(2);
}

function starString(rating) {
  return '★'.repeat(rating) + '☆'.repeat(5 - rating);
}
