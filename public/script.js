// ============================================================
// AURALUNA THEME - SCRIPT
// ============================================================

document.addEventListener('DOMContentLoaded', () => {
    // Prevent default anchor clicks on placeholder links
    document.querySelectorAll('a[href="#"]').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
        });
    });

    // Close cart/nav when clicking on overlay or close button
    const cartOverlay = document.getElementById('cart-overlay');
    const cartCloseBtn = document.getElementById('cart-close');
    
    if (cartOverlay) {
        cartOverlay.addEventListener('click', () => {
            closeCart();
            closeMobileNav();
        });
    }
    if (cartCloseBtn) cartCloseBtn.addEventListener('click', closeCart);
    
    renderCart();
});

// ============================================================
// MOBILE NAV LOGIC
// ============================================================
function openMobileNav() {
    document.getElementById('mobile-nav-drawer').classList.add('active');
    document.getElementById('cart-overlay').classList.add('active'); // Reuse overlay
    document.body.style.overflow = 'hidden';
}

function closeMobileNav() {
    const nav = document.getElementById('mobile-nav-drawer');
    if (nav) nav.classList.remove('active');
    
    // Only remove overlay active if cart is also closed
    const cart = document.getElementById('cart-drawer');
    if (cart && !cart.classList.contains('active')) {
        document.getElementById('cart-overlay').classList.remove('active');
        document.body.style.overflow = '';
    }
}

// ============================================================
// CART DRAWER LOGIC
// ============================================================

/**
 * Open the cart drawer
 */
