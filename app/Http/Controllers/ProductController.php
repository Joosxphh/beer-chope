<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

    public function index(string $category = null): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Si on a une category
        if ($category) {

            $products = Product::whereHas('categories', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            })->paginate(15);

            $category = Category::where('slug', $category)->first();
        } else {
            $products = Product::paginate(15);
        }

        return view('admin.product.index', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function show(Product $product): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.show', [
            'product' => $product
        ]);
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.create', [
            'suppliers' => Supplier::all(),
            'categories' => Category::all()
        ]);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return $this->index();
    }

    public function store(CreateProductRequest $request): RedirectResponse
    {
        $request->file('image')->store('public/covers');
        $product = Product::create([
            ...$request->validated(),
            'price' => $request->input('price') * 100,
            'image' => $request->file('image')->hashName()
        ]);

        return redirect()->route('product.show', $product);
    }

    public function edit(Product $product): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('admin.product.edit', [
            'product' => $product,
            'suppliers' => Supplier::all(),
            'categories' => Category::all()
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('image', 'public');
        }

        $product->update($validatedData);

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        session()->flash('message', 'Produit mis à jour avec succès !');

        return redirect()->route('product.index');
    }
}
