<?php

namespace Database\Seeders;

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
        DB::table('products')->insert([
            ['name'=>'Oppo',
            'price'=>'200',
            'category'=>'Mobile',
            'description'=>'Better Mobile with more features',
            'gallery'=>'https://images-eu.ssl-images-amazon.com/images/I/41ybY6BscoL._SX300_SY300_QL70_FMwebp_.jpg'
            ],
            ['name'=>'Sony Tv',
            'price'=>'280',
            'category'=>'Tv',
            'description'=>'Better Tv with more features',
            'gallery'=>'https://m.media-amazon.com/images/I/81Nw2ifyBzL._SL1500_.jpg'
            ],
            ['name'=>'Mi Tv',
            'price'=>'359',
            'category'=>'Tv',
            'description'=>'Better Tv with more features',
            'gallery'=>'https://m.media-amazon.com/images/I/61V7cDH8AAS._SL1188_.jpg'
            ]
        ]);
    }
}
