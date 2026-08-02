<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion du Carrousel (Page d\'Accueil)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 font-medium shadow-sm border border-green-200">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 font-medium shadow-sm border border-red-200">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>⚠️ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Upload Box -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Ajouter des images au carrousel d'accueil</h3>
                <p class="text-sm text-gray-600 mb-6">
                    Vous pouvez sélectionner et importer <strong>une ou plusieurs images simultanément</strong>. Si votre carrousel contient 2 photos ou plus, les flèches de navigation (gauche ⬅️ / droite ➡️) et le défilement automatique s'activeront sur la page d'accueil !
                </p>

                <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Sélectionner les photos (Multiselect autorisé)</label>
                            <input type="file" name="images[]" accept="image/*" multiple required
                                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2">
                            <p class="text-xs text-gray-500 mt-1">Maintenez `Ctrl` (ou `Cmd` sur Mac) lors du clic pour choisir plusieurs photos.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Titre ou badge (Optionnel)</label>
                            <input type="text" name="title" placeholder="ex: Nouveautés Fragrances Mahta"
                                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Ce titre pourra servir de description ou badge au survol.</p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-blue-600 border border-transparent rounded-full font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none transition ease-in-out duration-150 shadow-md hover:shadow-lg">
                            + Envoyer et Enregistrer en Base
                        </button>
                    </div>
                </form>
            </div>

            <!-- Active Banners List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Bannières actuellement en ligne ({{ $banners->count() }})</h3>
                    @if($banners->count() >= 2)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-300">
                            🎉 Mode Carrousel (Défilement Gauche/Droite) Actif !
                        </span>
                    @elseif($banners->count() == 1)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 border border-blue-300">
                            ℹ️ 1 photo en ligne (Mode image fixe)
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800 border border-gray-300">
                            ℹ️ Image par défaut (accuel.webp) affichée
                        </span>
                    @endif
                </div>

                @if($banners->isEmpty())
                    <div class="text-center py-12 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="mt-2 text-sm text-gray-500 font-medium">Aucune bannière personnalisée pour l'instant.</p>
                        <p class="text-xs text-gray-400">L'image d'origine (accuel.webp) est affichée sur la boutique.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($banners as $banner)
                            <div class="border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-200 bg-white flex flex-col">
                                <div class="relative h-48 w-full bg-gray-100 overflow-hidden">
                                    <img src="{{ $banner->image_data }}" alt="{{ $banner->title ?? 'Bannière' }}" class="w-full h-full object-cover">
                                    <div class="absolute top-2 right-2 bg-black bg-opacity-70 text-white text-xs px-2.5 py-1 rounded-full font-bold">
                                        Ordre : #{{ $banner->sort_order }}
                                    </div>
                                    @if(!$banner->is_active)
                                        <div class="absolute inset-0 bg-red-900 bg-opacity-60 flex items-center justify-center text-white font-bold text-sm">
                                            Désactivée
                                        </div>
                                    @endif
                                </div>

                                <div class="p-4 flex-grow flex flex-col justify-between bg-gray-50 border-t">
                                    <form action="{{ route('admin.banners.update', $banner) }}" method="POST" class="space-y-3 mb-3">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <label class="block text-xs font-semibold text-gray-600 mb-1">Titre</label>
                                            <input type="text" name="title" value="{{ $banner->title }}" placeholder="Sans titre"
                                                   class="w-full text-xs border-gray-300 rounded p-1.5 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div class="flex items-center justify-between gap-2">
                                            <div class="w-1/2">
                                                <label class="block text-xs font-semibold text-gray-600 mb-1">Ordre d'affichage</label>
                                                <input type="number" name="sort_order" value="{{ $banner->sort_order }}" min="1"
                                                       class="w-full text-xs border-gray-300 rounded p-1.5 focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                            <div class="w-1/2 flex items-center pt-5">
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" name="is_active" value="1" {{ $banner->is_active ? 'checked' : '' }} class="rounded text-blue-600 border-gray-300 focus:ring-blue-500">
                                                    <span class="ml-2 text-xs font-semibold text-gray-700">En ligne</span>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="w-full bg-slate-800 text-white text-xs py-1.5 rounded font-medium hover:bg-slate-700 transition">
                                            💾 Enregistrer modifications
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" onsubmit="return confirm('Voulons-vous vraiment supprimer cette photo du carrousel ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 border border-red-200 text-xs py-1.5 rounded font-semibold transition">
                                            🗑️ Supprimer du carrousel
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
