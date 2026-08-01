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

/**
 * Simulate "Add to Cart" action
 * Opens the cart and shows the "filled" state
 */
function addToCart() {
    document.getElementById('cart-empty').style.display = 'none';
    document.getElementById('cart-filled').style.display = 'flex';
    openCart();
}

/**
 * Empty the cart (Trash icon)
 * Switches back to the "empty" state
 */
function emptyCart() {
    document.getElementById('cart-filled').style.display = 'none';
    document.getElementById('cart-empty').style.display = 'flex';
}

/**
 * Update quantity inside the cart
 */
function updateCartQty(change) {
    const qtyInput = document.getElementById('cart-qty');
    if (!qtyInput) return;

    let currentVal = parseInt(qtyInput.value) || 1;
    let newVal = currentVal + change;

    // Minimum quantity is 1
    if (newVal < 1) newVal = 1;

    qtyInput.value = newVal;
    
    // Update total price (simulated for 780 dh)
    const price = 780;
    const total = (price * newVal).toFixed(2);
    document.querySelector('.cart-totals__price').innerText = `Dh ${total} MAD`;
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

/**
 * Simulate "Buy Now" action
 */
function buyNow() {
    alert("Redirection vers la page de paiement sécurisée...");
}

function checkout() {
    alert("Redirection vers la page de paiement sécurisée...");
}
