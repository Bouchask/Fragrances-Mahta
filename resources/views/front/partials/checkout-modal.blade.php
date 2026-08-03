<!-- Premium Checkout Modal (Inspired by reference, clean theme) -->
<div id="checkout-modal" class="checkout-modal" style="display: none;">
    <div class="checkout-modal__card">
        <div class="checkout-modal__top">
            <div class="checkout-modal__title-wrapper">
                <svg class="checkout-modal__home-icon" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <h2 class="checkout-modal__heading">COMMANDE AVEC PAIEMENT À LA LIVRAISON</h2>
            </div>
            <button type="button" class="checkout-modal__close" onclick="closeCheckout()">&times;</button>
        </div>
        
        <div class="checkout-modal__body">
            <form id="checkout-form" action="{{ route('checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="checkout-product-id" value="{{ isset($product) ? $product->id : '' }}">
                <input type="hidden" name="quantity" id="checkout-quantity" value="1">
                <input type="hidden" name="cart_data" id="checkout-cart-data" value="">
                
                <!-- Mode de livraison (Selected Radio) -->
                <div class="checkout-field-group">
                    <label class="checkout-label">Mode de livraison</label>
                    <div class="checkout-shipping-box">
                        <span class="shipping-radio"></span>
                        <span class="shipping-title">Livraison Gratuite (Domicile & Relais)</span>
                        <span class="shipping-price">0.00 dh</span>
                    </div>
                </div>

                <!-- Nom Complet -->
                <div class="checkout-field-group">
                    <label class="checkout-label">Nom Complet <span class="required-star">*</span></label>
                    <div class="checkout-input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <input type="text" name="name" required class="checkout-input" placeholder="Ex: Yassine Benmoussa">
                    </div>
                </div>

                <!-- Téléphone -->
                <div class="checkout-field-group">
                    <label class="checkout-label">Téléphone <span class="required-star">*</span></label>
                    <div class="checkout-input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <input type="tel" name="phone" required class="checkout-input" placeholder="Ex: 0614531670">
                    </div>
                </div>

                <!-- Adresse & Ville -->
                <div class="checkout-field-group">
                    <label class="checkout-label">Ville & Adresse <span class="required-star">*</span></label>
                    <div class="checkout-input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <input type="text" name="city" required class="checkout-input" placeholder="Ex: Casablanca, Maarif (Ville et quartier)">
                    </div>
                </div>

                <!-- Price Breakdown Box -->
                <div class="checkout-summary-box">
                    <div class="summary-line">
                        <span>Sous-total</span>
                        <span id="checkout-subtotal" class="font-semibold text-slate-800">0.00 dh</span>
                    </div>
                    <div class="summary-line">
                        <span>Livraison</span>
                        <span class="free-badge">Gratuite (0.00 dh)</span>
                    </div>
                    <div class="summary-line total-line">
                        <span>Total</span>
                        <span id="checkout-total-price">0.00 dh</span>
                    </div>
                </div>

                <!-- Item preview thumbnail card -->
                <div id="checkout-items-preview" class="checkout-items-preview">
                    <!-- Populated via Javascript -->
                </div>

                <!-- Big Submit Button -->
                <button type="submit" id="btn-submit-checkout" class="btn-checkout-submit">
                    Terminez votre achat - 0.00 dh
                </button>
            </form>
        </div>
    </div>
</div>

