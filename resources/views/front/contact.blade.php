<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact & Service Client - Fragrances Mahta</title>
    <meta name="description" content="Contacter le service client Fragrances Mahta pour vos commandes de soins capillaires, élixirs et lissages professionnels au Maroc. Assistance rapide et professionnelle.">
    <meta name="keywords" content="Contact Fragrances Mahta, service client, téléphone cosmétique maroc, assistance commande">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Contact & Service Client - Fragrances Mahta">
    <meta property="og:description" content="Besoin d'aide ou d'un renseignement sur nos produits ? Contactez l'équipe Fragrances Mahta.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Fragrances Mahta">
    <meta property="og:image" content="{{ asset('image/accuel.webp') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v=2.0">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "ContactPage",
      "name": "Contact & Service Client - Fragrances Mahta",
      "url": "{{ url()->current() }}",
      "description": "Page de contact officielle et support client pour Fragrances Mahta au Maroc."
    }
    </script>
</head>
<body>


    <!-- Header -->
    <header class="header">
        <div class="header__container">
            <div class="header__icon-left">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" class="hamburger-icon" onclick="openMobileNav()"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </div>
            
            <div class="header__logo">
                <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">
                    <h2 style="display: inline-flex; align-items: center; gap: 10px; margin: 0;">
                        <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" style="color: #cbd5e1; flex-shrink: 0;"><path d="M3 7l1-4h16l1 4"></path><path d="M2 7h20v4a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2 2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2 2 2 0 0 1-2 2H9a2 2 0 0 1-2-2 2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7z"></path><path d="M4 13v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7"></path><line x1="12" y1="17" x2="12" y2="22"></line></svg>
                        <span>Fragrances Mahta</span>
                    </h2>
                </a>
            </div>
            
            <div class="header__icons-right">
                <svg viewBox="0 0 24 24" width="22" height="22" stroke="currentColor" stroke-width="2" fill="none" class="cart-icon" onclick="openCart()" style="cursor: pointer;"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
            </div>
        </div>
        <nav class="header__nav">
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('catalogue') }}">Catalogue</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content" style="background-color: #f8fafc; min-height: calc(100vh - 300px); padding-bottom: 80px;">
        <!-- Luxury Hero Banner -->
        <section class="contact-hero">
            <div class="contact-hero__glow"></div>
            <div class="contact-hero__container">
                <span class="contact-hero__tag">✨ Service Client & Assistance Au Maroc</span>
                <h1 class="contact-hero__title">Comment pouvons-nous vous aider ?</h1>
                <p class="contact-hero__subtitle">
                    Que vous ayez une question sur nos soins capillaires, un besoin de conseil personnalisé ou pour suivre votre expédition, notre équipe chez <strong style="color: #60a5fa;">Fragrances Mahta</strong> est à votre disposition.
                </p>
            </div>
        </section>

        <div class="contact-main-wrapper">
            <!-- 3 Interactive Action Cards -->
            <div class="contact-cards-grid">
                <!-- Card 1: WhatsApp Live Support -->
                <div class="contact-card contact-card--featured">
                    <div class="contact-card__icon contact-card__icon--green">
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor"><path d="M11.944 0A12 12 0 0 0 0 12a11.96 11.96 0 0 0 1.944 6.556L.067 24l5.63-1.852A11.96 11.96 0 0 0 11.944 24c6.627 0 12-5.373 12-12s-5.373-12-12-12zm6.98 17.15c-.295.83-1.72 1.583-2.38 1.66-.662.08-1.52.122-4.9-1.28-4.32-1.79-7.085-6.215-7.302-6.505-.215-.29-1.74-2.32-1.74-4.426 0-2.107 1.11-3.14 1.503-3.57.393-.43.86-.54 1.147-.54.286 0 .573.004.823.018.266.015.623-.1.977.75.365.88 1.253 3.053 1.36 3.277.108.225.18.485.036.776-.143.29-.215.473-.43.725-.215.253-.448.56-.642.753-.215.215-.443.45-.194.88.25.43 1.11 1.83 2.382 2.966 1.636 1.46 3.017 1.91 3.447 2.126.43.215.68.18.932-.108.25-.29 1.075-1.253 1.36-1.685.287-.43.574-.358.968-.215.394.143 2.508 1.182 2.937 1.397.43.215.717.323.823.502.108.18.108 1.039-.187 1.87z"/></svg>
                    </div>
                    <h3 class="contact-card__title">Assistance WhatsApp</h3>
                    <p class="contact-card__text">Le moyen le plus rapide pour joindre notre équipe. Réponse en direct pour vous orienter ou valider une commande.</p>
                    <a href="https://api.whatsapp.com/send?phone=212639048453&text=Salam%20Fragrances%20Mahta%20%F0%9F%8C%B8%20J%27ai%20une%20question%20sur%20vos%20produits%20!" target="_blank" class="contact-card__btn contact-card__btn--whatsapp">
                        <span>💬 Discuter au +212 639-048453</span>
                    </a>
                </div>

                <!-- Card 2: Free Shipping Info -->
                <div class="contact-card">
                    <div class="contact-card__icon contact-card__icon--blue">
                        <svg viewBox="0 0 24 24" width="26" height="26" stroke="currentColor" stroke-width="2" fill="none"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <h3 class="contact-card__title">Expédition & Livraison</h3>
                    <p class="contact-card__text">Livraison gratuite (Tawsil Fabor) à domicile et en point relais partout au Maroc. Règlement en espèces à la réception.</p>
                    <div class="contact-card__badge-wrap">
                        <span class="contact-card__badge">🚀 Expédition rapide en 24/48h</span>
                    </div>
                </div>

                <!-- Card 3: Quality & Socials -->
                <div class="contact-card">
                    <div class="contact-card__icon contact-card__icon--purple">
                        <svg viewBox="0 0 24 24" width="26" height="26" stroke="currentColor" stroke-width="2" fill="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    </div>
                    <h3 class="contact-card__title">Qualité & Garantie</h3>
                    <p class="contact-card__text">Nos soins (Enzo Macadamia, Lizze Extrême...) sont 100% originaux et certifiés pour un lissage et une brillance parfaits.</p>
                    <div class="contact-card__socials-box">
                        <span style="font-size: 13px; font-weight: 600; color: #475569;">Rejoignez notre communauté :</span>
                        <div style="display: flex; gap: 12px; margin-top: 8px;">
                            @include('front.partials.social-icons')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modern Form Section -->
            <div class="contact-form-card">
                <div class="contact-form-card__left">
                    <span class="contact-form-card__eyebrow">MESSAGE DIRECT</span>
                    <h2 class="contact-form-card__heading">Envoyez-nous un Message</h2>
                    <p class="contact-form-card__intro">
                        Remplissez vos informations ci-dessous. Au clic sur envoyer, votre message sera automatiquement préparé sur WhatsApp vers notre ligne directe pour une prise en charge immédiate.
                    </p>
                    <ul class="contact-perks-list">
                        <li>
                            <span class="perk-icon">✓</span>
                            <span><strong>Conseil Beauté & Soin :</strong> Nos spécialistes vous guident pour choisir le rituel adapté à vos cheveux.</span>
                        </li>
                        <li>
                            <span class="perk-icon">✓</span>
                            <span><strong>Support Commandes :</strong> Modification de livraison ou confirmation de date de passage du livreur.</span>
                        </li>
                        <li>
                            <span class="perk-icon">✓</span>
                            <span><strong>Disponibilité Garantie :</strong> Notre équipe est disponible du Lundi au Samedi (9h - 20h).</span>
                        </li>
                    </ul>
                </div>

                <div class="contact-form-card__right">
                    <form id="interactive-contact-form" onsubmit="handleContactSubmit(event)">
                        <div class="c-form-group">
                            <label class="c-label">Nom Complet <span style="color: #ef4444;">*</span></label>
                            <div class="c-input-wrap">
                                <svg class="c-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <input type="text" id="c-name" required class="c-input" placeholder="Ex: Yadi Imad">
                            </div>
                        </div>

                        <div class="c-form-group">
                            <label class="c-label">Numéro de Téléphone <span style="color: #ef4444;">*</span></label>
                            <div class="c-input-wrap">
                                <svg class="c-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <input type="tel" id="c-phone" required class="c-input" placeholder="Ex: 0614531670">
                            </div>
                        </div>

                        <div class="c-form-group">
                            <label class="c-label">Sujet de la demande</label>
                            <div class="c-input-wrap">
                                <svg class="c-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                <input type="text" id="c-subject" class="c-input" placeholder="Ex: Information sur Enzo Macadamia">
                            </div>
                        </div>

                        <div class="c-form-group">
                            <label class="c-label">Votre Message <span style="color: #ef4444;">*</span></label>
                            <textarea id="c-message" rows="4" required class="c-textarea" placeholder="Détaillez ici votre question ou votre demande..."></textarea>
                        </div>

                        <button type="submit" class="btn-submit-contact">
                            <span>🚀 Envoyer le message (via WhatsApp Direct)</span>
                        </button>

                        <p style="font-size: 12px; color: #64748b; margin-top: 10px; text-align: center;">
                            🔒 Vos données sont confidentielles et utilisées uniquement pour vous répondre.
                        </p>
                    </form>
                    
                    <div id="c-success-banner" style="display: none; margin-top: 20px; background: #ecfdf5; border: 1px solid #10b981; padding: 15px; border-radius: 12px; text-align: center;">
                        <span style="font-size: 24px; display: block; margin-bottom: 5px;">🎉✨</span>
                        <h4 style="color: #065f46; font-size: 15px; font-weight: 700; margin: 0 0 5px;">Message transmis avec succès !</h4>
                        <p style="color: #047857; font-size: 13px; margin: 0;">Notre application WhatsApp vient d'être déclenchée avec votre message. Nous allons vous répondre très rapidement !</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer__content">
            <div class="footer__block">
                <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;"><h3>Fragrances Mahta</h3></a>
                <p>Découvrez notre sélection exclusive de parfums authentiques, décants, et soins capillaires.</p>
                <div style="display: flex; gap: 16px; align-items: center; margin-top: 15px;">
                    @include('front.partials.social-icons')
                </div>
            </div>
            <div class="footer__block">
                <h3>Liens Rapides</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('catalogue') }}">Catalogue</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="footer__block">
                <h3>Service Client</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Politique de retour</a></li>
                    <li><a href="#">Expédition & Livraison</a></li>
                </ul>
            </div>
        </div>
        <div class="footer__bottom">
            <p>&copy; 2026, Fragrances Mahta. Tous droits réservés.</p>
        </div>
    </footer>

    @include('front.partials.cart-drawer')

    <!-- Mobile Nav Drawer -->
    <aside class="mobile-nav-drawer" id="mobile-nav-drawer">
        <div class="mobile-nav__header">
            <button class="mobile-nav__close" onclick="closeMobileNav()">
                <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" stroke-width="1.5" fill="none"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        
        <nav class="mobile-nav__menu">
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('catalogue') }}">Catalogue</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>

        <div class="mobile-nav__footer">
            <div class="mobile-nav__socials" style="display: flex; gap: 16px; align-items: center; justify-content: center; width: 100%; margin-top: 10px;">
                @include('front.partials.social-icons')
            </div>
        </div>
    </aside>

    @include('front.partials.checkout-modal')
    <script src="{{ asset('script.js') }}"></script>
    <style>
    /* ============================================================
       ULTRA-PREMIUM CONTACT PAGE DESIGN
       ============================================================ */
    .contact-hero {
        position: relative;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #1e1b4b 100%);
        color: #ffffff;
        padding: 70px 20px 85px;
        text-align: center;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .contact-hero__glow {
        position: absolute;
        top: -50px;
        right: 15%;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(59, 91, 219, 0.25) 0%, rgba(255,255,255,0) 70%);
        pointer-events: none;
    }
    .contact-hero__container {
        position: relative;
        max-width: 780px;
        margin: 0 auto;
        z-index: 2;
    }
    .contact-hero__tag {
        display: inline-block;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 6px 16px;
        border-radius: 99px;
        font-size: 13px;
        font-weight: 700;
        color: #93c5fd;
        margin-bottom: 18px;
        letter-spacing: 0.5px;
    }
    .contact-hero__title {
        font-size: 38px;
        font-weight: 900;
        margin: 0 0 16px 0;
        line-height: 1.2;
        background: linear-gradient(to right, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    @media (max-width: 640px) {
        .contact-hero__title { font-size: 28px; }
    }
    .contact-hero__subtitle {
        font-size: 16px;
        line-height: 1.6;
        color: #cbd5e1;
        margin: 0 auto;
        max-width: 660px;
    }
    .contact-main-wrapper {
        max-width: 1160px;
        margin: -50px auto 0;
        padding: 0 20px;
        position: relative;
        z-index: 10;
        box-sizing: border-box;
    }
    .contact-cards-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-bottom: 40px;
    }
    @media (max-width: 900px) {
        .contact-cards-grid { grid-template-columns: 1fr; }
    }
    .contact-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 28px 24px;
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08), 0 8px 10px -6px rgba(15, 23, 42, 0.04);
        border: 1px solid #e2e8f0;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        box-sizing: border-box;
    }
    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 30px -10px rgba(15, 23, 42, 0.15);
    }
    .contact-card--featured {
        border: 2px solid #10b981;
        background: linear-gradient(180deg, #ffffff 0%, #f0fdf4 100%);
    }
    .contact-card__icon {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.06);
    }
    .contact-card__icon--green { background: #dcfce7; color: #16a34a; }
    .contact-card__icon--blue { background: #dbeafe; color: #2563eb; }
    .contact-card__icon--purple { background: #f3e8ff; color: #9333ea; }
    
    .contact-card__title {
        font-size: 19px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 10px 0;
    }
    .contact-card__text {
        font-size: 14px;
        color: #475569;
        line-height: 1.55;
        flex-grow: 1;
        margin: 0 0 22px 0;
    }
    .contact-card__btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 13px 18px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.2s;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .contact-card__btn--whatsapp {
        background: #10b981;
        color: #ffffff !important;
    }
    .contact-card__btn--whatsapp:hover {
        background: #059669;
        transform: scale(1.02);
    }
    .contact-card__badge-wrap {
        margin-top: auto;
    }
    .contact-card__badge {
        display: inline-block;
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #bfdbfe;
        font-size: 13px;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 8px;
    }
    .contact-card__socials-box {
        margin-top: auto;
        border-top: 1px dashed #cbd5e1;
        padding-top: 14px;
    }
    
    /* Form Section Card */
    .contact-form-card {
        background: #ffffff;
        border-radius: 22px;
        box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.1);
        border: 1px solid #e2e8f0;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1fr 1.2fr;
    }
    @media (max-width: 900px) {
        .contact-form-card { grid-template-columns: 1fr; }
    }
    .contact-form-card__left {
        background: #0f172a;
        color: #ffffff;
        padding: 46px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-sizing: border-box;
    }
    .contact-form-card__eyebrow {
        font-size: 12px;
        font-weight: 800;
        color: #60a5fa;
        letter-spacing: 1.5px;
        margin-bottom: 10px;
        display: block;
    }
    .contact-form-card__heading {
        font-size: 30px;
        font-weight: 900;
        margin: 0 0 16px 0;
        color: #ffffff;
        line-height: 1.25;
    }
    .contact-form-card__intro {
        font-size: 15px;
        color: #94a3b8;
        line-height: 1.6;
        margin: 0 0 32px 0;
    }
    .contact-perks-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .contact-perks-list li {
        display: flex;
        gap: 14px;
        align-items: flex-start;
        font-size: 14px;
        color: #cbd5e1;
        line-height: 1.5;
    }
    .perk-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #3b82f6;
        color: #ffffff;
        font-weight: 800;
        font-size: 13px;
        flex-shrink: 0;
        margin-top: 2px;
    }
    
    .contact-form-card__right {
        padding: 46px 42px;
        background: #ffffff;
        box-sizing: border-box;
    }
    @media (max-width: 640px) {
        .contact-form-card__left, .contact-form-card__right { padding: 32px 24px; }
    }
    .c-form-group {
        margin-bottom: 18px;
    }
    .c-label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 6px;
    }
    .c-input-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }
    .c-icon {
        position: absolute;
        left: 14px;
        color: #64748b;
        pointer-events: none;
    }
    .c-input {
        width: 100%;
        padding: 13px 14px 13px 44px;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        font-size: 14px;
        color: #1e293b;
        background: #f8fafc;
        transition: all 0.2s;
        font-family: inherit;
        box-sizing: border-box;
    }
    .c-input:focus {
        outline: none;
        border-color: #3b5bdb;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(59, 91, 219, 0.12);
    }
    .c-textarea {
        width: 100%;
        padding: 13px 14px;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        font-size: 14px;
        color: #1e293b;
        background: #f8fafc;
        transition: all 0.2s;
        font-family: inherit;
        resize: vertical;
        box-sizing: border-box;
    }
    .c-textarea:focus {
        outline: none;
        border-color: #3b5bdb;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(59, 91, 219, 0.12);
    }
    .btn-submit-contact {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff;
        font-size: 15px;
        font-weight: 800;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.25s;
        box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3);
        margin-top: 8px;
    }
    .btn-submit-contact:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 20px -3px rgba(16, 185, 129, 0.4);
    }
    </style>
    <script>
    function handleContactSubmit(e) {
        e.preventDefault();
        const name = document.getElementById('c-name').value;
        const phone = document.getElementById('c-phone').value;
        const subject = document.getElementById('c-subject').value || 'Demande de renseignement';
        const message = document.getElementById('c-message').value;

        let whatsappText = `Salam Fragrances Mahta! 🌸\n\n`;
        whatsappText += `👤 *Nom* : ${name}\n`;
        whatsappText += `📞 *Téléphone* : ${phone}\n`;
        whatsappText += `📌 *Sujet* : ${subject}\n\n`;
        whatsappText += `💬 *Message* :\n${message}`;

        const url = `https://api.whatsapp.com/send?phone=212639048453&text=${encodeURIComponent(whatsappText)}`;
        
        const banner = document.getElementById('c-success-banner');
        if (banner) {
            banner.style.display = 'block';
            banner.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        window.open(url, '_blank');
    }
    </script>
</body>
</html>
