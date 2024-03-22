<x-layout>
    <h1 class="font-bold text-3xl mb-10">Tableau de bord</h1>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            {{-- Catégorie 1 --}}
            <div class="bg-white rounded-md shadow-md p-6 sm:col-span-1">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Nombre total d'utilisateurs</h3>
                <p class="text-4xl font-semibold text-green-500">{{ $users->count() }}</p>
            </div>
            {{-- Catégorie 2 --}}
            <div class="bg-white rounded-md shadow-md p-6 sm:col-span-1">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Nombre total de commandes</h3>
                <p class="text-4xl font-semibold text-green-500">{{ $orders->count() }}</p>
            </div>
            {{-- Catégorie 3 --}}
            <div class="bg-white rounded-md shadow-md p-6 sm:col-span-1">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Nombre total de produits</h3>
                <p class="text-4xl font-semibold text-green-500">{{ $products->count() }}</p>
            </div>
            {{-- Catégorie 4 --}}
            <div class="bg-white rounded-md shadow-md p-6 sm:col-span-1">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Prix total des ventes</h3>
                <p class="text-4xl font-semibold text-green-500">{{ $totalPaidOrders }} €</p>
            </div>
            {{-- Catégorie 5 - Commandes à valider --}}
            <div class="bg-white rounded-md shadow-md p-6 sm:col-span-1">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Commandes à envoyer</h3>
                <p class="text-4xl font-semibold text-green-500">{{ $paidOrdersCount }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
            {{-- 5 dernières commandes finalisées --}}
            <div class="bg-white rounded-md shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">5 dernières commandes finalisées</h3>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">ID de la commande</th>
                            <th class="px-4 py-2 text-left">Nom de la personne</th>
                            <th class="px-4 py-2 text-left">Prix total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ordersLatest as $orderLatest)
                            <tr>
                                <td class="border px-4 py-2">{{ $orderLatest->id }}</td>
                                <td class="border px-4 py-2">{{ $orderLatest->user->name }}</td>
                                <td class="border px-4 py-2">{{ $orderLatest->total_price }} €</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 5 derniers utilisateurs inscrits --}}
            <div class="bg-white rounded-md shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">5 derniers utilisateurs inscrits</h3>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Nom</th>
                            <th class="px-4 py-2 text-left">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usersLatest as $userLatest)
                            <tr>
                                <td class="border px-4 py-2">{{ $userLatest->name }}</td>
                                <td class="border px-4 py-2">{{ $userLatest->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
