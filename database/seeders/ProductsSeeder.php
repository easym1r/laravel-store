<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productsCount = 10;

        for ($i = 1; $i <= $productsCount; $i++) {
            DB::table('products')->insert([
                'number' => Str::random(10),
                'name' => 'Подушка. Модель X-' . Str::random(5),
                'description' => 'Здесь должно быть описание товара, но я пока не заполнил его :/',
                'image_file_name' => 'product_' . $i . '.png',
                'price' => rand(1000, 10000) / 10,
                'quantity' => rand(0, 100),
                'cart_additions' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
