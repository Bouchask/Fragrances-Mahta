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

    <main class="main-content">
        <div class="contact-page">
            <h1 class="page-title">Contact</h1>
            <div class="contact-form-container">
                <form class="contact-form" action="#" method="POST" onsubmit="event.preventDefault(); alert('Message envoyé !');">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name">Nom</label>
                            <input type="text" id="contact-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Email *</label>
                            <input type="email" id="contact-email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-phone">Téléphone</label>
                        <input type="tel" id="contact-phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Commentaire</label>
                        <textarea id="contact-message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn--solid btn--blue">Envoyer</button>
                </form>
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
</body>
</html>
