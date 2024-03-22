<x-layout>
    <h1 class="text-3xl font-bold mb-6">Liste des commandes</h1>

    <div class="container mx-auto py-8">
        <!-- Tableau pour afficher les commandes -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créée le</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modifiée le</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <!-- Boucle pour afficher chaque commande -->
                @foreach($orders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
                        <td class="px-6 py-4 ">{{ $order->user->name }}, {{ $order->user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->total_price }} €</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->updated_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('order.show', $order) }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-2 mr-2 w-44 text-center">Voir la commande</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$orders->links()}}
</x-layout>
