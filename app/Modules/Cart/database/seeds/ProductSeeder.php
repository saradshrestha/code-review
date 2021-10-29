<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products= [
            [
                'product_name' => 'Lenovo',
                'product_price' => '100',
                'status' => 1,

            ],
            [
                'product_name' => 'Lenovo2',
                'product_price' => '200',
                'status' => 1,
            ],
            [
                'product_name' => 'Lenovo3',
                'product_price' => '300',
                'status' => 1,
            ],
            [
                'product_name' => 'Lenovo4',
                'product_price' => '400',
                'status' => 1,
            ],
            [
                'product_name' => 'Lenovo5',
                'product_price' => '500',
                'status' => 1,
            ],
            [
                'product_name' => 'Lenovo6',
                'product_price' => '600',
                'status' => 1,
            ],

        ];
        DB::table('products')->insert($products);
    }
}
