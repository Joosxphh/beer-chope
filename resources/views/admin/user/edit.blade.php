<x-layout>
    <a href="{{ route('user.index') }}" class="text-blue-500 hover:text-blue-600">Retourner sur la liste des utilisateurs</a>

    <div class="max-w-2xl mx-auto p-8 bg-white shadow-md" style="min-height: 92vh;">
        <h1 class="text-3xl font-bold mb-6">Modifier un utilisateur</h1>

        <form action="{{ route('user.update', $user) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-semibold">Nom :</label>
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-semibold">Email :</label>
                @error('email')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-600 font-semibold">Adresse :</label>
                @error('address')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="address" value="{{ $user->address }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-600 font-semibold">Role :</label>
                @error('role_id')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <select name="role_id" class="w-full border border-gray-300 p-2 rounded" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier l'utilisateur</button>
        </form>
    </div>
</x-layout>
