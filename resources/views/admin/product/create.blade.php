<x-layout>

    {{-- Formulaire de création --}}
    <form action="{{route('product.store')}}"  method="post" class="max-w-md mx-auto p-6 rounded-md" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nom :</label>
            <input type="text" name="name" class="w-full bg-gray-100 border border-gray-300 text-gray-800 p-2 rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description :</label>
            <textarea name="description" class="w-full bg-gray-100 border border-gray-300 text-gray-800 p-2 rounded focus:outline-none focus:border-blue-500" required></textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-semibold mb-2">Prix :</label>
            <input type="number" name="price" class="w-full bg-gray-100 border border-gray-300 text-gray-800 p-2 rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-semibold mb-2">Stock :</label>
            <input type="number" name="stock" class="w-full bg-gray-100 border border-gray-300 text-gray-800 p-2 rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image :</label>
            <input type="file" name="image" accept="image/*" class="w-full bg-gray-100 border border-gray-300 text-gray-800 p-2 rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="supplier_id" class="block text-gray-700 font-semibold mb-2">Fournisseur :</label>
            <select name="supplier_id" class="w-full bg-gray-100 border border-gray-300 text-gray-800 p-2 rounded focus:outline-none focus:border-blue-500" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" @if(old('supplier_id') == $supplier->id) selected @endif >{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="categories" class="block text-gray-700 font-semibold mb-2">Catégories :</label>
            @foreach($categories as $category)
                <div class="flex items-center mb-2">
                    <input type="checkbox" id="{{ $category->id }}" name="categories[]" value="{{ $category->id }}" class="mr-2 border border-gray-300 rounded">
                    <label for="{{ $category->id }}" class="text-gray-700">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer</button>
    </form>

</x-layout>
