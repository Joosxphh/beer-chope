<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = Product::with(["categories"])->paginate(30);
        //return response()->json($products);

        return
            Product::with(["categories"])->paginate(30);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //return response()->json($product);

        return $product->load(["categories"]);
    }
}
