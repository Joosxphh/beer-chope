<x-layout>
        <div class="w-full max-w-screen-xl">
            <a href="{{ route('product.index') }}" class="text-blue-500 hover:text-blue-600">Revenir sur la liste des produits</a>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
                <div class="flex-1 p-8 flex items-start">
                    <!-- Informations du produit -->
                    <div class="flex-1">
                        <div>
                            <h2 class="text-2xl font-semibold">{{$product->name}}</h2>
                            <p class="text-gray-500 text-sm">ID du Produit: {{ $product->id }}</p>
                        </div>

                        <p class="text-gray-700 mb-2">{{$product->description}}</p>
                        <p class="text-gray-700 mb-2">Stock restant : {{ $product->stock }} unités</p>
                        <p class="text-xl font-bold text-gray-900 mb-2">Prix : {{ $product->price }} €</p>

                        <p class="text-gray-700">
                            Catégories :
                            @foreach($product->categories as $category)
                                <span class="bg-{{$category->color}}-100 text-{{$category->color}}-800 font-medium me-2 px-2.5 py-0.5 rounded">{{$category->name}}</span>
                            @endforeach
                        </p>

                        <p class="text-gray-700 mb-2">Ajouté le : {{$product->created_at}}</p>
                        <p class="text-gray-700 mb-2">Dernière modification le : {{$product->updated_at}}</p>
                        <p class="text-gray-700 mb-2">Fournisseur : {{ $product->supplier->name }}</p>

                        <!-- Boutons de la carte alignés horizontalement -->
                        <div class="flex items-center">
                            <a href="{{ route('product.edit', $product) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded  mr-2">Modifier l'article</a>
                            <form action="{{ route('product.destroy', $product) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded mr-2">Supprimer l'article</button>
                            </form>
                        </div>
                    </div>

                    <!-- Image du produit à droite, prenant une taille plus petite -->
                    <img class="w-96 h-auto object-cover object-center" src="{{ asset('storage/covers/' . $product->image) }}" alt="Image du produit">
                </div>
            </div>
        </div>
</x-layout>
