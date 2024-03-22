<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Role::factory(1)->create();

        // On génère 50 utilisateurs
         \App\Models\User::factory(50)->create();

        // On génère 10 fournisseurs
         \App\Models\Supplier::factory(10)->create();

        // On génère des catégories
         Category::factory()->create([
             'name' => 'Blonde',
             'description' => 'blonde é uma cerveja lager premium',
             'slug' => 'blonde',
             'color' => 'yellow',
         ]);

        Category::factory()->create([
            'name' => 'Brune',
            'description' => 'brune é uma cerveja lager premium',
            'slug' => 'brune',
            'color' => 'pink',
        ]);

        Category::factory()->create([
            'name' => 'Rousse',
            'description' => 'Rousse é uma cerveja lager premium',
            'slug' => 'rousse',
            'color' => 'orange',
        ]);

        Category::factory()->create([
            'name' => 'Blanche',
            'description' => 'Blanche é uma cerveja lager premium',
            'slug' => 'blanche',
            'color' => 'blue',
        ]);

        Category::factory()->create([
            'name' => 'Sans Alcool',
            'description' => 'Sans Alcool é uma cerveja lager premium',
            'slug' => 'sans-alcool',
            'color' => 'orange',
        ]);

        Category::factory()->create([
            'name' => 'Rouge',
            'description' => 'Rouge é uma cerveja lager premium',
            'slug' => 'rouge',
            'color' => 'red',
        ]);

        Category::factory()->create([
            'name' => 'Triple',
            'description' => 'Triple é uma cerveja lager premium',
            'slug' => 'triple',
            'color' => 'purple',
        ]);

        $product = Product::factory(100)->create();
        $categories = Category::all();
        $product->each(function ($product) use ($categories) {
            $product->categories()->attach(
                $categories->random(rand(1,2))->pluck('id')->toArray()
            );
        });

        // On génère 10 commandes
         Order::factory(10)->create();


         $orders = Order::all();

         $orders->each(function ($order) {
             $order->items()->saveMany(OrderItem::factory(rand(1, 5))->make());
         });





    }
}
