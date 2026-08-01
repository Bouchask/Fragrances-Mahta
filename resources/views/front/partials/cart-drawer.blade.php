<!-- Cart Drawer & Overlay -->
<div class="cart-overlay" id="cart-overlay"></div>
<aside class="cart-drawer" id="cart-drawer" style="display: flex; flex-direction: column;">
    <div class="cart-drawer__header" style="border-bottom: 1px solid #eaeaea; padding-bottom: 15px; margin-bottom: 10px;">
        <h2 style="font-weight: 700; color: #1e293b;">Votre panier</h2>
        <button type="button" class="cart-drawer__close" id="cart-close" onclick="closeCart()" style="background: none; border: none; cursor: pointer;">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    
    <!-- Empty Cart State -->
    <div class="cart-drawer__empty" id="cart-empty" style="text-align: center; margin: auto 0; padding: 20px;">
        <svg viewBox="0 0 24 24" width="56" height="56" stroke="#cbd5e1" stroke-width="1.2" fill="none" style="margin: 0 auto 15px;"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
        <h3 style="font-size: 18px; color: #475569; margin-bottom: 15px;">Votre panier est vide</h3>
        <button type="button" class="btn btn--solid btn--blue" onclick="closeCart()" style="border-radius: 50px; padding: 10px 24px;">Continuer les achats</button>
    </div>

    <!-- Filled Cart State (Hidden initially) -->
    <div class="cart-drawer__filled" id="cart-filled" style="display: none; flex-direction: column; flex-grow: 1; justify-content: space-between; height: calc(100% - 60px);">
        <div class="cart-items-wrapper" style="flex-grow: 1; overflow-y: auto; overflow-x: hidden; padding-right: 5px;" id="cart-items-list">
            <!-- Dynamically injected cart items by script.js -->
        </div>

        <div class="cart-drawer__footer" style="border-top: 1px solid #eaeaea; padding-top: 15px; margin-top: 15px; background: #ffffff;">
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; margin-bottom: 14px; display: flex; align-items: center; gap: 10px; font-size: 13px; color: #1a233a;">
                <svg viewBox="0 0 24 24" width="20" height="20" stroke="#1a233a" stroke-width="1.8" fill="none" style="flex-shrink: 0;"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                <span><strong>Livraison 100% Gratuite</strong> pour votre commande</span>
            </div>
            <div class="cart-totals" style="display: flex; justify-content: space-between; font-weight: 700; font-size: 18px; color: #0f172a; margin-bottom: 8px;">
                <span>Total</span>
                <span class="cart-totals__price">0.00 MAD</span>
            </div>
            <p class="cart-taxes" style="font-size: 12px; color: #64748b; margin-bottom: 15px;">Paiement sécurisé à la livraison (Cash on Delivery).</p>
            <button type="button" class="btn btn--solid btn--blue btn--full" onclick="checkout()" style="width: 100%; border-radius: 50px; padding: 14px 20px; font-size: 16px; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">Procéder au paiement</button>
        </div>
    </div>
</aside>
