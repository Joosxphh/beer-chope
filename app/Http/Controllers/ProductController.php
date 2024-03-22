<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

    public function index(Request $request, string $category = null): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Si on a une category
        if ($category) {
            $products = Product::whereHas('categories', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            });

            $category = Category::where('slug', $category)->first();
        } else {
            $products = Product::query();
        }

        if($request->has('trashed')) {
            $products = $products->withTrashed();
        }

        return view('admin.product.index', [
            'products' => $products->paginate(20),
            'category' => $category
        ]);
    }

    public function show(Product $product): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.show', [
            'product' => $product
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.create', [
            'suppliers' => Supplier::all(),
            'categories' => Category::all()
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }

    public function restore ($id)
    {
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('product.index');
    }

    public function store(CreateProductRequest $request): RedirectResponse
    {
        $request->file('image')->store('public/covers');
        $product = Product::create([
            ...$request->validated(),
            'price' => $request->input('price') * 100,
            'image' => $request->file('image')->hashName()
        ]);

        return redirect()->route('admin.product.show', $product);
    }

    public function edit(Product $product): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('admin.product.edit', [
            'product' => $product,
            'suppliers' => Supplier::all(),
            'categories' => Category::all()
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        // Si on a une nouvelle image
        if ($request->hasFile('image')) {
            // On supprime l'ancienne image
            Storage::delete('public/covers/' . $product->image);
            // On stocke la nouvelle image
            $request->file('image')->store('public/covers');
            // On met à jour le produit
            $product->update([
                ...$request->validated(),
                'price' => $request->input('price') * 100,
                'image' => $request->file('image')->hashName()
            ]);
            // Sinon, on met à jour le produit sans changer l'image
        } else {
            $product->update($request->validated());
        }

        // On met à jour les catégories
        $product->categories()->sync($request->input('categories'));

        //La méthode sync() synchronise les catégories du produit avec les catégories sélectionnées dans le formulaire cela passe par un tableau d'ID.

        return redirect()->route('product.show', $product);
    }
}
