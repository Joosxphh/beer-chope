<x-layout>
    <h1 class="text-3xl font-bold mb-6">Liste des commandes</h1>

        <div class="container mx-auto py-8">

            <!-- Liste des commandes -->
            <div class="space-y-4">
                <!-- Boucle pour afficher chaque commande -->
                @foreach($orders as $order)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <!-- En-tête de l'accordéon -->
                        <div class="p-4 cursor-pointer flex justify-between items-center">
                            <h2 class="text-xl font-semibold">#{{ $order->id }}</h2>
                            <p class="text-gray-700">ID de la Commande: {{ $order->id }}</p>
                            <p class="text-gray-700">Total: {{ $order->total_price }} €</p>
                            <p class="text-gray-700">Statut: {{ $order->status }}</p>
                            <p class="text-gray-700">Créée le: {{ $order->created_at }}</p>
                            <p class="text-gray-700">Modifiée le: {{ $order->updated_at }}</p>
                            <a href="{{ route('order.show', $order) }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-2 mr-2 w-44 text-center">Voir la commande</a>

                        </div>
                    </div>
                @endforeach
</x-layout>
