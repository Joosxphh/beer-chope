<x-layout>

    <div class="mb-6 flex justify-between">
        <h1 class="text-3xl font-bold mb-6">Les utilisateurs</h1>
        <a href="{{ route('user.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mb-4">Ajouter un utilisateur</a>
    </div>

    <div class="max-w-screen-xl mx-auto overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID de l'utilisateur</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->role->role }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('user.show', $user) }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-2 mr-2 w-44 text-center">Voir l'utilisateur</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$users->links()}}
</x-layout>
