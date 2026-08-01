<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Orders Stat -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 uppercase font-bold tracking-wide">Commandes</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $stats['orders'] }}</h3>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                </div>

                <!-- Products Stat -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 uppercase font-bold tracking-wide">Produits</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $stats['products'] }}</h3>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                </div>

                <!-- Collections Stat -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 uppercase font-bold tracking-wide">Collections</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $stats['collections'] }}</h3>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bienvenue sur votre tableau de bord ! Utilisez le menu pour gérer votre boutique.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
