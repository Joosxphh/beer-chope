<x-layout>
    <a href="{{ route('order.index') }}" class="text-blue-500 hover:text-blue-600">Revenir sur la liste des commandes</a>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden p-8 mb-4">

            <h1 class="text-lg font-semibold">Commande #{{ $order->id }}</h1>
            <p class="text-gray-500">ID de la Commande: {{ $order->id }}</p>
            <p class="text-gray-700">Total: {{ $order->total_price }} €</p>
            <p class="text-gray-700">Statut: {{ $order->status }}</p>
            <p class="text-gray-700">Créée le: {{ $order->created_at }}</p>
            <p class="text-gray-700">Modifiée le: {{ $order->updated_at }}</p>
            

        <h2 class="text-lg font-semibold pt4 mt-6 mb-4">Informations du client </h2>

            <p class="text-gray-700">Nom de l'Utilisateur: {{ $order->user->name}}</p>
            <p class="text-gray-700">Email de l'Utilisateur: {{$order->user->email}}</p>
            <p class="text-gray-700 mb-8">Adresse {{ $order->user->address }}</p>

        <!-- Produits de la commande -->
            <h2 class="text-lg font-semibold pt4 mb-4">Produits de la Commande</h2>
            <ul>
                @foreach($order->items as $item)
                    <li class="flex shadow-lg m-8 p-8 justify-between items-center">
                        <img class=" h-20 object-cover object-center mr-4" src="{{ asset('storage/covers/' . $item->product->image) }}" alt="Image du produit">
                        <p>{{ $item->product->name }}</p>
                        <p>Quantité: {{ $item->quantity }}</p>
                        <p> Prix unité : {{$item->product->price }}</p>
                        <p>Prix: {{ $item->product->price *  $item->quantity}}</p>
                    </li>
                @endforeach
            </ul>

        @if($order->status == 'paid')
            <form method="post">
                @csrf
                <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mr-2">Valider la commande</button>
            </form>
        @endif

    </div>





</x-layout>
