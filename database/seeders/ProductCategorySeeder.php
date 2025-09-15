<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Polo Shirt",
            "Jaket",
            "Hoodie & Sweater",
            "Blazer",
            "Dress",
            "Rok",
            "Celana Panjang",
            "Celana Pendek",
            "Jeans",
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
