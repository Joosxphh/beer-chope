<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//    public function show()
//    {
//        return view('admin.product.show');
//    }
//
//    public function index()
//    {
//        return view('admin.product.index');
//    }

    public function index(string $category = null)
    {
        // Si on a une category
        if ($category) {
            // On récupère les livres qui ont une catégorie qui a le slug de la catégorie
            $products = Product::whereHas('categories', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            })->paginate(15);
            // Pour récupérer la catégorie entière et pas juste le slug
            $category = Category::where('slug', $category)->first();
        } else {
            $products = Product::paginate(15);
        }


        return view('admin.product.index', [
            'products' => $products,
            'category' => $category
        ]);
    }
}