<style>
/* Premium Checkout Modal Styles */
.checkout-modal {
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(15, 23, 42, 0.7);
    backdrop-filter: blur(5px);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10000;
    padding: 15px;
    overflow-y: auto;
    box-sizing: border-box;
}
.checkout-modal__card {
    background: #ffffff;
    width: 100%;
    max-width: 450px;
    border-radius: 18px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    animation: modalPop 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
@keyframes modalPop {
    0% { opacity: 0; transform: scale(0.96); }
    100% { opacity: 1; transform: scale(1); }
}
.checkout-modal__top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 22px;
    border-bottom: 1px solid #e2e8f0;
    background: #f8fafc;
}
.checkout-modal__title-wrapper {
    display: flex;
    align-items: center;
    gap: 12px;
}
.checkout-modal__home-icon {
    color: #1e293b;
    flex-shrink: 0;
}
.checkout-modal__heading {
    font-size: 14px;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: 0.3px;
    margin: 0;
    line-height: 1.3;
}
.checkout-modal__close {
    font-size: 26px;
    color: #64748b;
    background: none;
    border: none;
    cursor: pointer;
    line-height: 1;
    padding: 0 4px;
    transition: color 0.2s;
}
.checkout-modal__close:hover {
    color: #0f172a;
}
.checkout-modal__body {
    padding: 22px;
    overflow-y: auto;
}
.checkout-field-group {
    margin-bottom: 16px;
}
.checkout-label {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: #334155;
    margin-bottom: 6px;
}
.required-star {
    color: #ef4444;
}
.checkout-shipping-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    border: 1.5px solid #3b5bdb;
    border-radius: 12px;
    background-color: #eff6ff;
    font-size: 13px;
}
.shipping-radio {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 4px solid #3b5bdb;
    background: #ffffff;
    display: inline-block;
    margin-right: 12px;
    box-shadow: 0 0 0 1px #93c5fd;
}
.shipping-title {
    font-weight: 600;
    color: #1e293b;
    flex-grow: 1;
}
.shipping-price {
    font-weight: 800;
    color: #16a34a;
}
.checkout-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}
.input-icon {
    position: absolute;
    left: 14px;
    color: #64748b;
    pointer-events: none;
}
.checkout-input {
    width: 100%;
    padding: 12px 14px 12px 44px;
    border: 1.5px solid #cbd5e1;
    border-radius: 10px;
    font-size: 14px;
    color: #1e293b;
    background: #f8fafc;
    transition: all 0.2s;
    box-sizing: border-box;
    font-family: inherit;
}
.checkout-input:focus {
    outline: none;
    border-color: #3b5bdb;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(59, 91, 219, 0.15);
}
.checkout-summary-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 15px 18px;
    margin-top: 20px;
    margin-bottom: 16px;
}
.summary-line {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: #64748b;
    margin-bottom: 8px;
}
.summary-line:last-child {
    margin-bottom: 0;
}
.free-badge {
    color: #16a34a;
    font-weight: 700;
}
.total-line {
    border-top: 1px solid #e2e8f0;
    padding-top: 10px;
    margin-top: 10px;
    font-size: 16px;
    font-weight: 800;
    color: #0f172a;
}
.checkout-items-preview {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
    max-height: 150px;
    overflow-y: auto;
}
.preview-item-card {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    background: #ffffff;
    box-shadow: 0 1px 2px rgba(0,0,0,0.02);
}
.preview-item-thumb {
    width: 46px;
    height: 46px;
    border-radius: 8px;
    object-fit: cover;
    background: #f8fafc;
    border: 1px solid #f1f5f9;
}
.preview-item-info {
    flex-grow: 1;
}
.preview-item-name {
    font-size: 13px;
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 3px 0;
    line-height: 1.3;
}
.preview-item-qty {
    font-size: 12px;
    color: #64748b;
    font-weight: 500;
}
.preview-item-price {
    font-size: 14px;
    font-weight: 800;
    color: #3b5bdb;
}
.btn-checkout-submit {
    width: 100%;
    padding: 16px;
    background: #0f172a;
    color: #ffffff;
    font-size: 15px;
    font-weight: 800;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.25);
    text-align: center;
    letter-spacing: 0.3px;
}
.btn-checkout-submit:hover {
    background: #1e293b;
    transform: translateY(-2px);
    box-shadow: 0 12px 20px -3px rgba(15, 23, 42, 0.35);
}
</style>

