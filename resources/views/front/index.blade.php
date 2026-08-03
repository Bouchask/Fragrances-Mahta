<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragrances Mahta - Accueil | Soins Capillaires & Parfumerie d'Exception</title>
    <meta name="description" content="Découvrez Fragrances Mahta, votre boutique de confiance pour les élixirs capillaires, produits de lissage professionnel Lizze et cosmétiques d'exception. Commandez en toute sécurité avec paiement à la livraison au Maroc.">
    <meta name="keywords" content="Fragrances Mahta, soins capillaires, lissage Lizze, parfums luxe, élixir capillaire, cosmétiques Maroc, livraison gratuite, paiement à la livraison">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Fragrances Mahta - Accueil | Soins Capillaires & Parfumerie">
    <meta property="og:description" content="Boutique en ligne officielle de soins capillaires professionnels et élixirs de beauté avec livraison au Maroc et paiement à la réception.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Fragrances Mahta">
    <meta property="og:image" content="{{ asset('image/accuel.webp') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Fragrances Mahta - Accueil">
    <meta name="twitter:description" content="Soins capillaires professionnels et élixirs d'exception avec paiement à la livraison.">
    <meta name="twitter:image" content="{{ asset('image/accuel.webp') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v=2.0">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Store",
      "name": "Fragrances Mahta",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('favicon.svg') }}",
      "description": "Boutique en ligne officielle de soins capillaires professionnels Lizze et élixirs de beauté au Maroc.",
      "image": "{{ asset('image/accuel.webp') }}",
      "priceRange": "$$"
    }
    </script>
    @include('front.partials.analytics')
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

    <main class="main-content homepage-content">
        
        <!-- Hero Banner / Carousel -->
        @if(isset($banners) && $banners->count() >= 2)
            <div class="hero-carousel-container" id="heroCarousel">
                @foreach($banners as $index => $banner)
                    <div class="hero-carousel-slide {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ $banner->image_data }}" alt="{{ $banner->title ?? 'Fragrances Mahta' }}" class="hero-banner__image">
                    </div>
                @endforeach

                <button class="hero-carousel-btn hero-carousel-btn--prev" onclick="changeSlide(-1)" aria-label="Précédent">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button class="hero-carousel-btn hero-carousel-btn--next" onclick="changeSlide(1)" aria-label="Suivant">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>

                <div class="hero-carousel-dots">
                    @foreach($banners as $index => $banner)
                        <span class="hero-carousel-dot {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></span>
                    @endforeach
                </div>
            </div>

            <script>
                let currentSlide = 0;
                let slides, dots, slideInterval;

                function showSlide(n) {
                    if (!slides || slides.length === 0) return;
                    slides[currentSlide].classList.remove('active');
                    dots[currentSlide].classList.remove('active');
                    currentSlide = (n + slides.length) % slides.length;
                    slides[currentSlide].classList.add('active');
                    dots[currentSlide].classList.add('active');
                }

                function changeSlide(direction) {
                    showSlide(currentSlide + direction);
                    resetTimer();
                }

                function goToSlide(index) {
                    showSlide(index);
                    resetTimer();
                }

                function startTimer() {
                    if (slideInterval) clearInterval(slideInterval);
                    slideInterval = setInterval(() => { showSlide(currentSlide + 1); }, 5000);
                }

                function resetTimer() {
                    clearInterval(slideInterval);
                    startTimer();
                }

                document.addEventListener("DOMContentLoaded", function() {
                    slides = document.querySelectorAll('.hero-carousel-slide');
                    dots = document.querySelectorAll('.hero-carousel-dot');
                    startTimer();
                });
            </script>
        @elseif(isset($banners) && $banners->count() == 1)
            <section class="hero-banner">
                <img src="{{ $banners->first()->image_data }}" alt="{{ $banners->first()->title ?? 'Fragrances Mahta' }}" class="hero-banner__image">
            </section>
        @else
            <section class="hero-banner">
                <img src="{{ asset('image/accuel.webp') }}" alt="Fragrances Mahta" class="hero-banner__image">
            </section>
        @endif

        <!-- Collections Section -->
        <section class="collections-section">
            <h1 class="section-heading">Collections</h1>
            
            <div class="product-grid">
                @foreach($collections as $collection)
                <div class="collection-card">
                    <a href="{{ route('catalogue') }}?collection={{ $collection->slug }}" class="collection-card__link">
                        <div class="collection-card__image-wrapper">
                            @if($collection->image_data)
                                <img src="{{ $collection->image_data }}" alt="{{ $collection->name }}">
                            @else
                                <img src="{{ asset('image/lizze/lizze_hair_straightener_macro.webp') }}" alt="{{ $collection->name }}">
                            @endif
                            @if($collection->description)
                                <span class="collection-badge">{{ Str::limit($collection->description, 20) }}</span>
                            @endif
                        </div>
                        <h3 class="collection-card__title">{{ $collection->name }} &rarr;</h3>
                    </a>
                </div>
                @endforeach

            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer__logo">
            <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;"><h2>Fragrances Mahta</h2></a>
        </div>
        <div class="footer__socials" style="display: flex; gap: 16px; justify-content: center; align-items: center; margin: 15px 0;">
            @include('front.partials.social-icons')
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
