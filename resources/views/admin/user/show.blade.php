<x-layout>

    <a href="{{ route('user.index') }}" class="text-blue-500 hover:text-blue-600">Revenir sur la liste des utilisateurs</a>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden p-8 mb-4">

            <h2 class="text-lg font-semibold">{{ $user->name }}</h2>
            <p class="text-gray-500">ID de l'Utilisateur: {{ $user->id }}</p>
            <p class="text-gray-700">Email: {{ $user->email}}</p>
            <p class="text-gray-700 mb-8">Rôle: {{$user->role->role}}</p>

        <!-- Historique des commandes -->
            <h3 class="text-lg font-semibold pt4 mb-4">Historique des Commandes</h3>
            <ul>
                <!-- Exemple de commande -->
                <li class="mb-4">
                    <p class="text-gray-700">Commande #1: Nom du Produit 1, Nom du Produit 2, ...</p>
                    <p class="text-gray-500">Date de Commande: 2024-02-22</p>
                </li>
            </ul>

        <!-- Boutons d'action alignés à droite -->
        <div class="mt-16 flex gap-4">
            <a href="{{ route('user.edit', $user) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded  mr-2">Modifier l'utilisateur</a>
            <form action="{{ route('user.destroy', $user) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded mr-2">Supprimer l'utilisateur</button>
            </form>
        </div>
    </div>


</x-layout>
