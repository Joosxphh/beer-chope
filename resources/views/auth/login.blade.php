<x-layout no-sidebar>
    <x-slot name="title">Connexion</x-slot>
    <div class="max-w-2xl mx-auto p-8 shadow-md" style="min-height: 92vh;">
        <h1 class="text-3xl font-bold mb-6">Connexion</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-semibold">Email :</label>
                @error('email')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-semibold">Mot de passe :</label>
                @error('password')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Connexion</button>
        </form>
    </div>
</x-layout>
