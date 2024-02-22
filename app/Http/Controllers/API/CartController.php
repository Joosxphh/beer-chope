<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = $request->user();
        $cart = $user->cart();
        return $cart->load("orderItems.product");
    }

    /**
     * Add the specified resource in storage.
     */
    public function add(Request $request)
    {
        $request->validate([
            "product_id" => ["required", "exists:product,id"],
            "quantity" => ["required", "integer", "min:1", "max:10"],
        ]);

        $product = Product::find($request->input("product_id"));
        // Vérifie si l'utilisateur à déjà une order de status cart
        $order = $request->user()->cart();
        // Vérifie la présence dans orderItem ou non du produit choisie
        $orderItem = $order->orderItems()->where("product_id", "=", $product->id)->first();

        if ($orderItem) {
            $orderItem->update([
                "quantity" => $orderItem->quantity + $request->input("quantity"),
            ]);
        } else {
            $order->orderItems()->create([
                "product_id" => $request->input("product_id"),
                "quantity" => $request->input("quantity"),
                "price" => $product->price
            ]);
        }

        $order->calculateTotal();

        return $order->load("orderItems.product");
    }

    public function complete(Request $request)
    {
        $cart = $request->user()->cart();

        if ($cart->orderItems->count() === 0) {

            return response()->json(["message" => "Une erreur est survenue votre panier semble vide"], 404);
        }

        $cart->update([
            "status" => "completed"
        ]);

        return $cart->load("orderItems.product");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, OrderItem $orderItem)
    {
        //Vérifie la policy dans OrderItemPolicy
        $this->authorize("delete", $orderItem);

        $orderItem->delete();
        $request->user()->cart()->calculateTotal();
        $cart = $request->user()->cart();
        return $cart->load("orderItems.product");
    }
}
