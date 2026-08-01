<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soins Capillaires - Fragrances Mahta</title>
    <!-- Using a modern sans-serif to match the clean look -->
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
        <!-- Collection Header -->
        <div class="collection-header">
            <h1 class="collection-title">{{ $currentCollection ? $currentCollection->name : 'Tous les Produits' }}</h1>
            @if($currentCollection && $currentCollection->description)
                <p style="text-align: center; margin-top: 10px; color: #666; max-width: 700px; margin-left: auto; margin-right: auto;">{{ $currentCollection->description }}</p>
            @endif
        </div>

        <!-- Filters Row -->
        <div class="collection-filters">
            <div class="filters-left">
                @if($currentCollection)
                    <a href="{{ route('catalogue') }}" class="btn btn--outline" style="padding: 6px 12px; font-size: 14px; text-decoration: none;">&times; Supprimer le filtre ({{ $currentCollection->name }})</a>
                @endif
            </div>
            <div class="filters-right">
                <form method="GET" action="{{ route('catalogue') }}" class="sort-container" style="display: inline-flex; align-items: center; gap: 8px;">
                    @if(request('collection'))
                        <input type="hidden" name="collection" value="{{ request('collection') }}">
                    @endif
                    <span class="filter-label">Trier par :</span>
                    <select name="sort" class="sort-select" onchange="this.form.submit()">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>En vedette</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Prix croissant</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Prix décroissant</option>
                    </select>
                </form>
                <span class="product-count">{{ $products->count() }} produit{{ $products->count() > 1 ? 's' : '' }}</span>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="product-grid">
            @forelse($products as $product)
            <div class="product-card">
                <a href="{{ route('product', $product->slug) }}" class="product-card__link">
                    <div class="product-card__image-wrapper">
                        @if($product->original_price > $product->price)
                            <span class="badge badge--sale">En vente</span>
                        @endif
                        @if($product->image_data)
                            <img src="{{ $product->image_data }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('image/lizze/luxury_hair_straightener_advertisement.webp') }}" alt="{{ $product->name }}">
                        @endif
                    </div>
                    <div class="product-card__info">
                        <h3 class="product-card__title">{{ $product->name }}</h3>
                        <div class="product-card__prices">
                            @if($product->original_price)
                                <span class="price-old">{{ number_format($product->original_price, 2) }} dh</span>
                            @endif
                            <span class="price-new">{{ number_format($product->price, 2) }} dh</span>
                        </div>
                    </div>
                </a>
                <div class="product-card__action">
                    <button type="button" class="btn btn--outline" onclick="addToCart({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }}, {{ $product->original_price ?: 'null' }}, this.closest('.product-card').querySelector('img').src, 1)">Ajouter au panier</button>
                </div>
            </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px 20px;">
                    <p style="font-size: 18px; color: #666;">Aucun produit disponible dans cette sélection.</p>
                </div>
            @endforelse
        </div>
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
            <p>&copy; 2026, Ma boutique · <a href="{{ route('login') }}" style="text-decoration: underline;">Admin Login</a></p>
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
