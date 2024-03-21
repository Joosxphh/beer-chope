<x-layout>
    <a href="{{ route('product.index') }}" class="text-blue-500 hover:text-blue-600">Revenir sur la liste des produits</a>

        <x-slot name="title">Modifier le produit</x-slot>
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-md" style="min-height: 92vh;">
        <h1 class="text-3xl font-bold mb-6">Modifier le produit</h1>


        <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-600 font-semibold">Titre :</label>
                @error('title')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-600 font-semibold">Description :</label>
                @error('description')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <textarea name="description" class="w-full border border-gray-300 p-2 rounded" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-600 font-semibold">Prix :</label>
                @error('price')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="number" name="price" value="{{ $product->price }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="cover" class="block text-gray-600 font-semibold">Couverture :</label>
                @error('cover')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="file" name="cover" value="{{ $product->image }}" accept="image/*" class="w-full border border-gray-300 p-2 rounded">
                <img src="{{ asset('storage/covers/' . $product->image) }}" class="h-40 rounded-tx-layout" alt="Image du produit">
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-gray-600 font-semibold">Stock :</label>
                @error('stock')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border border-gray-300 p-2 rounded" required>

            </div>

            <div class="mb-4">
                <label for="supplier_id" class="block text gray-600 font-semibold">Fournisseur :</label>
                <select name="supplier_id" class="w-full border border-gray-300 p-2 rounded" required>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="categories" class="block text-gray-700 font-semibold mb-2">Catégories :</label>
                @foreach($categories as $category)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="{{ $category->id }}" name="categories[]" value="{{ $category->id }}" class="mr-2 border border-gray-300 rounded" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label for="{{ $category->id }}" class="text-gray-700">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</button>

        </form>
        </div>
</x-layout>