@if(session('success'))
<!-- Clean, Theme-Aligned Success Modal -->
<div id="success-celebration-modal" class="clean-success-overlay">
    <div class="clean-success-content">
        <div class="clean-success-icon">
            <svg viewBox="0 0 24 24" width="56" height="56" stroke="#3b5bdb" stroke-width="1.6" fill="none" class="animate-check">
                <circle cx="12" cy="12" r="10" stroke="#e2e8f0"></circle>
                <path d="M8 12.5l2.5 2.5 5.5-5.5" stroke="#3b5bdb" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <h2 class="clean-success-title">Commande validée</h2>
        <p class="clean-success-subtitle">Merci de votre confiance. Votre commande a été enregistrée avec succès.</p>
        
        <div class="clean-livraison-banner">
            <svg viewBox="0 0 24 24" width="22" height="22" stroke="#1a233a" stroke-width="1.8" fill="none" class="banner-icon">
                <rect x="1" y="3" width="15" height="13"></rect>
                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                <circle cx="18.5" cy="18.5" r="2.5"></circle>
            </svg>
            <div class="banner-text">
                <strong>Livraison 100% Gratuite</strong>
                <p>Aucun frais d'expédition ne sera facturé lors de la livraison.</p>
            </div>
        </div>
        
        <p class="clean-success-info">
            Pour accélérer le traitement de votre commande et vérifier immédiatement la disponibilité de vos produits, cliquez ci-dessous :
        </p>

        @if(session('whatsapp_url'))
        <a href="{{ session('whatsapp_url') }}" target="_blank" class="btn-whatsapp-confirm">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
                <path d="M11.944 0A12 12 0 0 0 0 12a11.96 11.96 0 0 0 1.944 6.556L.067 24l5.63-1.852A11.96 11.96 0 0 0 11.944 24c6.627 0 12-5.373 12-12s-5.373-12-12-12zm6.98 17.15c-.295.83-1.72 1.583-2.38 1.66-.662.08-1.52.122-4.9-1.28-4.32-1.79-7.085-6.215-7.302-6.505-.215-.29-1.74-2.32-1.74-4.426 0-2.107 1.11-3.14 1.503-3.57.393-.43.86-.54 1.147-.54.286 0 .573.004.823.018.266.015.623-.1.977.75.365.88 1.253 3.053 1.36 3.277.108.225.18.485.036.776-.143.29-.215.473-.43.725-.215.253-.448.56-.642.753-.215.215-.443.45-.194.88.25.43 1.11 1.83 2.382 2.966 1.636 1.46 3.017 1.91 3.447 2.126.43.215.68.18.932-.108.25-.29 1.075-1.253 1.36-1.685.287-.43.574-.358.968-.215.394.143 2.508 1.182 2.937 1.397.43.215.717.323.823.502.108.18.108 1.039-.187 1.87z"/>
            <span>💬 Confirmer sur WhatsApp / تأكيد الطلبية</span>
        </a>
        @endif
        
        <button type="button" class="btn btn--solid btn--blue btn-success-close" onclick="closeHappyModal()">
            Continuer mes achats
        </button>
    </div>
</div>

<style>
.clean-success-overlay {
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(26, 35, 58, 0.65);
    backdrop-filter: blur(4px);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 99999;
    animation: cleanFadeIn 0.25s ease-out;
}
.clean-success-content {
    background: #ffffff;
    width: 90%;
    max-width: 460px;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    padding: 35px 28px 28px;
    text-align: center;
    box-shadow: 0 12px 36px rgba(26, 35, 58, 0.15);
    transform: translateY(0);
    animation: cleanSlideUp 0.3s ease-out;
}
.clean-success-icon {
    display: flex;
    justify-content: center;
    margin-bottom: 18px;
}
.clean-success-title {
    font-size: 22px;
    font-weight: 700;
    color: #1a233a;
    margin-bottom: 6px;
    font-family: 'Inter', sans-serif;
}
.clean-success-subtitle {
    font-size: 14px;
    color: #5c6a82;
    margin-bottom: 22px;
    line-height: 1.5;
}
.clean-livraison-banner {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 14px 16px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 20px;
    text-align: left;
}
.banner-icon {
    flex-shrink: 0;
    margin-top: 2px;
}
.banner-text strong {
    display: block;
    color: #1a233a;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.2px;
}
.banner-text p {
    color: #5c6a82;
    font-size: 13px;
    margin: 4px 0 0 0;
    line-height: 1.4;
}
.clean-success-info {
    font-size: 13px;
    color: #475569;
    line-height: 1.5;
    margin-bottom: 18px;
    font-weight: 500;
}
.btn-whatsapp-confirm {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    background: #25D366;
    color: #ffffff !important;
    text-decoration: none !important;
    padding: 14px 20px;
    border-radius: 50px;
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 12px;
    box-shadow: 0 4px 15px rgba(37, 211, 102, 0.35);
    transition: all 0.2s ease;
}
.btn-whatsapp-confirm:hover {
    background: #20bd5a;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(37, 211, 102, 0.45);
}
.btn-success-close {
    width: 100%;
    background: #f1f5f9;
    color: #475569 !important;
    border: 1px solid #cbd5e1;
    padding: 12px 24px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}
.btn-success-close:hover {
    background: #e2e8f0;
    color: #1e293b !important;
}
@keyframes cleanFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
@keyframes cleanSlideUp {
    from { transform: translateY(16px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof emptyCart === 'function') {
            emptyCart();
        } else {
            localStorage.removeItem('cart_item');
            localStorage.removeItem('cart_items');
        }
    });

    function closeHappyModal() {
        var modal = document.getElementById('success-celebration-modal');
        if (modal) {
            modal.style.opacity = '0';
            modal.style.transition = 'opacity 0.3s ease';
            setTimeout(function() {
                modal.style.display = 'none';
            }, 300);
        }
    }
</script>
@endif
