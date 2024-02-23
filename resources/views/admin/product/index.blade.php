<x-layout>
        <h1 class="font-bold text-3xl mb-10">Les produits</h1>

        @foreach($products as $product)

        <div class="max-w-screen-xl mx-auto p-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden flex items-center">
                <!-- Image du produit à gauche, occupant un cinquième de la largeur -->
                <img class="w-1/5 h-20 object-cover object-center mr-4" src="{{$product->image}}" alt="Image du produit">

                <div class="flex-1 flex items-center justify-between">
                    <!-- Nom du produit et ID du produit -->
                    <div class="flex-1 mb-2">
                        <div>
                            <h2 class="text-2xl font-semibold">{{ $product->name }}</h2>
                            <p class="text-gray-500 text-sm">ID du Produit: {{$product->id}}</p>
                            <!-- Stock restant -->
                            <p class="text-gray-700">Stock restant : {{$product->stock}}</p>
                        </div>
                    </div>

                    <!-- Informations du produit -->
                    <div class="flex-1 mb-2">

                        <!-- Prix -->
                        <p class="text-xl font-bold text-gray-900">Prix : {{$product->price}} €</p>

                        <!-- Catégories du produit -->
                        <p class="text-gray-700">
                            Catégories :
                        @foreach($product->categories as $category)
                            <span class="bg-{{$category->color}}-100 text-{{$category->color}}-800 shadow-md text-xsgit font-medium me-2 px-2.5 py-0.5 rounded">{{$category->name}}</span>
                        @endforeach
                        </p>
                        <!-- Date d'ajout du produit -->
                        <p class="text-gray-700">Ajouté le : {{$product->created_at}}</p>

                        <!-- Fournisseur du produit -->
                        <p class="text-gray-700">Fournisseur : Nom du Fournisseur</p>
                    </div>

                    <!-- Boutons de la carte -->
                    <div class="flex flex-col items-end">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mb-2">Modifier l'article</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Supprimer l'article</button>
                    </div>
                </div>
            </div>
        </div>





    @endforeach
</x-layout>
