<x-layout>

    <div class="mb-6 flex justify-between">
        <h1 class="text-3xl font-bold mb-6">Les produits</h1>
        <a href="{{ route('product.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mb-4">Ajouter un produit</a>
    </div>

    <form action="{{ route('product.index') }}" method="get" class="flex items-center mb-4">

            <!-- Checkbox pour les produits supprimés -->
            <div class="flex items-center mr-4">
                <input type="checkbox" id="trashed" name="trashed" class="mr-2 rounded text-blue-500 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" @if(request('trashed')) checked @endif onchange="this.form.submit()">
                <label for="trashed" class="text-gray-700">Afficher les produits supprimés</label>
            </div>

            <!-- Checkboxes pour les catégories -->
            @foreach($categories as $category)
                <div class="flex items-center mr-4">
                    <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" class="mr-2 rounded text-blue-500 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" @if(in_array($category->id, request('categories', []))) checked @endif onchange="this.form.submit()">
                    <label for="category_{{ $category->id }}" class="text-gray-700">{{ $category->name }}</label>
                </div>
            @endforeach
    </form>

    <div class="max-w-screen-xl mx-auto overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégories</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fournisseur</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><img class="h-12 w-12 rounded-full" src="{{ asset('storage/covers/' . $product->image) }}" alt="Image du produit"></td>
                    <td class="px-6 py-4 whitespace-normal">{{ $product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }} €</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @foreach($product->categories as $category)
                            <span class="bg-{{$category->color}}-100 text-{{$category->color}}-800 font-medium me-2 px-2.5 py-0.5 rounded">{{ $category->name }}</span>
                        @endforeach
                    </td>
                    <td class="px-4 py-4 whitespace-normal">{{ $product->supplier->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($product->trashed())
                            <a href="{{ route('product.restore', $product) }}" class="bg-red-500 hover:bg-green-600 text-white py-2 px-4 rounded mr-2">Restaurer l'article</a>
                        @else
                            <a href="{{ route('product.show', $product) }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-2 mr-2 w-44 text-center">Voir l'article</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    {{$products->links()}}

</x-layout>
