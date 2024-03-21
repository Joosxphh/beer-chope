<x-layout>

    <div class="mb-6 flex justify-between">
    <h1 class="text-3xl font-bold mb-6">Les utilisateurs</h1>
    <a href="{{ route('user.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mb-4">Ajouter un utilisateur</a>
    </div>

    @foreach($users as $user)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex items-center p-4 mb-4">
            <div class="flex items-center ml-4">
                <h2 class="text-lg font-semibold mr-4">{{ $user->name }}</h2>
                <p class="text-gray-500 mr-4">ID de l'Utilisateur: {{ $user->id }}</p>
                <p class="text-gray-700 mr-4">{{ $user->email }}</p>
                <p class="text-gray-700 mr-4">{{ $user->role }}</p>
            </div>

            <!-- Boutons d'action alignés à droite -->
            <div class="ml-auto">
                <a href="{{ route('user.show', $user) }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-2 mr-2 w-44 text-center">Voir l'utilisateur</a>
                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mr-2">Modifier</button>
            </div>
        </div>
    @endforeach

</x-layout>
