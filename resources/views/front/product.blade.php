<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Fragrances Mahta</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($product->description ?: 'Découvrez ' . $product->name . ', soin capillaire d\'exception Fragrances Mahta.'), 160) }}">
    <meta name="keywords" content="{{ $product->name }}, soins capillaires, lissage Lizze, Fragrances Mahta, acheter cosmétique maroc">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{ $product->name }} - Fragrances Mahta">
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($product->description ?: $product->name . ' disponible sur la boutique officielle Fragrances Mahta.'), 200) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Fragrances Mahta">
    <meta property="og:image" content="{{ asset($product->image_url) }}">
    <meta property="product:price:amount" content="{{ $product->price }}">
    <meta property="product:price:currency" content="MAD">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v=2.0">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Product",
      "name": "{{ $product->name }}",
      "image": ["{{ asset($product->image_url) }}"],
      "description": "{{ \Illuminate\Support\Str::limit(strip_tags($product->description ?: $product->name . ' de la gamme Fragrances Mahta.'), 300) }}",
      "sku": "FM-{{ $product->id }}",
      "offers": {
        "@@type": "Offer",
        "url": "{{ url()->current() }}",
        "priceCurrency": "MAD",
        "price": "{{ $product->price }}",
        "priceValidUntil": "2027-12-31",
        "availability": "https://schema.org/InStock",
        "seller": {
          "@@type": "Organization",
          "name": "Fragrances Mahta"
        }
      }
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
        
        <!-- Product Detail Section -->
        <div class="product-detail">
            <!-- Left: Image -->
            <div class="product-detail__media">
                @if($product->image_data)
                    <img src="{{ $product->image_data }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('image/lizze/luxury_hair_straightener_advertisement.webp') }}" alt="{{ $product->name }}">
                @endif
            </div>

            <!-- Right: Info -->
            <div class="product-detail__info">
                <nav class="breadcrumb">
                    <a href="{{ route('home') }}">Ma boutique</a>
                    @if($product->collection)
                        <span>/</span> <a href="{{ route('catalogue') }}?collection={{ $product->collection->slug }}">{{ $product->collection->name }}</a>
                    @endif
                </nav>

                <h1 class="product-detail__title">{{ $product->name }}</h1>

                <div class="product-detail__price-container">
                    @if($product->original_price)
                        <span class="price-old">{{ number_format($product->original_price, 2) }} dh</span>
                    @endif
                    <span class="price-new">{{ number_format($product->price, 2) }} dh</span>
                    @if($product->original_price > $product->price)
                        <span class="badge badge--sale">En vente</span>
                    @endif
                </div>

                <div class="product-detail__quantity">
                    <label>Quantité</label>
                    <div class="quantity-selector">
                        <button type="button" class="qty-btn" onclick="updateQty(-1)">-</button>
                        <input type="number" id="qty-input" value="1" min="1" readonly>
                        <button type="button" class="qty-btn" onclick="updateQty(1)">+</button>
                    </div>
                </div>

                <div class="product-detail__actions">
                    <button type="button" class="btn btn--outline btn--full" onclick="addToCart({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }}, {{ $product->original_price ?: 'null' }}, document.querySelector('.product-detail__media img') ? document.querySelector('.product-detail__media img').src : '', parseInt(document.getElementById('qty-input').value) || 1)">Ajouter au panier</button>
                    <button type="button" class="btn btn--solid btn--full" onclick="buyNow({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }}, document.querySelector('.product-detail__media img') ? document.querySelector('.product-detail__media img').src : '')">Acheter maintenant</button>
                </div>

                <div class="product-detail__share">
                    <button class="btn-share">
                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                        Share
                    </button>
                </div>
            </div>
        </div>

        <!-- Cross-sell Section -->
        @if($relatedProducts->count() > 0)
        <div class="cross-sell-section">
            <h2 class="cross-sell-title">You may also like</h2>
            
            <div class="product-grid">
                @foreach($relatedProducts as $related)
                <div class="product-card">
                    <a href="{{ route('product', $related->slug) }}" class="product-card__link">
                        <div class="product-card__image-wrapper">
                            @if($related->image_data)
                                <img src="{{ $related->image_data }}" alt="{{ $related->name }}">
                            @else
                                <img src="{{ asset('image/lizze/luxury_hair_straightener_advertisement.webp') }}" alt="{{ $related->name }}">
                            @endif
                        </div>
                        <div class="product-card__info">
                            <h3 class="product-card__title">{{ $related->name }}</h3>
                            <div class="product-card__prices">
                                @if($related->original_price)
                                    <span class="price-old">{{ number_format($related->original_price, 2) }} dh</span>
                                @endif
                                <span class="price-new">{{ number_format($related->price, 2) }} dh</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

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
