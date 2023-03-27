<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Produto 1',
            'description' => 'Descrição do produto 1',
            'price' => 10.5
        ]);

        Product::create([
            'name' => 'Produto 2',
            'description' => 'Descrição do produto 2',
            'price' => 20.0
        ]);

        Product::create([
            'name' => 'Produto 3',
            'description' => 'Descrição do produto 3',
            'price' => 50.0
        ]);
    }
}
