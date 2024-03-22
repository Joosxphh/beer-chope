<x-layout>
    <h1 class=" font-bold text-3xl mb-10 "> Tableau de bord</h1>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Catégorie 1 --}}
            <div class="bg-white rounded-md shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Nombre total d'utilisateurs</h3>
                <p class="text-4xl font-semibold text-green-500">{{ $users->count() }}</p>
            </div>
            {{-- Catégorie 2 --}}
            <div class="bg-white rounded-md shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Nombre total de commandes</h3>
                <p class="text-4xl font-semibold text-green-500">{{ $orders->count() }}</p>
            </div>
            {{-- Catégorie 3 --}}
            <div class="bg-white rounded-md shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Nombre total de produits</h3>
                <p class="text-4xl font-semibold text-green-500">{{ $products->count() }}</p>
            </div>
            {{-- Catégorie 4 --}}
            <div class="bg-white rounded-md shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Prix total de ventes</h3>
                <p class="text-4xl font-semibold text-green-500">10,000 €</p>
            </div>
        </div>
    </div>
</x-layout>
