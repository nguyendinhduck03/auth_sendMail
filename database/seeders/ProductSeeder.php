<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Cà phê đen',
                'image' => null,
                'price' => 30,
                'quantity' => 4,
                'description' => 'Cà phê đen, đồ uống dành cho nam giới',
                'category_id' => 1,
            ],
        ]);
    }
}
