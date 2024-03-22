<x-layout>
    <a href="{{ route('order.index') }}" class="text-blue-500 hover:text-blue-600">Revenir sur la liste des commandes</a>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden p-8 mb-4">
        <div class="flex justify-between">
            <!-- Produits de la commande -->
            <div class="w-1/2">
                <h2 class="text-lg font-semibold pt-4 mb-4">Produits de la Commande</h2>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Image</th>
                            <th class="px-4 py-2 text-left">Nom du Produit</th>
                            <th class="px-4 py-2 text-left">Quantité</th>
                            <th class="px-4 py-2 text-left">Prix Unitaire (€)</th>
                            <th class="px-4 py-2 text-left">Prix Total (€)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td class="border px-4 py-2">
                                    <img class="h-12" src="{{ asset('storage/covers/' . $item->product->image) }}" alt="Image du produit">
                                </td>
                                <td class="border px-4 py-2">{{ $item->product->name }}</td>
                                <td class="border px-4 py-2">{{ $item->quantity }}</td>
                                <td class="border px-4 py-2">{{ $item->product->price }}</td>
                                <td class="border px-4 py-2">{{ $item->product->price * $item->quantity }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-right font-bold">Prix total de la commande :</td>
                            <td class="border px-4 py-2">{{$order->total_price  }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Informations de la commande et de l'utilisateur -->
            <div class="w-1/2 ml-8">
                <h1 class="text-lg font-semibold">Commande #{{ $order->id }}</h1>
                <p class="text-gray-500">ID de la Commande: {{ $order->id }}</p>
                <p class="text-gray-700">Statut: {{ $order->status }}</p>
                <p class="text-gray-700">Créée le: {{ $order->created_at }}</p>
                <p class="text-gray-700">Modifiée le: {{ $order->updated_at }}</p>

                <h2 class="text-lg font-semibold pt-4 mt-6 mb-4">Informations du client</h2>
                <p class="text-gray-700">Nom de l'Utilisateur: {{ $order->user->name}}</p>
                <p class="text-gray-700">Email de l'Utilisateur: {{$order->user->email}}</p>
                <p class="text-gray-700 mb-8">Adresse {{ $order->user->address }}</p>

                @if($order->status == 'paid')
                    <form method="post" action="{{ route('order.validate', $order) }}">
                        @csrf
                        <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mr-2">Marquer la commande comme expédié</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-layout>
