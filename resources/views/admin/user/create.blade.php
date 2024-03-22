<x-layout>
    <x-slot name="title">Créer un nouvel utilisateur</x-slot>
    <form action="{{ route('user.store') }}" method="post" class=" bg-white shadow-lg rounded-lg overflow-hidden p-8 mb-4">
        @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-semibold">Nom :</label>
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-semibold">Email :</label>
                @error('email')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-semibold">Mot de passe :</label>
                @error('password')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-600 font-semibold">Confirmer le mot de passe :</label>
                @error('password_confirmation')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="password" name="password_confirmation" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-600 font-semibold">Adresse :</label>
                @error('address')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="address" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-600 font-semibold">Role :</label>
                @error('role_id')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <select name="role_id" class="w-full border border-gray-300 p-2 rounded" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>
        <x-flash></x-flash>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer l'utilisateur</button>
    </form>
</x-layout>