function openCart() {
    document.getElementById('cart-overlay').classList.add('active');
    document.getElementById('cart-drawer').classList.add('active');
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

/**
 * Close the cart drawer
 */
function closeCart() {
    const cart = document.getElementById('cart-drawer');
    if (cart) cart.classList.remove('active');
    
    // Only remove overlay active if mobile nav is also closed
    const nav = document.getElementById('mobile-nav-drawer');
    if (nav && !nav.classList.contains('active')) {
        document.getElementById('cart-overlay').classList.remove('active');
        document.body.style.overflow = '';
    }
}

// ============================================================
// DYNAMIC MULTI-PRODUCT CART SYSTEM
// ============================================================
let cartItems = [];
try {
    const stored = localStorage.getItem('cart_items');
    if (stored) {
        cartItems = JSON.parse(stored);
        if (!Array.isArray(cartItems)) cartItems = [];
    } else {
        // Migration check for old single cart_item
        const oldItem = localStorage.getItem('cart_item');
        if (oldItem) {
            const parsed = JSON.parse(oldItem);
            if (parsed && parsed.id) {
                cartItems = [parsed];
                localStorage.setItem('cart_items', JSON.stringify(cartItems));
                localStorage.removeItem('cart_item');
            }
        }
    }
} catch (e) {
    cartItems = [];
}

function saveCart() {
    localStorage.setItem('cart_items', JSON.stringify(cartItems));
}

function renderCart() {
    const emptyState = document.getElementById('cart-empty');
    const filledState = document.getElementById('cart-filled');
    
    if (!emptyState || !filledState) return;

    if (!cartItems || cartItems.length === 0) {
        emptyState.style.display = 'flex';
        filledState.style.display = 'none';
        return;
    }

    emptyState.style.display = 'none';
    filledState.style.display = 'flex';

    const itemsListContainer = document.getElementById('cart-items-list');
    if (itemsListContainer) {
        let html = '';
        let total = 0;

        cartItems.forEach((item) => {
            const itemPrice = parseFloat(item.price) || 0;
            const itemQty = parseInt(item.quantity) || 1;
            const itemTotal = itemPrice * itemQty;
            total += itemTotal;

            html += `
            <div class="cart-item" style="border-bottom: 1px solid #eee; padding: 12px 0; margin-bottom: 8px; display: flex; align-items: center;">
                <div class="cart-item__media" style="flex-shrink: 0; width: 65px; height: 65px; border-radius: 8px; overflow: hidden; background: #f8fafc; border: 1px solid #f1f5f9;">
                    <img src="${item.image || 'image/lizze/luxury_hair_straightener_advertisement.webp'}" alt="${item.name}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="cart-item__details" style="flex-grow: 1; padding-left: 12px;">
                    <h4 style="font-size: 14px; font-weight: 600; margin: 0 0 4px 0; color: #1e293b;">${item.name || 'Produit'}</h4>
                    <p class="cart-item__price" style="font-size: 13px; color: #10b981; font-weight: 700; margin: 0 0 8px 0;">${itemPrice.toFixed(2)} dh</p>
                    <div class="cart-item__actions" style="display: flex; align-items: center; justify-content: space-between;">
                        <div class="quantity-selector quantity-selector--small" style="border: 1px solid #cbd5e1; border-radius: 6px; display: flex; align-items: center; background: #fff;">
                            <button type="button" class="qty-btn" style="padding: 2px 8px; border: none; background: #f8fafc; cursor: pointer; color: #334155; font-weight: bold;" onclick="updateCartItemQty(${item.id}, -1)">-</button>
                            <span style="padding: 2px 12px; font-size: 13px; font-weight: 600; color: #0f172a;">${itemQty}</span>
                            <button type="button" class="qty-btn" style="padding: 2px 8px; border: none; background: #f8fafc; cursor: pointer; color: #334155; font-weight: bold;" onclick="updateCartItemQty(${item.id}, 1)">+</button>
                        </div>
                        <button type="button" class="cart-item__remove" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 6px;" title="Supprimer du panier" onclick="removeCartItem(${item.id})">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="1.8" fill="none"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
            </div>`;
        });

        itemsListContainer.innerHTML = html;

        // Update total price display
        const totalEl = filledState.querySelector('.cart-totals__price');
        if (totalEl) {
            totalEl.textContent = 'Dh ' + total.toFixed(2) + ' MAD';
        }
    }
}

/**
 * Add product to cart array and open drawer
 */
function addToCart(id, name, price, originalPrice, image, quantity = 1) {
    if (!id) {
        openCart();
        return;
    }
    
    const existingIndex = cartItems.findIndex(item => item.id == id);
    if (existingIndex > -1) {
        cartItems[existingIndex].quantity = (cartItems[existingIndex].quantity || 1) + (parseInt(quantity) || 1);
    } else {
        cartItems.push({
            id: id,
            name: name,
            price: parseFloat(price) || 0,
            originalPrice: originalPrice ? parseFloat(originalPrice) : null,
            image: image || '',
            quantity: parseInt(quantity) || 1
        });
    }
    
    saveCart();
    renderCart();
    openCart();
}

/**
 * Empty the entire cart
 */
function emptyCart() {
    cartItems = [];
    localStorage.removeItem('cart_items');
    localStorage.removeItem('cart_item');
    renderCart();
}

/**
 * Update quantity for specific cart item
 */
function updateCartItemQty(id, change) {
    const index = cartItems.findIndex(item => item.id == id);
    if (index > -1) {
        cartItems[index].quantity = (cartItems[index].quantity || 1) + change;
        if (cartItems[index].quantity < 1) {
            cartItems.splice(index, 1);
        }
        saveCart();
        renderCart();
    }
}

/**
 * Remove specific item from cart array
 */
function removeCartItem(id) {
    cartItems = cartItems.filter(item => item.id != id);
    saveCart();
    renderCart();
}

// Legacy helper compatibility
function updateCartQty(change) {
    if (cartItems.length > 0) {
        updateCartItemQty(cartItems[0].id, change);
    }
}

// ============================================================
// PRODUCT PAGE LOGIC
// ============================================================

/**
 * Handle quantity increment/decrement on the product page
 */
function updateQty(change) {
    const qtyInput = document.getElementById('qty-input');
    if (!qtyInput) return;

    let currentVal = parseInt(qtyInput.value) || 1;
    let newVal = currentVal + change;

    if (newVal < 1) newVal = 1;
    qtyInput.value = newVal;
}

function openCheckoutModal() {
    const modal = document.getElementById('checkout-modal');
    if (modal) {
        modal.style.display = 'flex';
        // Close other overlays
        closeCart();
        closeMobileNav();
    }
}

function closeCheckout() {
    const modal = document.getElementById('checkout-modal');
    if (modal) {
        modal.style.display = 'none';
    }
}

/**
 * Simulate "Buy Now" action directly from a product page
 */
function buyNow(productId) {
    const qtyInput = document.getElementById('qty-input');
    const checkoutProd = document.getElementById('checkout-product-id');
    const checkoutQty = document.getElementById('checkout-quantity');
    const checkoutCartData = document.getElementById('checkout-cart-data');

    if (checkoutCartData) checkoutCartData.value = ''; // Direct buy now does not use cart array
    if (checkoutProd && productId) {
        checkoutProd.value = productId;
    }
    if (qtyInput && checkoutQty) {
        checkoutQty.value = qtyInput.value;
    }
    openCheckoutModal();
}

function checkout() {
    if (!cartItems || cartItems.length === 0) {
        alert("Votre panier est vide.");
        return;
    }
    const checkoutProd = document.getElementById('checkout-product-id');
    const checkoutQty = document.getElementById('checkout-quantity');
    const checkoutCartData = document.getElementById('checkout-cart-data');

    if (checkoutProd) checkoutProd.value = '';
    if (checkoutQty) checkoutQty.value = '';
    if (checkoutCartData) checkoutCartData.value = JSON.stringify(cartItems);

    openCheckoutModal();
}
