<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Fragrances Mahta</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
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
                <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;"><h2>Fragrances Mahta</h2></a>
            </div>
            
            <div class="header__icons-right">
                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" class="cart-icon" onclick="openCart()"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
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
            <p>&copy; 2026, Fragrances Mahta. · <a href="{{ route('login') }}" style="text-decoration: underline;">Admin Login</a></p>
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
            <a href="#" class="mobile-nav__login">
                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                Connexion
            </a>
            <div class="mobile-nav__socials" style="display: flex; gap: 16px; align-items: center;">
                @include('front.partials.social-icons')
            </div>
        </div>
    </aside>

    @include('front.partials.checkout-modal')
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>
