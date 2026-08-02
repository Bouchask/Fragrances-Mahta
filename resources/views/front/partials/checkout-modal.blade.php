<!-- Checkout Modal -->
<div id="checkout-modal" class="checkout-modal" style="display: none;">
    <div class="checkout-modal__content">
        <div class="checkout-modal__header">
            <h2>Finaliser la commande</h2>
            <button type="button" class="checkout-modal__close" onclick="closeCheckout()">&times;</button>
        </div>
        <div class="checkout-modal__body">
            <form id="checkout-form" action="{{ route('checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="checkout-product-id" value="{{ isset($product) ? $product->id : '' }}">
                <input type="hidden" name="quantity" id="checkout-quantity" value="1">
                <input type="hidden" name="cart_data" id="checkout-cart-data" value="">
                
                <div class="form-group mb-4">
                    <label class="block text-sm font-medium mb-1">Nom complet</label>
                    <input type="text" name="name" required class="w-full border p-2 rounded" placeholder="Votre nom">
                </div>
                <div class="form-group mb-4">
                    <label class="block text-sm font-medium mb-1">Numéro de téléphone</label>
                    <input type="tel" name="phone" required class="w-full border p-2 rounded" placeholder="06XXXXXXXX">
                </div>
                <div class="form-group mb-4">
                    <label class="block text-sm font-medium mb-1">Adresse</label>
                    <input type="text" name="city" required class="w-full border p-2 rounded" placeholder="Votre adresse complète de livraison (avec ville)">
                </div>
                <button type="submit" class="btn btn--solid btn--full">Confirmer la commande</button>
            </form>
        </div>
    </div>
</div>

<style>
/* Quick inline styles for the modal */
.checkout-modal {
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}
.checkout-modal__content {
    background: #fff;
    width: 90%;
    max-width: 400px;
    border-radius: 8px;
    padding: 20px;
    position: relative;
}
.checkout-modal__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.checkout-modal__close {
    font-size: 24px;
    background: none;
    border: none;
    cursor: pointer;
}
.form-group {
    margin-bottom: 15px;
}
.form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
}
.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
            <span>💬 Confirmer sur WhatsApp (Wach disponible ?)</span>
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
