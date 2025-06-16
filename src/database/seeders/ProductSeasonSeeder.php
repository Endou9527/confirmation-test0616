<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Season;

class ProductSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // 例: すべてのProductに対して、ランダムにSeasonを紐づける（1〜3個）
        $products = Product::all();
        $seasonIds = Season::pluck('id')->toArray();

        foreach ($products as $product) {
            // 1〜3個のランダムなseason_idを選んでattach
            $randomSeasons = collect($seasonIds)->random(rand(1, min(3, count($seasonIds))))->toArray();
            $product->seasons()->sync($randomSeasons);
        }
    }
}
