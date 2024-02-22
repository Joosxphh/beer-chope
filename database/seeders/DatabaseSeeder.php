<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // On génère 50 utilisateurs
         \App\Models\User::factory(50)->create();

        // On génère 10 fournisseurs
         \App\Models\Supplier::factory(10)->create();

        // On génère des catégories
         \App\Models\Category::factory()->create([
             'name' => 'Blonde',
             'description' => 'blonde é uma cerveja lager premium',
             'slug' => 'blonde',
             'color' => 'yellow',
         ]);

        \App\Models\Category::factory()->create([
            'name' => 'Brune',
            'description' => 'brune é uma cerveja lager premium',
            'slug' => 'brune',
            'color' => 'green',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Rousse',
            'description' => 'Rousse é uma cerveja lager premium',
            'slug' => 'rousse',
            'color' => 'blue',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Blanche',
            'description' => 'Blanche é uma cerveja lager premium',
            'slug' => 'blanche',
            'color' => 'purple',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Sans Alcool',
            'description' => 'Sans Alcool é uma cerveja lager premium',
            'slug' => 'sans-alcool',
            'color' => 'orange',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Rouge',
            'description' => 'Rouge é uma cerveja lager premium',
            'slug' => 'rouge',
            'color' => 'red',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Triple',
            'description' => 'Triple é uma cerveja lager premium',
            'slug' => 'triple',
            'color' => 'pink',
        ]);

        $product = \App\Models\Product::factory(100)->create();
        $categories = \App\Models\Category::all();
        $product->each(function ($product) use ($categories) {
            $product->categories()->attach(
                $categories->random(rand(1,2))->pluck('id')->toArray()
            );
        });


    }
}
